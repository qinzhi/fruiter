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

    public function get_specs($fields = '*'){
        return $this->field($fields)->where(array('is_del'=>0))->select();
    }

    public function get_spec_by_id($id,$fields='*'){
        return $this->field($fields)->where(array('is_del'=>0))->find($id);
    }

}