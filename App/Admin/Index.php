<?php
session_start();
define('IS_MyPHP', TRUE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__));
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');


//如果用户空提交，返回重登录


if(!isset($_SESSION['username'])){
    echo "<script>window.location.href='$admin_url./Login.php';</script>";
    exit();  

} 


// 加载页头
include 'Include/Admin_head.php';
include 'Include/Menu.php';
include 'Include/Home.php';





?>






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
<?php include 'Include/Admin_footer.php'; ?>





