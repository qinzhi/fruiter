<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
class GoodsController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->category = D('GoodsCategory');
    }

    public function index(){
        $this->display();
    }

    public function lists(){
        $this->display();
    }

    public function add(){
        if(IS_POST){
            D('Goods')->addGoods(I('post.'));
        }else{
            $categories = $this->category->get_categories();
            $tree = new Tree($categories);
            $categories = $tree->leaf();
            $this->assign('categories',$this->category->format_tree($categories,true,false));
            $this->display();
        }
    }

    /*public function setSpec(){
        $this->display('Spec/set');
    }*/

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