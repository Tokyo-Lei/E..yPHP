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

$cate_db = $_DB->select("category", [
    "id",
    "pid",
    "cate_name",
    "cate_keyword",
    "cate_description",
    "cate_url",
    "sort"
],[
    "ORDER" => ["sort"=>"ASC"]
]);

//对分类进行多维排序
$c_result=ClassTree::hTree($cate_db);

//调出分类数据2
$cate_db2 = $_DB->select("category", [
    "id",
    "pid",
    "cate_name",
    "cate_keyword",
    "cate_description",
    "cate_url",
    "sort"

],[
    "id" => intval($_GET['id'])
]);


//加载导航 分类页列表
include 'Menu.php';

?>

    <div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">修改分类</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">编辑分类</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="get" action="<?php echo $App_URL ?>Processing.php">
                                <input type="hidden" name="cate_update" value="cate_update">
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">所属分类</label>
                                    <div class="col-sm-9">
                                        <select name="pid" class="form-control mb-3">
                                            <option value="<?php echo $cate_db2[0]['pid'] ?>">当前分类：<?php echo $cate_db2[0]['cate_name'] ?></option>




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
                                        <input type="text" class="form-control" name="cate_name" value="<?php echo $cate_db2[0]['cate_name'] ?>">
                                    </div>
                                </div>
                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">伪静态地址</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="cate_url" class="form-control" value="<?php echo $cate_db2[0]['cate_url'] ?>">
                                    </div>
                                </div>



                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">关键词</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="cate_keyword" class="form-control" value="<?php echo $cate_db2[0]['cate_keyword'] ?>">
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
                                                <input type="text" name="cate_description" class="form-control" value="<?php echo $cate_db2[0]['cate_description'] ?>">
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
                                                <input type="text"  name="sort" class="form-control" value="<?php echo $cate_db2[0]['sort'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>


                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">外链</label>
                                    <div class="col-sm-9">
                                        <input type="test" name="cate_url" class="form-control" value="<?php echo $cate_db2[0]['cate_url'] ?>">
                                    </div>
                                </div>


                                <div class="line"></div>

                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-3">
                                        <input type="hidden" name="id" value="<?php echo $cate_db2[0]['id'] ?>">
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