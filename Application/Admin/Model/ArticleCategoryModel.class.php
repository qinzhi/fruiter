<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class ArticleCategoryModel extends CommonModel{

    public static $order = 'sort asc'; //排序

    public function __construct(){
        parent::__construct();
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

    public function get_category_by_pid($pid,$sort = ''){
        $sort = $sort ?: $this::$order;
        return $this->where(array('pid'=>$pid))->order($sort)->find();
    }

    public function get_categories_by_pid($pid){
        return $this->where(array('pid'=>$pid))->order($this::$order)->select();
    }

    public function get_category_by_id($id){
        return $this->where(array('id'=>$id))->find();
    }

    public function get_categories(){
        return $this->order($this::$order)->select();
    }

    public function addCategory($category){
        return $this->add($category);
    }

    public function updateCategory($category,$id){
        return $this->where(array('id'=>$id))->save($category);
    }

    public function getCategory($id){
            return $this->find($id);
    }

    public function delCategory($id){
        return $this->delete($id);
    }
}