<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Json;
class GoodsSpecController extends AdminController {

    public $spec;

    public function __construct(){
        parent::__construct();
        $this->spec = D('GoodsSpec');
    }

    public function index(){
        $this->display('Goods/spec');
    }

    public function add(){
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

        $insert_id = $this->spec->add($spec);
        if($insert_id > 0){
            $spec = $this->spec->get_spec_by_id($insert_id,'id,name');
            $result = array('code'=>1,'msg'=>'添加成功','data'=> $spec);
        }else{
            $result = array('code'=>0,'msg'=>'添加失败');
        }

        $this->ajaxReturn($result);
    }

    public function get(){
        $id = I('request.id/d');
        $spec = $this->spec->get_spec_by_id($id,'id,name,value');
        if(!empty($spec)){
            $spec['value'] = Json::decode($spec['value']);
        }
        $this->ajaxReturn($spec);
    }

}