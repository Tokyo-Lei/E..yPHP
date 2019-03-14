<?php
define('IS_MyPHP', TRUE);

//加载配置
include ('../../Config.php');

$datas = $_DB->select("tokyo_users", [
    "id",
    "username",
    "password"
]);


echo $twig->render('new.html', array('user' => $datas));