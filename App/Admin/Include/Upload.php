<?php
    session_start();
    define('IS_MyPHP', TRUE);
    //定义根目录
    define('ROOT_PATH',dirname(__FILE__));
    //加载配置
    require_once(ROOT_PATH . '/../Admin_config.php');
    $web = $_DB->select("basic",["basic_image"],["id" => 1]);
    $img_img = html_entity_decode($web[0]['basic_image']);
    $img_img2 = explode(",",$img_img);


    header("Content-Type:text/html; charset=utf-8");
    header("Access-Control-Allow-Origin: *");


	$savePath = UPLOAD_PATH.'Uploads/';
	$saveURL  = $PUBLIC_URL.'Uploads/';

	$formats  = [
		'image' => $img_img2
    ];
    $name = 'editormd-image-file';

    if (isset($_FILES[$name]))
    {
        $imageUploader = new EditorMdUploader($savePath, $saveURL, $formats['image'],$randomNameType=1,false);  // Ymdhis表示按日期生成文件名，利用date()函数

        $imageUploader->config(array(
            'maxSize' => 1024,        // 允许上传的最大文件大小，以KB为单位，默认值为1024
            'cover'   => true         // 是否覆盖同名文件，默认为true
        ));

        if ($imageUploader->upload($name))
        {
            $imageUploader->message('上传成功！', 1);
        }
        else
        {
            $imageUploader->message('上传失败！', 0);
        }
    }
?>