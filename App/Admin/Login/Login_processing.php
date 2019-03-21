<?php
// PHP处理中心
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');

if(!empty($_POST['login'])){
    exit('非法访问!');  
}else{

    if(empty($_POST['username']) && empty($_POST['password'])){
        
        echo "<script>window.location.href='$admin_url./../Login.php';</script>";
    }

    $admin_DB = $_DB->select("user", [
        "username",
        "password",
        "level"
    ],[
        "username" => Getpost::filterWords($_POST['username']),
        "password" => md5($_POST['password'])

    ]);

    if(!empty($admin_DB[0]['username']) == null){
        session::destroy();
        echo "<script>window.location.href='$admin_url./../Login.php';</script>";
        exit();

    }
    $_username = $admin_DB[0]['username'];
    $_password = $admin_DB[0]['password'];
    $_level = $admin_DB[0]['level'];
    $_session_data = md5($admin_DB[0]['username']);

    if(Getpost::filterWords($_POST['username'])== $admin_DB[0]['username'] && md5($_POST['password'])==$admin_DB[0]['password']){
        //登录成功
        if($_level != 2){
            session::destroy();
            echo "<script>window.location.href='$admin_url./../Login.php';</script>";
            exit();
        }
        session::set('username', $_session_data);
        session::set('id', $_userid);
        echo "<script>window.location.href='/admin';</script>";

    }else{
        session::destroy();
        echo "<script>window.location.href='$admin_url./../Login.php';</script>";
        exit();
    }

};
