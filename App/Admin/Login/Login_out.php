<?php
session_start();
define('IS_MyPHP', TRUE);
//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');


session::destroy();


echo('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style>
<div style="padding: 24px 48px;"> <h1>:)</h1><p>安全退出成功！ <b></b></p><br/>版本 V0.1</div>

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.slim.min.js"></script> 
<script src="../../../../Public/typeit.min.js"></script> 
<script> 
$("b").typeIt({
    whatToType: ["EasyPHP.", "E...yPHP！"],
    typeSpeed: 100,
    breakLines: false
});
</script> 
');

header("refresh:5;url=/../admin");
exit;