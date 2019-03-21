<?php
//定义IS_MyPHP
define('IS_MyPHP', TRUE);
//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Config.php');


//运行首页
echo $twig->render('index.html',array('num'=>$counter_num));














?>