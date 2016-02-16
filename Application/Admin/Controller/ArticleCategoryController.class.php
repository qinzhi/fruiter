<?php
namespace Admin\Controller;
use \Common\Library\Org\Util\Tree;
/**
 * 文章分类管理控制器
 * Class AuthController
 * Author Qinzhi
 */
class ArticleCategoryController extends AdminController {

    public function __construct(){
        parent::__construct();
        $this->category = D('ArticleCategory');
    }

    public function index(){
        $categories = $this->category->get_categories();fb($categories);
        $tree = new Tree($categories);
        $articleCategories = $tree->leaf();
        $this->assign('articleCategories',$articleCategories);
        $this->assign('tree',$this->category->format_tree($categories));
        $this->display('Article/category');
    }

    public function getCategory(){
        $id = I('request.id/d');
        $category = $this->category->getCategory($id);
        if(IS_AJAX){
            $this->ajaxReturn($category);
        }else{
            return $category;
        }
    }

    public function getCategoriesTree(){
        $categories = $this->category->get_categories();
        $tree = new Tree($categories);
        $categories = $tree->leaf();
        $tree = $this->category->format_tree($categories,true,false);
        if(IS_AJAX){
            echo $tree;
        }else{
            return $tree;
        }
    }

    public function add(){
        if(IS_POST){
            $pid = I('request.p_id/d',0);
            $pcategory = $this->category->get_category_by_pid($pid);
            if($pid == 0) $level = 0;
            else{
                $category = $this->category->get_category_by_id($pid);
                $level = $category['level'] + 1;
            }
            $sort = !empty($pcategory) ? ($pcategory['sort'] + 1) : 0;
            $data = array(
                'pid' => $pid,
                'level' => $level,
                'name' => trim(I('request.name')),
                'sort' => $sort,
            );
            $result = $this->category->addCategory($data);
            if($result === false){
                $this->error('分类添加失败',U('ArticleCategory/index'));
                return;
            }
        }
        $this->redirect(U('/ArticleCategory/index'));
    }

    public function edit(){
        if(IS_AJAX){
            parse_str(urldecode(I('request.params')),$params);
            $pid = $params['p_id'];
            $category = $this->category->get_category_by_id($pid);
            if($pid == 0) $level = 0;
            else $level = $category['level'] + 1;
            $id = $params['id'];
            $data = array(
                'pid' => $params['p_id'],
                'level' => $level,
                'name' => trim($params['name']),
            );
            $result = $this->category->updateCategory($data,$id);
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
            $category = $this->category->get_category_by_pid($id);
            if(!empty($category)){
                $result = array('code'=>0,'msg'=>'不能直接删除上级模块');
            }else{
                if($this->category->delCategory($id)){
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

    public function move(){
        if(IS_AJAX){
            $id = I('request.id/d');
            $action = I('request.action');
            $result = $this->category->move($id,$action);
            if($result){
                $result = array('code'=>1,'msg'=>'移动成功');
            }else{
                $result = array('code'=>0,'msg'=>'移动失败');
            }

        }else{
            $result = array('code'=>0,'msg'=>'异常提交');
        }
        $this->ajaxReturn($result);
    }

}