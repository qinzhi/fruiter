<?php
namespace Admin\Controller;
class BannerController extends AdminController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->display();
    }

    public function add(){

        $this->display();
    }

    public function position(){
        $position = M('BannerPosition')->where('is_del=0')->select();
        $this->assign('position',$position);
        $this->display(CONTROLLER_NAME . DS . 'Position/index');
    }

    public function position_add(){
        if(IS_POST){
            $position = array(
                'name' => I('post.name'),
                'intro' => I('post.intro'),
                'width' => I('post.width/d'),
                'height' => I('post.height/d'),
                'sort' => I('post.sort/d'),
                'status' => I('post.status/d'),
                'create_time' => time(),
            );
            $insert_id = M('BannerPosition')->add($position);
            if($insert_id > 0){
                $this->redirect(U('Banner/position'));
            }else{
                $this->error('广告位添加失败',U('Banner/position_add'));
            }
        }else{
            $this->display(CONTROLLER_NAME . DS . 'Position/add');
        }
    }

    public function position_edit(){
        $id = I('get.id/d');
        if(IS_POST){
            $position = array(
                'id' => $id,
                'name' => I('post.name'),
                'intro' => I('post.intro'),
                'width' => I('post.width/d'),
                'height' => I('post.height/d'),
                'sort' => I('post.sort/d'),
                'status' => I('post.status/d'),
                'create_time' => time(),
            );
            $result = M('BannerPosition')->save($position);
            if($result){
                $this->redirect(U('Banner/position'));
            }else{
                $this->error('广告位更新失败',U('Banner/position_edit',array('id'=>$id)));
            }
        }else{
            $position = M('BannerPosition')->find($id);fb($position);
            $this->assign('position',$position);
            $this->display(CONTROLLER_NAME . DS . 'Position/edit');
        }
    }

    public function position_update(){
        if(IS_AJAX){
            $result = M('BannerPosition')->save(I('post.'));
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

    public function position_del(){
        $id = I('post.id/d');
        $result = M('BannerPosition')->where('id='.$id)->save(array('is_del'=>1));
        if($result){
            $result = array('code'=>1,'msg'=>'删除成功');
        }else{
            $result = array('code'=>0,'msg'=>'删除失败');
        }
        $this->ajaxReturn($result);
    }
}