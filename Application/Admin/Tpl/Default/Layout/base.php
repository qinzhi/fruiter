<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 1.0.0
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />

    <block name="title"><title>网站后台</title></block>

    <block name="meta">
        <meta name="description" content="blank page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="__IMG__/favicon.png" type="image/x-icon">
    </block>


    <!--Basic Styles-->
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="__CSS__/font-awesome.min.css" rel="stylesheet" />
    <link href="__CSS__/weather-icons.min.css" rel="stylesheet" />
    <link href="__CSS__/typicons.min.css" rel="stylesheet" />
    <link href="__CSS__/animate.min.css" rel="stylesheet" />
    <link id="beyond-link" href="__CSS__/beyond.min.css" rel="stylesheet" />
    <!--Fonts-->

    <block name="plugin_css">
        <link href="__CSS__/dataTables.bootstrap.css" rel="stylesheet" />
    </block>

    <block name="own_css">
        <link href="__CSS__/soa.min.css" rel="stylesheet" />
    </block>

    <block name="css">

    </block>

    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <script src="__STATIC__/js/jquery.min.js"></script>
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="__JS__/skins.min.js"></script>

    <block name="own_js">
        <script src="__JS__/lib.js"></script>
    </block>
</head>
<body>

    <block name="loading">
        <include file="Layout/loading"/>
    </block>

    <block name="navbar">
        <include file="Layout/navBar"/>
    </block>

    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">关键字搜索</div>
                </div>
                <!-- /Page Sidebar Header -->

                <block name="slideBar">
                    <include file="Layout:sideBar"/>
                </block>
            </div>

            <!-- Page Content -->
            <div class="page-content">

                <block name="breadcrumbs">
                    <include file="Layout:breadcrumbs"/>
                </block>

                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <block name="header-title">
                            <h1>首页</h1>
                        </block>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <block name="content"></block>
                </div>
                <!-- /Page Body -->
            </div>
        </div>
    </div>

    <block name="common_js">
        <include file="Layout:common.js"/>
    </block>

    <block name="js"></block>

</body>
</html>
