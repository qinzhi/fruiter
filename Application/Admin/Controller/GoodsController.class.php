<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
class GoodsController extends AdminController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $goods = D('Goods')->select();
        $this->assign('goods',$goods);
        $this->display();
    }

    public function add(){
        if(IS_POST){
            D('Goods')->addGoods(I('post.'));
            $this->redirect('Goods/index');
        }else{
            $categories = D('GoodsCategory')->get_categories();
            $tree = new Tree($categories);
            $categories = $tree->leaf();
            $this->assign('categories',D('GoodsCategory')->format_tree($categories,true,false));
            $this->display();
        }
    }

    public function edit(){
        $id = I('get.id');
        $goods = D('Goods')->find($id);fb($goods);
        $this->assign('goods',$goods);

        $categories = D('GoodsCategory')->get_categories();
        $tree = new Tree($categories);
        $categories = $tree->leaf();
        $this->assign('categories',D('GoodsCategory')->format_tree($categories,true,false));

        $where['goods_id'] = $id;
        $commend = M('GoodsToCommend')->where($where)->select();
        $commend_id = array();
        foreach($commend as $value){
            array_push($commend_id,$value['commend_id']);
        }
        fb($commend_id);
        $this->assign('commend_id',$commend_id);
        $this->display();
    }

    public function update(){
        if(IS_AJAX){
            $result = D('Goods')->save(I('post.'));
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
            echo"你所调用的函数： ".$function."(参数: ";
            print_r(I('request.'));
            echo")不存在！<br>\n";
        }
    }
}