<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>后台登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="登陆">
    <meta name="author" content="admin">

    <!-- CSS -->

    <link rel="stylesheet" href="/Public/Admin/css/supersized.css">
    <link rel="stylesheet" href="/Public/Admin/css/login.css">
    <link href="/Public/Static/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="/Public/Admin/js/html5.js"></script>
    <![endif]-->
    <script src="/Public/Static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/tooltips.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/login.js"></script>
</head>

<body>

<div class="page-container">
    <div class="main_box">
        <div class="login_box">
            <div class="login_logo">
                <h1>登陆</h1>
            </div>

            <div class="login_form">
                <form id="login_form" method="post" onsubmit="return false;"autocomplete="off">
                    <div class="form-group">
                        <label for="account" class="t">账　号：</label>
                        <input id="account" value="" name="account" type="text" class="form-control x319 in">
                    </div>
                    <div class="form-group">
                        <label for="password" class="t">密　码：</label>
                        <input id="password" value="" name="password" type="password"
                               class="password form-control x319 in">
                    </div>
                    <div class="form-group">
                        <label for="captcha" class="t">验证码：</label>
                        <input id="captcha" name="captcha" type="text" class="form-control x212 in">
                        <img id="verify" alt="点击更换" title="点击更换" src="/captcha" class="m">
                    </div>
                    <div class="form-group">
                        <label class="t"></label>
                        <label for="remember" class="m">
                            <input id="remember" type="checkbox" name="remember" value="true">&nbsp;一周内免登陆!</label>
                    </div>
                    <div class="form-group space">
                        <label class="t"></label>　　　
                        <button type="button"  id="submit_btn"
                                class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp; </button>
                        <input type="reset" value="&nbsp;重&nbsp;置&nbsp;" class="btn btn-default btn-lg">
                    </div>
                </form>
            </div>
        </div>
        <div class="bottom">Copyright &copy; 2015 - 2016 <a href="#">系统登陆</a></div>
    </div>
</div>

<!-- Javascript -->
<script>
    var slide = function(step){
        var a=[];
        for(var i=0;i<step;i++){
            a[i] = {};
            a[i].image = '/Public/Admin/images/login/slide/'+i+'.jpg';
        }
        return a;
    }(3);
    loading = '/Public/Admin/images/login/loading.gif';
    error_icon = '/Public/Admin/images/login/error.png';
    $(function(){
        $('#verify').click(function(){
            $(this).attr('src','/captcha?rand=' + Math.random());
        });
    });
</script>
<script src="/Public/Admin/js/supersized.3.2.7.min.js"></script>
<script src="/Public/Admin/js/supersized-init.js"></script>
</body>
</html>