<?php
/**
 * Created by PhpStorm.
 * User: qinzhi
 * Date: 15-12-26
 * Time: 下午4:20
 */
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{

    public $config = array();

    public function login(){
        if(IS_AJAX){
            $params = I('get.');

            $this->ajaxReturn(I('get.'));
        }else{
            $this->display();
        }
    }

    public function captcha(){
        $config = array(
            'width' => '100',   //验证码宽度 设置为0为自动计算
            'height' => '32',   //验证码高度 设置为0为自动计算
            'fontSize' => 30,    // 验证码字体大小
            'maxWordLength' =>    4,     // 验证码位数
            'minWordLength' => 4, //验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)
        );
        $captcha = new \Common\Library\Org\Util\Captcha($config);
        //$captcha->CreateImage($text);
        //fb($text);
        //session('captcha',$text);
		$verify = new \Think\Verify();
        $verify->entry();
    }
}