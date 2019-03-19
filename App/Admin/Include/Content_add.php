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
<?php include 'Admin_head.php';

//调出分类数据
$cate_db = $_DB->select("category", [
    "id",
    "pid",
    "cate_name",
    "sort"

],[
    "ORDER" => ["sort"=>"ASC"]
]);

//对分类进行多维排序
$c_result=ClassTree::hTree($cate_db);

?>







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
                                    <label class="col-sm-1 form-control-label">撰写标题</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="content_title">
                                    </div>
                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">所属分类</label>
                                    <div class="col-sm-5">
                                        <select name="content_pid" class="form-control mb-3">
                                            <option value='0'>- 顶级分类 -</option>

                                            <?php

                                            foreach($c_result as $row)
                                            {
                                                echo "<option value='".$row['id']."'>".$row['cate_name']."</option>";
                                                if(isset($row['sub'])){

                                                    foreach($row['sub'] as $k => $v){

                                                        echo "<option value='".$v['id']."'>　&nbsp;|--".$v['cate_name']."</option>";

                                                        if(isset($v['sub'])){
                                                            foreach($v['sub'] as $m => $n){

                                                                echo "<option value='".$n['id']."'>　　&nbsp;|--".$n['cate_name']."</option>";
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
                                    <label class="col-sm-1 form-control-label">关键词</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="content_keyword">
                                    </div>
                                </div>
                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">描述/摘要</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="content_description">
                                    </div>
                                </div>
                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">缩略图</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="content_thumbnail">
                                    </div>
                                </div>
                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">内容编辑器</label>
                                    <div class="col-sm-12" id="editormd">
                                        <textarea id="editor" class="form-control"  autofocus style="display:none;" name="content_text"></textarea>
                                    </div>
                                </div>




                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 form-control-label">
                                        <button type="submit" name="content_draft" class="btn btn-info" value="1">保存</button>
                                        <button type="submit" name="content_add" class="btn btn-success" >发布</button>
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

    // ["undo","redo","|","bold","del","italic","quote","ucwords","uppercase","lowercase","|","h1","h2","h3","h4","h5","h6","|","list-ul","list-ol","hr","|","link","reference-link","image","code","preformatted-text","code-block","table","datetime","emoji","html-entities","pagebreak","|","goto-line","watch","preview","fullscreen","clear","search","|","help","info"],simple:["undo","redo","|","bold","del","italic","quote","uppercase","lowercase","|","h1","h2","h3","h4","h5","h6","|","list-ul","list-ol","hr","|","watch","preview","fullscreen","|","help","info"]
</script>