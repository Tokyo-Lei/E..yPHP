<?php
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');



     if(isset($_GET['get']) === 'cate_add'){
         $_DB->insert("category", [
             "pid" => intval($_GET['pid']),
             "cate_name" =>Getpost::filterWords($_GET['cate_name']),
             "cate_keyword" => Getpost::filterWords($_GET['cate_keyword']),
             "cate_description" => Getpost::filterWords($_GET['cate_description']),
             "cate_url" => $_GET['cate_url'],
             "sort" => intval($_GET['sort'])
         ]);


         echo "<script>window.location.href='$App_URL_Include./category.php';</script>";
         exit;


     };




    if(isset($_GET['get']) === 'cate_update'){

       print_r($_GET);
        $_DB->update("category", [
            "pid" => intval($_GET['pid']),
            "cate_name" =>Getpost::filterWords($_GET['cate_name']),
            "cate_keyword" => Getpost::filterWords($_GET['cate_keyword']),
            "cate_description" => Getpost::filterWords($_GET['cate_description']),
            "cate_url" => $_GET['cate_url'],
            "sort" => intval($_GET['sort'])
        ],[
            "id" => intval($_GET['id']),
        ]);


        echo "<script>window.location.href='$App_URL_Include./category.php';</script>";
        exit;


    };




    if(isset($_GET['dele']) === 'del_cache'){

        $cache = dirname(dirname(dirname(__FILE__)))."/Cache/";
        $cache_file = new File();
        $cache_file -> removedir($cache);


        echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:)</h1><p>更新缓存成功！ </p></div>';
        echo '<script> setTimeout("history.back()", 1000); </script>';

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

