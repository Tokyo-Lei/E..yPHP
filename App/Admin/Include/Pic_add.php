<?php
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH', dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');

//如果用户空提交，返回重登录

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='../login.php';</script>";
    exit();

}

include 'Admin_head.php';

//调出分类数据
$cate_db = $_DB->select("category", [
    "id",
    "pid",
    "cate_name",
    "sort"

], [
    "ORDER" => ["sort" => "ASC"]
]);

//对分类进行多维排序
$c_result = ClassTree::hTree($cate_db);

include 'Menu.php';

?>


<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">新增图片</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">添加图片</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="Pic_update.php">


                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">图片标题</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="pic_title">
                                    </div>
                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">所属分类</label>
                                    <div class="col-sm-5">
                                        <select name="content_pid" class="form-control mb-3">
                                            <option value='0'>- 顶级分类 -</option>

                                            <?php

                                            foreach ($c_result as $row) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['cate_name'] . "</option>";
                                                if (isset($row['sub'])) {

                                                    foreach ($row['sub'] as $k => $v) {

                                                        echo "<option value='" . $v['id'] . "'>　&nbsp;|--" . $v['cate_name'] . "</option>";

                                                        if (isset($v['sub'])) {
                                                            foreach ($v['sub'] as $m => $n) {

                                                                echo "<option value='" . $n['id'] . "'>　　&nbsp;|--" . $n['cate_name'] . "</option>";
                                                            }

                                                        }
                                                    }
                                                }
                                            }

                                            ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">选择前端样式</label>
                                    <div class="col-sm-5">
                                        <select name="p_img_id" class="form-control mb-3">
                                            <option value='p_img_1'>- p_img_1 -</option>
                                            <option value='p_img_2'>- p_img_2 -</option>
                                            <option value='p_img_3'>- p_img_3 -</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select name="is_id" class="form-control mb-3">
                                            <option value='is-1'>- is-1 -</option>
                                            <option value='is-2'>- is-2 -</option>
                                            <option value='is-3'>- is-3 -</option>
                                            <option value='is-4'>- is-4 -</option>
                                            <option value='is-5'>- is-5 -</option>
                                            <option value='is-6'>- is-6 -</option>
                                            <option value='is-7'>- is-7 -</option>
                                            <option value='is-8'>- is-8 -</option>
                                            <option value='is-9'>- is-9 -</option>
                                            <option value='is-10'>- is-10 -</option>
                                            <option value='is-11'>- is-11 -</option>
                                            <option value='is-12'>- is-12-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="line"></div>



                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">选择上传文件</label>

                                    <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="file" name="uploadFile" id="uploadFile" accept=".jpg, .png" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" id="uploadSubmit" value="Upload" class="btn btn-info" />
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div id="targetLayer" style="display:none;"></div>

                                            <div id="loader-icon" style="display:none;"><img src="loader.gif" /></div>
                                    </div>
                                    </div>




                                <div class="line"></div>




                                <div class="form-group row">
                                    <div class="col-sm-4 form-control-label">
                                        <input type="hidden" name="content_time" value="<?php echo time(); ?>">
                                        <button type="submit" name="content_draft" class="btn btn-info" value="1">保存
                                        </button>
                                        <button type="submit" name="content_add" class="btn btn-success">发布</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/js/jquery.form.js"></script>


<script>
    $(document).ready(function(){
        $('#uploadImage').submit(function(event){
            if($('#uploadFile').val())
            {
                event.preventDefault();
                $('#loader-icon').show();
                $('#targetLayer').hide();
                $(this).ajaxSubmit({
                    target: '#targetLayer',
                    beforeSubmit:function(){
                        $('.progress-bar').width('50%');
                    },
                    uploadProgress: function(event, position, total, percentageComplete)
                    {
                        $('.progress-bar').animate({
                            width: percentageComplete + '%'
                        }, {
                            duration: 1000
                        });
                    },
                    success:function(){
                        $('#loader-icon').hide();
                        $('#targetLayer').show();
                    },
                    resetForm: true
                });
            }
            return false;
        });
    });
</script>