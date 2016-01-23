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
        $categories = $this->category->get_categories();
        $tree = new Tree($categories);
        $categories = $tree->leaf();
        $this->assign('categories',$this->category->format_tree($categories,true,false));
        $this->display();
    }

    /*public function setSpec(){
        $this->display('Spec/set');
    }*/

    public function __call($function,$args){
        if($function === 'spec'){
            $tpl = I('request.tpl');
            if($tpl == 'select'){
                $specs = D('GoodsSpec')->get_specs('id,name');
                $this->assign('specs',$specs);
            }
            $this->display(ucfirst($function) . DS . $tpl);
        }else{
            echo"你所调用的函数： ".$function."(参数: ";
            print_r(I('request.'));
            echo")不存在！<br>\n";
        }
    }
}