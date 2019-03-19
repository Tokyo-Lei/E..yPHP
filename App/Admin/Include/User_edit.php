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


//加载页头
include 'Admin_head.php';



//调出
$user_edit = $_DB->select("user", [
    "id",
    "username",
    "password",
    "nickname",
    "email",
    "thumbnail",
    "level"

],[
    "id" => intval($_GET['id'])
]);

//加载导航 分类页列表
include 'nav.php';

?>

    <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">修改用户数据</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">修改</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="get" action="<?php echo $App_URL ?>Processing.php">
                                <input type="hidden" name="user_update" value="user_update">

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">用户账号</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="username" class="form-control" value="<?php echo $user_edit[0]['username'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>



                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">用户昵称</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="nickname" class="form-control" value="<?php echo $user_edit[0]['nickname'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>



                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">用户密码</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="password" class="form-control" placeholder="<?php echo $user_edit[0]['password'] ?>" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">电子邮箱</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="email" name="email" class="form-control" value="<?php echo $user_edit[0]['email'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">用户头像</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="thumbnail" class="form-control" value="<?php echo $user_edit[0]['thumbnail'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">权限等级</label>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                            <select name="level" class="form-control mb-3 ">
                                                <option value="<?php echo $user_edit[0]['level'] ?>">当前：<?php

                                                    if($user_edit[0]['level'] == 1){
                                                        echo "注册用户";
                                                    }else if($user_edit[0]['level'] == 2){
                                                        echo "管理员";
                                                    }else{
                                                        echo "禁止用户";
                                                    }

                                                    ?></option>

                                                <option value="1">注册用户</option>
                                                <option value="2">管理员</option>
                                                <option value="0">禁止用户</option>

                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-3">
                                        <input type="hidden" name="id" value="<?php echo $user_edit[0]['id'] ?>">
                                        <button type="submit" class="btn btn-primary" >更新</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>


<?php include 'Admin_footer.php'; ?>