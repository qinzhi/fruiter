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
            'search_words' => $params['search_words'],
            'status' => (int)$params['status']
        );
        //$_spec_list = I('post._spec_list');

        $_default = isset($params['_default']) ? (int)$params['_default'] : 0;

        $_goods_no = $params['_goods_no'];
        $_store_nums = $params['_store_nums'];
        $_market_price = $params['_market_price'];
        $_sell_price = $params['_sell_price'];
        $_cost_price = $params['_cost_price'];
        $_weight = $params['_weight'];

        //计算总库存
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

            /** --------   添加商品详情   --------- **/
            $detail = array(
                'goods_id' => $goods_id,
                'detail' => $params['detail']
            );
            M('GoodsToCommend')->add($detail);

            /** --------   添加商品类型   --------- **/
            $commend_type = $params['commend_type'];
            if(!empty($commend_type)){
                foreach($commend_type as $val){
                    $commend[] = array(
                        'commend_id' => $val,
                        'goods_id' => $goods_id
                    );
                }
                M('GoodsToCommend')->addAll($commend);
            }

            /** --------   添加商品分类   --------- **/
            $category_id = $params['category_id'];
            if(!empty($category_id)){
                $category_id = explode(',',$category_id);
                foreach($category_id as $val){
                    $category[] = array(
                        'category_id' => $val,
                        'goods_id' => $goods_id
                    );
                }
                M('GoodsToCategory')->addAll($category);
            }

            /** --------   添加商品扩展属性   --------- **/

        }


    }


}