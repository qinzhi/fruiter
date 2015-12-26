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
        $this->display();
    }

    public function verify_code(){
        $config = array(
            'expire' => 600,    //验证码的有效期（秒）
            'useNoise' => false,    //是否添加杂点 默认为true
            'useCurve' => false,    //是否绘干扰线 默认为true
            'imageW' => '100',   //验证码宽度 设置为0为自动计算
            'imageH' => '32',   //验证码高度 设置为0为自动计算
            'fontSize' =>    30,    // 验证码字体大小
            'length' =>    4,     // 验证码位数
            'bg' => array(255,255,255), //验证码背景颜色 rgb数组设置，例如 array(243, 251, 254)
            'codeSet' => '0123456789'
        );
        //$config = array();
        $verify = new Verify($config);
        $verify->entry();
    }
}