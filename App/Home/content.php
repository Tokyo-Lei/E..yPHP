<?php

define('IS_MyPHP', TRUE);

//加载配置
include ('../../Config.php');




$datas = $_DB->select("tokyo_users", [
    "id",
    "username",
    "password"
], [
    "id" => htmlentities($_GET['id'])
]);



echo $twig->render('content.html',array('user'=>$datas));