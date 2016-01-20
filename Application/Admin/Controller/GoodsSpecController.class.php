<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
class GoodsSpecController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->category = D('GoodsCategory');
    }

    public function add(){
        $name = trim(I('request.name'));
        if(empty($name)){
            $this->ajaxReturn(array('code'=>0,'msg'=>'规格名称不能为空'));
        }
        $value = I('request.value');
        $value = empty($value) ?: implode(',',$value) ;
        $spec = array(
            'name' => $name,
            'value' => $value,
            'remark' => trim(I('request.remark')),
            'post_time' => time(),
            'update_time' => time()
        );



        fb(I('request.'));


        $this->ajaxReturn($result);
    }

}