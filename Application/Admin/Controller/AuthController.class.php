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
        $auth = $this->AuthRole->select();
        $tree = new Tree($auth);
        $auth = $tree->leaf();
        $this->assign('auth',$auth);
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
                'pid' => I('request.p_name/d',0),
                'module' => MODULE_NAME,
                'type' => I('request.type'),
                'name' => I('request.name'),
                'site' => I('request.site'),
                'sort' => I('request.sort/d'),
                'status' => I('request.status')
            );
            $insert_id = $this->AuthRole->add($data);
            if($insert_id === false){
                $this->error('权限添加失败','/Auth');
                return;
            }
        }
        $this->redirect('/Auth');
    }

}