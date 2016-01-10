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
}