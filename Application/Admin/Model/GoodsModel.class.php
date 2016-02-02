<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model;

class GoodsModel extends CommonModel{

    public function __construct(){
        parent::__construct();
    }

    public function addGoods($params){
        $goods = array(
            'name' => $params['name'],
            'intro' => $params['intro'],
            'search_words' => $params['search_words']
        );
        //$_spec_list = I('post._spec_list');

        $_default = I('post._default/d',0);

        $_goods_no = I('post._goods_no');
        $_store_nums = I('post._store_nums');
        $_market_price = I('post._market_price');
        $_sell_price = I('post._sell_price');
        $_cost_price = I('post._cost_price');
        $_weight = I('post._weight');

        $_store_total_nums = 0;
        foreach($_store_nums as $_store_num){
            $_store_total_nums += $_store_num;
        }
        $goods['goods_no'] = $_goods_no[$_default];
        $goods['store_nums'] = $_store_total_nums;
        $goods['market_price'] = $_market_price[$_default];
        $goods['sell_price'] = $_sell_price[$_default];
        $goods['cost_price'] = $_cost_price[$_default];
        $goods['weight'] = $_weight[$_default];

        $goods_id = D('Goods')->add($goods);
        if($goods_id > 0){

            /** --------   添加商品类型   --------- **/
            $commend_type = I('post.commend_type');
            if(!empty($commend_type)){
                $commend = array();
                foreach($commend_type as $val){
                    $commend[] = array(
                        'commend_id' => $commend_type,
                        'goods_id' => $goods_id
                    );
                }
                D('GoodsCommend')->addAll($commend);
            }

            /** --------   添加商品分类   --------- **/

        }
    }


}