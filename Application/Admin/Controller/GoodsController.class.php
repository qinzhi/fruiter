<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
class GoodsController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->goodsModel = D('Goods');
    }

    public function index(){
        $goods = $this->goodsModel->select();
        $this->assign('goods',$goods);
        $this->display();
    }

    //添加商品
    public function add(){
        if(IS_POST){
            $this->goodsModel->addGoods(I('post.'));
            $this->redirect('Goods/index');
        }else{
            $categories = D('GoodsCategory')->get_categories();
            $tree = new Tree($categories);
            $categories = $tree->leaf();
            $this->assign('categories',D('GoodsCategory')->format_tree($categories,true,false));
            $this->display();
        }
    }

    //编辑商品
    public function edit(){
        $id = I('get.id');
        if(IS_POST){
            $this->goodsModel->editGoods(I('post.'));
            //$this->redirect('Goods/index');
        }else{
            $goods = $this->goodsModel->getGoodsById($id);
            $this->assign('goods',$goods);

            //商品分类
            $categories = D('GoodsCategory')->get_categories();
            $tree = new Tree($categories);
            $categories = $tree->leaf();
            $this->assign('categories',D('GoodsCategory')->format_tree($categories,true,false));

            //商品推荐类型
            $commend = $this->goodsModel->getGoodsCommendById($id);
            $commend_id = array();
            foreach($commend as $value){
                array_push($commend_id,$value['commend_id']);
            }
            $this->assign('commend_id',$commend_id);

            //商品属性
            $attr = $this->goodsModel->getGoodsAttrById($id);
            $this->assign('model_id',key($attr));//商品模型id
            $this->assign('attr',current($attr));

            //产品
            $products = $this->goodsModel->getProductsById($id);
            $cur = current($products);
            $this->assign('no_spec',empty($cur['spec_array'])?:false);
            $this->assign('products',json_encode($products));
            $this->display();
        }
    }

    //更新商品
    public function update(){
        if(IS_AJAX){
            $result = $this->goodsModel->save(I('post.'));
            if($result){
                $result = array('code'=>1,'msg'=>'更新成功');
            }else{
                $result = array('code'=>0,'msg'=>'更新失败');
            }
        }else{
            $result = array('code'=>0,'msg'=>'异常提交');
        }
        $this->ajaxReturn($result);
    }

    public function __call($function,$args){
        if($function === 'spec'){
            $tpl = I('request.tpl');
            if($tpl == 'select'){
                $has_id = I('request.has_id');
                $where = array();
                if(!empty($has_id)){
                    $where['id'] = array('not in',implode(',',$has_id));
                }
                $specs = D('Spec')->get_specs('id,name',$where);
                $this->assign('specs',$specs);
            }elseif($tpl == 'edit'){
                $id = I('request.id/d');
                $spec = D('Spec')->get_spec_by_id($id);
                $this->assign('spec',$spec);
            }
            $this->display(CONTROLLER_NAME . DS . ucfirst($function) . DS . $tpl);
        }else{
            echo"你所调用的函数: ".$function."(参数: ";
            dump(array_merge(I('post.'),I('get.')));
            echo")<br>不存在！<br>";
        }
    }
}