<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class GoodsCategoryModel extends CommonModel{

    public static $order = 'sort asc'; //排序

    public function __construct(){
        parent::__construct();
        $this->seoTable = 'goods_category_seo';
    }

    public function move($id,$action){
        $auth = $this->find($id);
        $authList = $this->get_categories_by_pid($auth['pid']);
        for($i=0,$len=count($authList);$i<$len;$i++){
            if($authList[$i]['id'] == $auth['id']){
                if($i == 0 && $action == 'up' ){//上移失败
                    return false;
                }elseif($i == $len-1 && $action == 'down'){//下移失败
                    return false;
                }else{
                    if($action == 'up'){
                        $refer = $authList[$i - 1];
                    }elseif($action == 'down'){
                        $refer = $authList[$i + 1];
                    }else{
                        return false;
                    }
                    $tmp = $refer['sort'];
                    $status1 = $this->where(array('id'=>$refer['id']))->setField(array('sort'=>$auth['sort']));
                    $status2 = $this->where(array('id'=>$auth['id']))->setField(array('sort'=>$tmp));
                    if($status1 && $status2){
                        return true;
                    }else{
                        return false;
                    }
                }
            }
        }
    }

    public function format_tree($AuthLists,$is_json = true,$is_init = true){
        if($is_init) $tree[] = array('id'=>'','pid'=>0,'level'=>0,'name'=>'根节点');
        foreach($AuthLists as $auth){
            if($auth['level'] < 2){
                $tree[] = array(
                    'id' => $auth['id'],
                    'pId' => $auth['pid'],
                    'name' => $auth['name'],
                    'level' => $auth['level'],
                    'open' => true,
                );
            }
        }
        return $is_json?json_encode($tree):$tree;
    }

    public function get_category_by_pid($pid){
        return $this->where(array('pid'=>$pid))->order($this::$order)->find();
    }

    public function get_categories_by_pid($pid){
        return $this->where(array('pid'=>$pid))->order($this::$order)->select();
    }

    public function get_category_by_id($id){
        return $this->where(array('id'=>$id))->find();
    }

    public function get_categories($is_detail = false){
        if($is_detail === false){
            return $this->order($this::$order)->select();
        }else
            return $this->table($this->getTableName())
                            ->join(DB_PREFIX . $this->seoTable . ' as t1 on t1.category_id=' . $this->getTableName() . '.id')
                                ->order($this::$order)->select();
    }

    public function addCategory($category,$seo){
        $insert_id = $this->add($category);
        if($insert_id === false){
            return $insert_id;
        }else{
            $seo['category_id'] = $insert_id;
            M($this->seoTable)->add($seo);
            return true;
        }
    }

    public function updateCategory($category,$seo,$id){
        $result = $this->where(array('id'=>$id))->save($category);
        if($result === false){
            return $result;
        }else{
            M($this->seoTable)->where(array('category_id'=>$id))->save($seo);
            return true;
        }
    }

    public function getCategory($id,$is_detail = true){
        if($is_detail === false){
            return $this->find($id);
        }else
            return $this->table($this->getTableName())
                            ->join(DB_PREFIX . $this->seoTable . ' as t1 on t1.category_id=' . $this->getTableName() . '.id')
                                ->where(array($this->getTableName() . '.id'=>$id))
                                    ->order($this::$order)->find();
    }

    public function delCategory($id){
        return $this->execute('delete t1.*,t2.* from ' . $this->getTableName() . ' t1,' . DB_PREFIX . $this->seoTable . ' t2 where t1.id=' . $id);
    }
}