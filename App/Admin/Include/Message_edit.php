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



$Message_db = $_DB->select("message",[
    "id",
    "u_name",
    "u_email",
    "u_time",
    "u_audit",
    "u_content",
    "reply",
    "reply_time"
],
    ["id" => intval($_GET['id'])]
);


?>


<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">回复反馈</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">反馈留言数据</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal"  method="get" action="<?php echo $App_URL ?>Processing.php">
                                <input type="hidden" name="Message_edit" value="Message_edit">

                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">用户名：</label>
                                    <div class="col-sm-5">
                                        <?php echo $Message_db[0]['u_name'] ?>
                                    </div>
                                </div>
                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">邮箱：</label>
                                    <div class="col-sm-5">
                                       <?php echo $Message_db[0]['u_email'] ?>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">回馈内容：</label>
                                    <div class="col-sm-5">
                                        <?php echo $Message_db[0]['u_content'] ?>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">审核：</label>
                                    <div class="col-sm-5">
                                        <?php if($Message_db[0]['u_audit'] == 0){echo "审核中";}else{echo"已审";} ?>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-1 form-control-label">回复内容：</label>


                                    <?php
                                     if($Message_db[0]['reply'] == null){
                                     ?>
                                    <div class="col-sm-5">
                                        <textarea name="reply" style="width: 100%;height: 120px"></textarea>
                                    </div>
                                    <?php
                                     }else{
                                    ?>
                                     <div class="col-sm-5">
                                         <?php  echo $Message_db[0]['reply']; ?>
                                     </div>

                                    <?php
                                    }
                                    ?>





                                </div>
                                <div class="line"></div>



                                <div class="form-group row">
                                    <div class="col-sm-4 form-control-label">
                                        <input type="hidden" name="Message_id" value="<?php echo $Message_db[0]['id'] ?>">
                                        <input type="hidden" name="reply_time" value="<?php echo time(); ?>">


                                        <?php
                                        if($Message_db[0]['u_audit'] == 0){
                                            ?>
                                            <a href='<?php echo "../Processing.php?audit_message=".$Message_db[0]['id'];?>' name="fragment_edit" class="btn btn-primary" >通过审核</a>

                                        <?php
                                        }
                                        ?>


                                        <?php
                                        if($Message_db[0]['reply'] == null){
                                        ?>
                                            <button type="submit"  class="btn btn-success" >回复</button>
                                         <?php
                                        }
                                        ?>




                                        <a href='<?php echo "../Processing.php?dele_message=".$Message_db[0]['id'];?>' class='btn btn-danger'>删除</a>
                                    </div>
                                </div>
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

