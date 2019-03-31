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

//加载页头
include 'Admin_head.php';

//调出分类数据
$cate_db = $_DB->select("category", [
    "id",
    "pid",
    "cate_name",
    "cate_hide",
    "sort"
]);

//对分类进行多维排序
$c_result=ClassTree::hTree($cate_db);

//加载导航 分类页列表
include 'Menu.php';

?>


    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">新建分类</h2>
            </div>
        </header>


        <section class="tables">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-header d-flex align-items-center">
                                <h3 class="h4">创建新分类</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal"  method="post" action="<?php echo $App_URL ?>Processing.php">
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">所属分类</label>
                                        <div class="col-sm-9">
                                            <select name="pid" class="form-control mb-3">
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
                                        <label class="col-sm-3 form-control-label">分类名称</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="cate_name">
                                        </div>
                                    </div>
                                    <div class="line"></div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">伪静态地址</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="cate_url" class="form-control">
                                        </div>
                                    </div>



                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">关键词</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="cate_keyword" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">描述</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" name="cate_description" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">排序</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <input type="text"  name="sort" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="line"></div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">外链</label>
                                        <div class="col-sm-9">
                                            <input type="test" name="cate_url" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">显示/隐藏</label>
                                        <div class="col-sm-3">
                                            <select name="cate_hide" class="form-control mb-3">
                                                <option value='0'>显示菜单</option>
                                                <option value='1'>隐藏菜单</option>

                                            </select>
                                        </div>
                                    </div>



                                    <div class="line"></div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 offset-sm-3">
                                            <button type="submit" name="cate_add" class="btn btn-primary" >创建</button>
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