<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {

    public $_breadcrumbs = array(); //面包屑

    public $slideBar;

    public function __construct(){
        parent::__construct();

        $maps = $this->get_maps();
        $tree = new \Common\Library\Org\Util\Tree($maps);

        $this->slideBar = $tree->leaf();

        $this->get_breadcrumbs($maps);

        $this->assign('breadcrumbs',$this->_breadcrumbs);
        $this->assign('slideBar',$this->slideBar);
    }
    private function get_breadcrumbs($maps){
        $path = $_SERVER['PATH_INFO'];
        foreach($maps as $map){
            if($path == $map['site']){
                $this->_breadcrumbs[] = $map;
                $this->get_breadcrumb($map['pid'],$maps);
                break;
            }
        }
    }

    private function get_breadcrumb($pid,$maps){
        if($pid !=0 ){
            $this->_breadcrumbs = array_merge(array($pid=>$maps[$pid]),$this->_breadcrumbs);
            $this->get_breadcrumb($maps[$pid]['pid'],$maps);
        }
    }

    private function get_maps(){
        $maps = S('admin_site_map');
        if(!empty($maps)){
            return json_decode($maps,true);
        }else{
            $maps = D('Map')->get_maps();
            !empty($maps) ? S('admin_site_map',json_encode($maps),pow(2,31)-1):'';
            return $maps;
        }
    }
}