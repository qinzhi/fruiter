<?php
namespace Weixin\Controller;
class CartController extends WeixinController {
    public function index(){
        $this->assign('nav_type',3);
        $this->display();
    }
}