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


?>
<!-- 加载页头 -->
<?php include 'Admin_head.php';

include 'Menu.php';





//文章总数
$totalItems = $_DB->count("message");
$web = $_DB->select("basic",["basic_num"],["id" => 1]);

//设置页面显示数量
$itemsPerPage = $web[0]['basic_num'];

//当前页
if(isset($_GET['page'])==""){
    $currentPage = 1;
}else{
    $currentPage = $_GET['page'];
}
$urlPattern = $App_URL_Include.'Message.php?page=(:num)';
$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

$new_currentPage = ($currentPage-1)*$web[0]['basic_num'];


//获取内容数据
$message_db = $_DB->select("message",  [
    "id",
    "u_name",
    "u_email",
    "u_time",
    "u_audit",
    "u_content",
    "reply",
    "reply_time"
],
    [
            "ORDER" => ["id"=>"DESC"],
            "LIMIT" => [$new_currentPage, $web[0]['basic_num']]
    ]
);

?>

<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">留言管理</h2>
        </div>
    </header>


    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">回馈数据</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>时间</th>
                                        <th>内容</th>
                                        <th>用户名</th>
                                        <th>邮箱</th>
                                        <th>状态</th>
                                        <th>审核</th>
                                        <th>管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    // 逆数组array_reverse()
                                    foreach ($message_db as $v){

                                        echo "<tr>";
                                        echo "<th scope='row'>".date("Y-m-d H:i:s",$v['u_time'])."</th>";
                                        echo "<td>".$v['u_content']."</td>";
                                        echo "<td>".$v['u_name']."</td>";
                                        echo "<td>".$v['u_email']."</td>";
                                        echo "<td>";?><?php if($v['reply'] == null){echo "没回复";}else{echo"已回复";}?><?php echo "  </td>";
                                        echo "<td>";?><?php if($v['u_audit'] == 0){echo "审核中";}else{echo"已审";}?><?php echo " </td>";
                                        echo "<td>";

                                         if($v['u_audit'] != 1){
                                            echo "<a href='".$App_URL."Processing.php?audit_message=".$v['id']."' class='btn btn-primary btn-sm' target='_top'>通过</a>";
                                         }

                                        if($v['reply'] == null){
                                            echo " <a href='".$admin_url."Message_edit.php?id=".$v['id']."' class='btn btn-info btn-sm' target='_top'>回复</a>";
                                        }else{
                                            echo " <a href='".$admin_url."Message_edit.php?id=".$v['id']."' class='btn btn-warning btn-sm' target='_top'>查看回复</a>";
                                        }


                                        echo " <a href='".$App_URL."Processing.php?dele_message=".$v['id']."' class='btn btn-danger btn-sm'>删除</a></td>";
                                        echo "</tr>";



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

                <div class="col-lg-12">

                    <nav>
                        <?php if ($paginator->getNumPages() > 1): ?>

                            <ul class="pagination">
                                <?php if ($paginator->getPrevUrl()): ?>
                                    <li class="page-item disabled has-shadow"><a class="page-link" ref="<?php echo $paginator->getPrevUrl(); ?>">上一页</a></li>
                                <?php endif; ?>

                                <?php foreach ($paginator->getPages() as $page): ?>
                                    <?php if ($page['url']): ?>
                                        <li  <?php echo $page['isCurrent'] ? 'class="page-item active has-shadow"' : 'class="page-item  has-shadow"'; ?>>
                                            <a class="page-link" href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="disabled" 'class="page-item  has-shadow"'><span class="sr-only" ><?php echo $page['num']; ?></span></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <?php if ($paginator->getNextUrl()): ?>
                                    <li class="page-item has-shadow"><a class="page-link" href="<?php echo $paginator->getNextUrl(); ?>">下一页</a></li>
                                <?php endif; ?>
                            </ul>

                        <?php endif; ?>


                    </nav>

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