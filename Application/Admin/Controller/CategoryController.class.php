<?php
namespace Admin\Controller;
class CategoryController extends AdminController {

    public function index(){
        $this->display();
    }

    public function lists(){
        $this->display();
    }

    public function add(){
        $this->assign('categories',array());
        $this->display();
    }

}