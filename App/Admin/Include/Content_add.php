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


?>
<!-- 加载页头 -->
<?php include 'Admin_head.php'; ?>







<?php
include 'nav.php';


?>




<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">撰写内容</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">开始撰写</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal"  method="post" action="<?php echo $App_URL ?>Processing.php">




                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">内容标题</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="content_title">
                                    </div>
                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">编辑器</label>
                                    <div class="col-sm-12">
                                        <textarea id="editor" class="form-control" placeholder="Balabala" autofocus></textarea>

                                    </div>
                                </div>



                                <div class="line"></div>



                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-3">
                                        <button type="submit" name="cate_add" class="btn btn-primary" >保存草稿</button>
                                        <button type="submit" name="cate_add" class="btn btn-primary" >发布</button>
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

<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/simditor/scripts/module.js"></script>
<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Admin/simditor/scripts/simditor.js"></script>


<script>

    $(function(){
        toolbar = [ 'title', 'bold', 'italic', 'underline', 'strikethrough',
            'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|',
            'link', 'image', 'hr', '|', 'indent', 'outdent' ];
        var editor = new Simditor( {
            textarea : $('#editor'),
            placeholder : '这里输入内容...',
            toolbar : toolbar,  //工具栏
            defaultImage : '<?php echo $PUBLIC_URL ?>Admin/simditor/images/image.png', //编辑器插入图片时使用的默认图片
            pasteImage: false, //允许粘贴图片
            upload : {
                url : '/../../Public/Uploads/', //文件上传的接口地址
                params: null, //键值对,指定文件上传接口的额外参数,上传的时候随文件一起提交
                fileKey: 'file', //服务器端获取文件数据的参数名
                connectionCount: 3,
                leaveConfirm: '正在上传文件...'
            }
        });


    })

</script>