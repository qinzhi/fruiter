<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class AuthRoleModel extends CommonModel{

    public function move($id,$action){

    }

    public function format_tree($AuthLists,$is_json = true){
        $tree[] = array('id'=>'','pid'=>0,'level'=>0,'name'=>'根节点');
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
}