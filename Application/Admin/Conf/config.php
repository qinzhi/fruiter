<?php
return array(

    'DEFAULT_THEME'    =>    'Default',

    'SESSION_PREFIX' => 'admin_',

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/Static',
        '__CKEDITOR__' => __ROOT__ . '/Public/Ckeditor', // 富文本编辑器
        '__CKFINDER__' => __ROOT__ . '/Public/Ckfinder', // 图片资源管理器
        '__ADMIN__' => __ROOT__ . '/Public/' . MODULE_NAME,
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/img',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
        '__OWN__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/own',
        '__OWNJS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/own/js',
    ),

    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(

    ),
    'URL_MAP_RULES'=>array(
        'login' => 'public/login',
        'captcha' => 'public/captcha',
    )
);