<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Json;
class GoodsAttrController extends AdminController {

    public $attr;

    public function __construct(){
        parent::__construct();
        $this->attr = D('Attr');
    }

    public function index(){
        $this->display('Goods/Attr/index');
    }

    public function add(){
        if(IS_POST){
            $name = trim(I('request.name'));
            if(empty($name)){
                $this->ajaxReturn(array('code'=>0,'msg'=>'规格名称不能为空'));
            }
            $value = I('request.value');
            $value = empty($value) ?: Json::encode($value) ;
            $spec = array(
                'name' => $name,
                'value' => $value,
                'remark' => trim(I('request.remark'))
            );

            $insert_id = $this->attr->add($spec);

        }

        $this->display('Goods/Attr/add');

    }

    public function get(){
        $id = I('request.id/d');
        $spec = $this->attr->get_spec_by_id($id,'id,name,value');
        if(!empty($spec)){
            $spec['value'] = Json::decode($spec['value']);
        }
        $this->ajaxReturn($spec);
    }

}