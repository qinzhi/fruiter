<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class SpecModel extends CommonModel{

    public function get_specs($fields = '*',$where = array()){
        $map['is_del'] = 0;
        if(!empty($where)){
            foreach($where as $key => $val){
                $map[$key] = $val;
            }
        }
        return $this->field($fields)->where($map)->select();
    }

    public function get_spec_by_id($id,$fields='*'){
        return $this->field($fields)->where(array('is_del'=>0))->find($id);
    }

}