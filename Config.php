<?php
session_start();

if(!defined('IS_MyPHP')) exit('拒绝访问！'); 

//设置编码为UTF-8
header('Content-Type:text/html;Charset=utf-8');

//网站根目录
define('ROOT_PATH', dirname(__FILE__));

//加载Twig类
require_once ROOT_PATH.'/Library/Twig/Autoloader.php';
//加载Medoo类
require_once ROOT_PATH.'/Library/Medoo.php';
//加载phpError类
require_once ROOT_PATH.'/Library/Php_error.php' ;
\php_error\reportErrors();

//加载Session类
require_once ROOT_PATH.'/Library/Session.php';

//使用Medoo
use Medoo\Medoo;
//使用Twig
Twig_Autoloader::register();

//模板路径
$loader = new Twig_Loader_Filesystem(ROOT_PATH.'/Templates');
//缓存路径
$twig = new Twig_Environment($loader, array(
    'cache' => ROOT_PATH.'/Cache',
    'auto_reload' => true,  //根据文件更新时间，自动更新缓存
    'debug' => true
));

//配置数据库
require_once ROOT_PATH.'/App/Data.php';
//执行数据库
$_DB= new medoo($_DB['mysql']);




$num = $_DB->select("counter", [
        "counter"
]);

$counter_num=++$num[0]['counter'];

if(!session::get('counter'))
    {

        $result = $_DB->update("counter", [
            "counter" => $counter_num
        ]);

        if($result)
        {
            session::set('counter',TRUE);
        }
}




?>