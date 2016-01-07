<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
/**
 * 权限管理控制器
 * Class AuthController
 * Author Qinzhi
 */
class AuthController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->AuthRole = D('AuthRole');
    }

    public function index(){
        $authLists = $this->AuthRole->select();
        $tree = new Tree($authLists);
        $auth = $tree->leaf();fb($auth);
        $this->assign('auth',$auth);
        $this->assign('tree',$this->AuthRole->format_tree($authLists));
        $this->display();
    }

    public function getAuth(){
        $id = I('request.id/d');
        $auth = $this->AuthRole->find($id);
        if(IS_AJAX){
            $this->ajaxReturn($auth);
        }else{
            return $auth;
        }
    }

    public function add(){
        if(IS_POST){
            $data = array(
                'pid' => I('request.p_id/d',0),
                'level' => I('request.level/d',0),
                'module' => MODULE_NAME,
                'type' => I('request.type'),
                'name' => trim(I('request.name')),
                'site' => trim(I('request.site')),
                'sort' => I('request.sort/d')?:''
            );
            $insert_id = $this->AuthRole->add($data);
            if($insert_id === false){
                $this->error('权限添加失败','/Auth');
                return;
            }
        }
        $this->redirect('/Auth');
    }

    public function edit(){
        if(IS_AJAX){
            parse_str(urldecode(I('request.params')),$params);
            $data = array(
                'id' => $params['id'],
                'pid' => $params['p_id'],
                'level' => (int)$params['level'],
                'module' => MODULE_NAME,
                'type' => $params['type'],
                'name' => trim($params['name']),
                'site' => trim($params['site']),
                'sort' => (int)$params['sort']?:''
            );
            $result = $this->AuthRole->save($data);
            if($result){
                $result = array('code'=>1,'msg'=>'保存成功');
            }else{
                $result = array('code'=>0,'msg'=>'保存失败');
            }
        }else{
            $result = array('code'=>0,'msg'=>'异常提交');
        }

        $this->ajaxReturn($result);
    }

    public function del(){
        if(IS_AJAX){
            $id = I('request.id/d');
            $auth = $this->AuthRole->where(array('pid'=>$id))->find();
            if(!empty($auth)){
                $result = array('code'=>0,'msg'=>'不能直接删除上级模块');
            }else{
                if($this->AuthRole->delete($id)){
                    $result = array('code'=>1,'msg'=>'删除成功');
                }else{
                    $result = array('code'=>0,'msg'=>'删除失败');
                }
            }
        }else{
            $result = array('code'=>0,'msg'=>'异常提交');
        }
        $this->ajaxReturn($result);
    }

}