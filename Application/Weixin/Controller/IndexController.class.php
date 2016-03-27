<?php
namespace Weixin\Controller;
class IndexController extends WeixinController {
    public function index(){
        $this->assign('nav_type',1);
        $this->display();
    }
}