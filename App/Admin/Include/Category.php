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


//加载页头
include 'Admin_head.php';

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

//加载导航 分类页列表
include 'nav.php';

?>



<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">管理分类</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">分类数据</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>分类名称</th>
                                        <th>排序</th>
                                        <th>管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    // 逆数组array_reverse()
                                    foreach ($c_result as $v){

                                        echo "<tr>";
                                        echo "<th scope='row'>".$v['id']."</th>";
                                        echo "<td>".$v['cate_name']."</td>";
                                        echo "<td>".$v['sort']."</td>";
                                        echo "<td><a href='".$admin_url."Category_edit.php?id=".$v['id']."' class='btn btn-info btn-sm' target='_top'>编辑</a> <a href='".$App_URL."Processing.php?dele_cate=".$v['id']."' class='btn btn-danger btn-sm'>删除</a></td>";
                                        echo "</tr>";


                                        if(isset($v['sub'])){


                                            foreach ($v['sub'] as $k => $s){

                                                echo "<tr>";
                                                echo "<th scope='row'>".$s['id']."</th>";
                                                echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;|-".$s['cate_name']."</td>";
                                                echo "<td>".$s['sort']."</td>";
                                                echo "<td><a href='".$admin_url."Category_edit.php?id=".$s['id']."'' class='btn btn-info btn-sm'>编辑</a> <a href='".$App_URL."Processing.php?dele_cate=".$s['id']."' class='btn btn-danger btn-sm'>删除</a></td>";
                                                echo "</tr>";


                                                if(isset($s['sub'])){


                                                    foreach ($s['sub'] as $m => $n){

                                                        echo "<tr>";
                                                        echo "<th scope='row'>".$n['id']."</th>";
                                                        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-".$n['cate_name']."</td>";
                                                        echo "<td>".$n['sort']."</td>";
                                                        echo "<td><a href='".$admin_url."Category_edit.php?id=".$n['id']."' class='btn btn-info btn-sm'>编辑</a> <a href='".$App_URL."Processing.php?dele_cate=".$n['id']."' class='btn btn-danger btn-sm'>删除</a></td>";
                                                        echo "</tr>";
                                                    }
                                                }


                                            }
                                        }

                                        ?>

                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="col-lg-12">-->
                <!---->
                <!---->
                <!--                    <nav>-->
                <!--                        <ul class="pagination ">-->
                <!--                            <li class="page-item disabled has-shadow">-->
                <!--                                <a class="page-link" href="#" tabindex="-1">上一页</a>-->
                <!--                            </li>-->
                <!--                            <li class="page-item has-shadow"><a class="page-link" href="#">1</a></li>-->
                <!--                            <li class="page-item active has-shadow">-->
                <!--                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
                <!--                            </li>-->
                <!--                            <li class="page-item has-shadow"><a class="page-link" href="#">3</a></li>-->
                <!--                            <li class="page-item has-shadow">-->
                <!--                                <a class="page-link" href="#">下一页</a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!---->
                <!--                    </nav>-->
                <!---->
                <!--                </div>-->
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
