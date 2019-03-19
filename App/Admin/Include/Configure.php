<?php
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');


//如果用户空提交，返回重登录


if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='$admin_url./login.php';</script>";

    exit();

}


?>
<!-- 加载页头 -->
<?php include 'Admin_head.php';


//调出分类数据
$web = $_DB->select("basic","*",[
"id" => 1
]);



include 'nav.php';



?>



<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">站点配置</h2>
        </div>
    </header>


    <!-- Forms Section-->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">设置</h3>
                        </div>
                        <div class="card-body">

                            <form method="post" action="<?php echo $App_URL ?>Processing.php">
                                <div class="form-group">
                                    <label class="form-control-label">网站名称</label>
                                    <input type="text"  class="form-control" name="web_title" value="<?php echo $web[0]['web_title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">网站邮箱</label>
                                    <input type="email"  class="form-control" name="web_email" value="<?php echo $web[0]['web_email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">网站版权</label>
                                    <input type="text"  class="form-control" name="web_copyright" value="<?php echo $web[0]['web_copyright'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="web_post" value="更新" class="btn btn-primary" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">推广</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo $App_URL ?>Processing.php">
                                <div class="form-group">
                                    <label class="form-control-label">SEO关键词</label>
                                        <input  type="text"  class="form-control" name="seo_keyword" value="<?php echo $web[0]['seo_keyword'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">SEO描述</label>
                                        <input  type="text"  class="form-control " name="seo_description" value="<?php echo $web[0]['seo_description'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">统计代码</label>
                                        <input type="text"   class="form-control " name="seo_count" value="<?php echo $web[0]['seo_count'] ?>">
                                </div>
                                <div class="form-group">
                                        <input type="submit" name="seo_post" value="更新" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">配置</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="<?php echo $App_URL ?>Processing.php">
                                <div class="form-group">
                                    <label class="form-control-label">分页数量</label>
                                    <input  type="text"  class="form-control" name="basic_num" value="<?php echo $web[0]['basic_num'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">上传格式</label>
                                    <input  type="text"  class="form-control " name="basic_image" value="<?php echo $web[0]['basic_image'] ?>">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="basic_post" value="更新" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">备份</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="">

                                <div class="form-group">
                                    <input type="submit" value="备份数据库" class="btn btn-primary">
                                    <input type="submit" value="优化数据库" class="btn btn-primary">
                                    <input type="submit" value="修复数据库" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


    </section>

<!-- Page Footer-->
<footer class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright © 2018 - 2019 www.kyotos.top By NaokiOno All Rights Reserved.</p>
            </div>
            <div class="col-sm-6 text-right">
                <p>Design by Bootstrapious.</p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
        </div>
    </div>
</footer>
</div>
</div>
</div>
<?php include 'Admin_footer.php'; ?>
