<?php
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');


//传统方法
if(!empty($_GET['get'] == 'cate_add'))
{

    $_DB->insert("category", [
        "pid" => intval($_GET['pid']),
        "cate_name" =>Getpost::filterWords($_GET['cate_name']),
        "cate_keyword" => Getpost::filterWords($_GET['cate_keyword']),
        "cate_description" => Getpost::filterWords($_GET['cate_description']),
        "cate_url" => $_GET['cate_url'],
        "sort" => intval($_GET['sort'])
    ]);
    echo "<script>window.location.href='$admin_url./category.php';</script>";
    exit;
}else{

    exit('非法提交！');
}


//if ($_REQUEST['ajax'] == 'cate_add') {
//
//
//
//    $result["msg"] = 1;
//    echo json_encode($result);
//
//
//
//}
//

