<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/27
 * Time: 14:40
 */
namespace Admin\Model;

use Think\Model,\Common\Library\Org\Util\Json;
class GoodsModel extends CommonModel{

    public function __construct(){
        parent::__construct();
    }

    public function addGoods($params){
        $goods = array(
            'name' => $params['name'],
            'intro' => $params['intro'],
            'search_words' => $params['search_words'],
            'status' => (int)$params['status'],
            'create_time' => time()
        );

        $_default = isset($params['_default']) ? (int)$params['_default'] : 0;

        $_goods_no = $params['_goods_no'];
        $_store_nums = $params['_store_nums'];
        $_market_price = $params['_market_price'];
        $_sell_price = $params['_sell_price'];
        $_cost_price = $params['_cost_price'];
        $_weight = $params['_weight'];

        //计算总库存
        $store_total_nums = 0;
        foreach($_store_nums as $val){
            $store_total_nums += $val;
        }

        $goods['goods_no'] = $_goods_no[$_default];
        $goods['store_nums'] = $store_total_nums;
        $goods['market_price'] = $_market_price[$_default];
        $goods['sell_price'] = $_sell_price[$_default];
        $goods['cost_price'] = $_cost_price[$_default];
        $goods['weight'] = $_weight[$_default];

        $goods_id = $this->add($goods);
        if($goods_id > 0){

            /** --------   添加商品详情   --------- **/
            $detail = array(
                'goods_id' => $goods_id,
                'detail' => $params['detail']
            );
            M('GoodsDetail')->add($detail);

            /** --------   添加商品SEO   --------- **/
            $seo = array(
                'goods_id' => $goods_id,
                'keywords' => $params['keywords'],
                'description' => $params['description']
            );
            M('GoodsSeo')->add($seo);

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
            $model_id = $params['model_id'];
            $_attr = $params['_attr'];
            if($model_id > 0 && !empty($_attr)){
                foreach($_attr as $key => $val){
                    $attr = array(
                        'goods_id' => $goods_id,
                        'model_id' => $model_id,
                        'attr_id' => $key,
                        'attr_value' => is_array($val) ? implode(',',$val) : $val
                    );
                    M('GoodsAttr')->add($attr);
                }
            }

            /** --------   添加規格商品   --------- **/
            $_spec_list = $_POST['_spec_list'];
            foreach($_goods_no as $key => $value){
                $products = array(
                    'goods_id' => $goods_id,
                    'products_no' => $_goods_no[$key],
                    'spec_array' => !empty($_spec_list[$key]) ? "[".join(',',$_spec_list[$key])."]" : '',
                    'store_nums' => $_store_nums[$key],
                    'market_price' => $_market_price[$key],
                    'sell_price' => $_sell_price[$key],
                    'cost_price' => $_cost_price[$key],
                    'weight' => $_weight[$key]
                );
                M('Products')->add($products);
            }
        }
    }
}