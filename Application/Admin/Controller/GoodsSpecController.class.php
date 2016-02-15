<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Json;
class GoodsSpecController extends AdminController {

    public $specModel;

    public function __construct(){
        parent::__construct();
        $this->specModel = D('Spec');
    }

    public function index(){
        $specs = $this->specModel->get_specs();
        $this->assign('specs',$specs);
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
            'remark' => trim(I('request.remark')),
            'create_time' => time(),
            'update_time' => time()
        );

        $insert_id = $this->specModel->add($spec);
        if($insert_id > 0){
            $spec = $this->specModel->get_spec_by_id($insert_id,'id,name,value');
            $result = array('code'=>1,'msg'=>'添加成功','data'=> $spec);
        }else{
            $result = array('code'=>0,'msg'=>'添加失败');
        }

        $this->ajaxReturn($result);
    }

    public function edit(){
        $name = trim(I('request.name'));
        if(empty($name)){
            $this->ajaxReturn(array('code'=>0,'msg'=>'规格名称不能为空'));
        }
        $value = I('request.value');
        $value = empty($value) ?: Json::encode($value) ;
        $id = I('request.id/d');
        $spec = array(
            'id' => $id,
            'name' => $name,
            'value' => $value,
            'remark' => trim(I('request.remark')),
            'update_time' => time()
        );
        $insert_id = $this->specModel->save($spec);

        if($insert_id > 0){
            $spec = $this->specModel->get_spec_by_id($insert_id,'id,name,value,type');
            $result = array('code'=>1,'msg'=>'保存成功','data'=> $spec);
        }else{
            $result = array('code'=>0,'msg'=>'保存失败');
        }

        $this->ajaxReturn($result);
    }

    public function del(){
        $spec_id = I('request.ids');
        $spec_id = explode(',',$spec_id);
        if(count($spec_id) > 1){
            $status = M('Spec')->where(array('id'=> array('in',$spec_id) ))->save(array('is_del'=>1));
        }else{
            $spec_id = array_pop($spec_id);
            $status = M('Spec')->where(array('id'=>$spec_id ))->save(array('is_del'=>1));
        }
        if($status){
            $data = array('code'=>1,'msg'=>'删除成功');
        }else{
            $data = array('code'=>0,'msg'=>'删除失败');
        }
        $this->ajaxReturn($data);
    }

    public function gets(){

    }

    public function get(){
        $id = I('request.id/d');
        $spec = $this->specModel->get_spec_by_id($id,'id,name,value,type');
        if(!empty($spec)){
            $spec['value'] = Json::decode($spec['value']);
        }
        $this->ajaxReturn($spec);
    }

}