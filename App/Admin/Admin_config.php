<?php
//定义根目录
define('ADMIN_PATH',dirname(__FILE__));
//定义session
define('LIB_PATH',$_SERVER['DOCUMENT_ROOT'].'/Library');

date_default_timezone_set('PRC');

print_r( date()) ;


//定义Admin链接
$admin_url='http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/')+1);


//定义在App/Admin/链接
$App_URL = 'http://'.$_SERVER['SERVER_NAME'].'/App/Admin/';

//定义在App/Admin/Include链接
$App_URL_Include = 'http://'.$_SERVER['SERVER_NAME'].'/App/Admin/Include/';

//定于静态链接
$PUBLIC_URL ='http://'.$_SERVER['SERVER_NAME'].'/Public/';




define('UPLOAD_PATH',$_SERVER['DOCUMENT_ROOT'].'/Public/');



//加载session
require_once (LIB_PATH.'/Session.php');

//加载medoo
require_once (LIB_PATH.'/Medoo.php');
//使用Medoo
use Medoo\Medoo;

//加载过滤
require_once (LIB_PATH.'/Post_Get.php');


//加载分类
require_once (LIB_PATH.'/ClassTree.class.php');

//加载文件类
require_once (LIB_PATH.'/File.class.php');


//加载分页类
require_once (LIB_PATH.'/Page.php');

//加载编辑器上传类
require_once(LIB_PATH.'/Editormd.uploader.class.php');

//加载phpError类
require_once $_SERVER['DOCUMENT_ROOT'].'./Library/Php_error.php' ;
\php_error\reportErrors();


//加载备份类
require_once(LIB_PATH.'/Backup.php');



$_URL_= pathinfo($_SERVER['PHP_SELF']);
$_URL_INCLUDE = pathinfo($_URL_['dirname']);





//配置数据库
$_DB['mysql']['pconnect'] = true;//设置是否长连接
$_DB['mysql']['charset'] = 'utf8';//设置连接编码
$_DB['mysql']['server'] = '127.0.0.1';
$_DB['mysql']['username'] = 'root';
$_DB['mysql']['password'] = 'root';
$_DB['mysql']['database_name'] = 'myphp';
$_DB['mysql']['database_type'] = 'mysql';
$_DB['mysql']['prefix'] = 'easy_';
$_DB['mysql']['port'] = 3306;

//执行数据库
$_DB= new Medoo($_DB['mysql']);

$_VERSION = 0.01;
$_MEDOO = 1.6;

$_userid = 1;
?>