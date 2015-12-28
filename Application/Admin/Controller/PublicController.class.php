<?php
/**
 * Created by PhpStorm.
 * User: qinzhi
 * Date: 15-12-26
 * Time: 下午4:20
 */
namespace Admin\Controller;
use Think\Controller,Think\Verify;
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
            'imageW' => '100',   //验证码宽度 设置为0为自动计算
            'imageH' => '32',   //验证码高度 设置为0为自动计算
            'fontSize' => 14,    // 验证码字体大小
            'useNoise'    =>    false, // 是否添加杂点 默认为true
            'useCurve' => false,    //是否使用混淆曲线 默认为true
            'length' =>    4,     // 验证码位数
            'useImgBg' => false,    //是否使用背景图片 默认为false
            'bg' => array(255, 255, 255), //验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)
        );
		$verify = new Verify($config);
        $verify->entry();
    }
}