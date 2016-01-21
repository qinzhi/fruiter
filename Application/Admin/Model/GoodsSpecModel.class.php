<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class GoodsSpecModel extends CommonModel{
    protected $_auto = array (
        array('post_time','time',self::MODEL_INSERT,'function'),
        array('update_time','time',self::MODEL_UPDATE,'function'),
    );


    public function get_specs($fields = '*'){
        return $this->field($fields)->select();
    }

    public function get_spec_by_id($id,$fields='*'){
        return $this->field($fields)->find($id);
    }

}