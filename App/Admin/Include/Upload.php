<?php
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');

//如果用户空提交，返回重登录

if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='$admin_url./Admin_login.php';</script>";
    exit();
}


header("Content-type: text/html; charset=utf-8");//设置编码UTF8
$fileInfo = $_FILES['upload_file']; //读取图片文件


$uploadPath = UPLOAD_PATH.'Uploads'; //上传路径
$flag=true; //开启真实文件格式检测
$allowExt=array('jpeg','jpg','gif','png'); //指定格式
$maxSize = 2097152; //规定上传大小2MB
//判断错误号
if ($fileInfo['error'] > 0) {
    switch ($fileInfo['error']) {
        case 1 :
            $mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
            break;
        case 2 :
            $mes = '超过了表单MAX_FILE_SIZE限制的大小';
            break;
        case 3 :
            $mes = '文件部分被上传';
            break;
        case 4 :
            $mes = '没有选择上传文件';
            break;
        case 6 :
            $mes = '没有找到临时目录';
            break;
        case 7 :
        case 8 :
            $mes = '系统错误';
            break;
    }
    $arr['success'] = false;
    $arr['msg'] = $mes;
    echo json_encode($arr);
}
$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION );
if(!is_array($allowExt)){
    exit('{"success":false,"msg":"系统错误""}');
}
//检测上传文件的类型
if (!in_array($ext,$allowExt)) {
    exit('{"success":false,"msg":"非法文件类型"}');
}
//检测上传文件大小是否符合规范
if ($fileInfo['size'] > $maxSize) {
    exit('{"success":false,"msg":"上传文件过大"}');
}
//检测图片是否为真实的图片类型
if($flag){
    if(!getimagesize($fileInfo['tmp_name'])){
        exit('{"success":false,"msg":"不是真实图片类型"}');
    }
}
//检测文件是否是通过HTTP POST方式上传上来
if (!is_uploaded_file($fileInfo ['tmp_name'])) {
    exit('{"success":false,"msg":"文件不是通过HTTP POST方式上传上来的"}');
}
//$uploadPath = 'uploads';
if (!file_exists($uploadPath)) {
    mkdir($uploadPath, 0777, true);
    chmod($uploadPath, 0777);
}
$uniName = md5(uniqid(microtime(true),true)).'.'.$ext;
$destination = $uploadPath.'/'.$uniName;
if (!@move_uploaded_file($fileInfo ['tmp_name'], $destination)) {
    exit('{"success":false,"msg":"文件移动失败"}');
}

//$arr['size'] = $fileInfo['size'];
//$arr['type'] = $fileInfo['type'];
$arr['success'] = true;
$arr['msg'] = "ok";
$arr['file_path'] = $destination;
echo json_encode($arr);


?>