<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {

    public function __construct(){
        parent::__construct();

        if(!IS_AJAX){
            $menu = D('AuthRole')->get_menu();
            $tree = new \Common\Library\Org\Util\Tree($menu);
            $slideBar = $tree->leaf();

            D('AuthRole')->get_breadcrumbs();
            $breadcrumbs = D('AuthRole')->breadcrumbs;

            $this->assign('breadcrumbs',array_reverse($breadcrumbs));
            $this->assign('slideBar',$slideBar);
        }
    }

}