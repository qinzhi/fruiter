<?php
namespace Admin\Controller;
class GoodsCategoryController extends AdminController {

    public function index(){
        $this->display();
    }

    public function add(){
        $this->assign('categories',array());
        $this->display();
    }

}