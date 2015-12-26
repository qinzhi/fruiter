<?php
return array(
    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/Static',
        '__ADMIN__' => __ROOT__ . '/Public/' . MODULE_NAME,
        '__ADDONS__' => __ROOT__ . '/Public/' . MODULE_NAME . '/Addons',
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/images',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME . '/js',
    ),

    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'login' => 'public/login',
        'verify_code' => 'public/verify_code',
    ),
);