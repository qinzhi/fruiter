<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <meta charset="utf-8">
    <title>后台登陆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="登陆">
    <meta name="author" content="admin">

    <!-- CSS -->

    <link rel="stylesheet" href="__CSS__/supersized.css">
    <link rel="stylesheet" href="__CSS__/login.css">
    <link href="__STATIC__/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="__JS__/html5.js"></script>
    <![endif]-->
    <script src="__STATIC__/js/jquery.min.js"></script>
    <script type="text/javascript" src="__JS__/jquery.form.js"></script>
    <script type="text/javascript" src="__JS__/tooltips.js"></script>
    <script type="text/javascript" src="__JS__/login.js"></script>
</head>

<body>

<div class="page-container">
    <div class="main_box">
        <div class="login_box">
            <div class="login_logo">
                <h1>登陆</h1>
            </div>

            <div class="login_form">
                <form action="index.html" id="login_form" method="post">
                    <div class="form-group">
                        <label for="j_username" class="t">邮　箱：</label>
                        <input id="email" value="" name="email" type="text" class="form-control x319 in"
                               autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="j_password" class="t">密　码：</label>
                        <input id="password" value="" name="password" type="password"
                               class="password form-control x319 in">
                    </div>
                    <div class="form-group">
                        <label for="j_captcha" class="t">验证码：</label>
                        <input id="j_captcha" name="j_captcha" type="text" class="form-control x212 in">
                        <img id="verify_code" alt="点击更换" title="点击更换" src="/verify_code" class="m">
                    </div>
                    <div class="form-group">
                        <label class="t"></label>
                        <label for="j_remember" class="m">
                            <input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
                    </div>
                    <div class="form-group space">
                        <label class="t"></label>　　　
                        <button type="button"  id="submit_btn"
                                class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp </button>
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
            a[i].image = '__IMG__/login/slide/'+i+'.jpg';
        }
        return a;
    }(3);
    loading = '__IMG__/login/loading.gif';
    error_icon = '__IMG__/login/error.png';
    $(function(){
        $('#verify_code').click(function(){
            $(this).attr('src','/verify_code?rand=' + Math.random());
        });
    });
</script>
<script src="__JS__/supersized.3.2.7.min.js"></script>
<script src="__JS__/supersized-init.js"></script>
<script src="__JS__/scripts.js"></script>
</body>
</html>