<?php
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once(ROOT_PATH . '/../Admin_config.php');

//如果用户空提交，返回重登录

if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='../login.php';</script>";
    exit();

}
include 'Admin_head.php';

include 'Menu.php';

?>


<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">填写碎片</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">碎片需求</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal"  method="post" action="<?php echo $App_URL ?>Processing.php">


                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">碎片标题</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="f_title">
                                    </div>
                                </div>
                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">碎片标签</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="f_tag">
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">碎片内容</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="f_text">
                                    </div>
                                </div>
                                <div class="line"></div>



                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 form-control-label">
                                        <button type="submit" name="fragment_add" class="btn btn-success" >提交</button>
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

<script type="text/javascript" src="<?php echo $PUBLIC_URL ?>Common/editormd/editormd.min.js"></script>


<script>

    var testEditor;

    $(function() {
        testEditor = editormd("editormd", {
            width   : "100%",
            height  : 440,
            syncScrolling : "single",
            toolbarIcons : function() {
                return ["undo", "redo", "|", "del","italic","quote","ucwords","uppercase","lowercase","|","h1","h2","h3","h4","h5","h6","|","list-ul","list-ol","hr","|","link","reference-link","image","code","preformatted-text","code-block","table","datetime","html-entities","pagebreak","|","goto-line","watch","preview","clear","search","|"]
            },
            path    : "<?php echo $PUBLIC_URL ?>Common/editormd/lib/",
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "<?php echo $App_URL_Include ?>Upload.php?data=img"

        });


    });

</script>