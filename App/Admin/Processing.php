<?php
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');


    //调出分类数据
    $cate_db = $_DB->select("category", [
        "id",
        "pid",
        "sort"
    ]);
    //对分类进行多维排序
    $c_result=ClassTree::hTree($cate_db);
    $c_r_e = array_values($c_result);

    foreach ($c_r_e as $v){
        $_Ywshuzu_ = $v['id'];
        $_Ywshuzu_SUB = $v['sub'];
        if(isset($v['sub'])){
            foreach ($v['sub'] as $m){
                $_Ewshuzu_ = $m['id'];
                $_Ewshuzu_SUB = $m['sub'];
                    if(isset($m['sub'])){
                        foreach ($m['sub'] as $n){
                            $_Swshuzu_ = $n['id'];
                            $_Swshuzu_PID = $n['pid'];
                        }
                    }
            }
        }
    }



    //新增分类
    if(isset($_POST['cate_add'])){
        //如果分类关联PID大于3 就不能创建
        if($_Swshuzu_PID >= 3){
            echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>目前只支持创建三级分类！ </p></div>';
            echo '<script> setTimeout("history.back()", 2000); </script>';
            exit;

        }


         $_DB->insert("category", [
             "pid" => intval($_POST['pid']),
             "cate_name" =>Getpost::filterWords($_POST['cate_name']),
             "cate_keyword" => Getpost::filterWords($_POST['cate_keyword']),
             "cate_description" => Getpost::filterWords($_POST['cate_description']),
             "cate_url" => $_POST['cate_url'],
             "sort" => intval($_POST['sort'])
         ]);
         echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
         exit;
     };

    //编辑更新分类
    if(isset($_GET['cate_update']) == 'cate_update'){
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
        echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
        exit;
    };

    //删除分类
    if(isset($_GET['dele_cate'])){


        //删除判断
        if($_Ywshuzu_ == $_GET['dele_cate']){
            if(!empty($_Ywshuzu_SUB)){
                echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>请先删除二级分类！ </p></div>';
                echo '<script> setTimeout("history.back()", 1000); </script>';
                exit;
            }
        }
        if(@$_Ewshuzu_ == $_GET['dele_cate']){
            if(!empty($_Ewshuzu_SUB)){
                echo '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:(</h1><p>请先删除三级分类！ </p></div>';
                echo '<script> setTimeout("history.back()", 1000); </script>';
                exit;
            }
        }

        $_DB->delete("category",[
            "id" => intval($_GET['dele_cate']),
        ]);

        echo "<script>window.location.href='$App_URL_Include./Category.php'</script>";
        exit;
    };









    //更新缓存
    if(isset($_GET['dele']) == 'del_cache'){

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

