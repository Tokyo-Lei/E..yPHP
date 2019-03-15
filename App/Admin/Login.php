<?php
//定义根目录
define('ROOT_PATH',dirname(__FILE__));
define('IS_MyPHP', TRUE);
//加载配置
require_once (ROOT_PATH.'/Admin_config.php');
   include 'Include/Admin_head.php';
?>

  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>E..yPHP Login</h1>
                  </div>
                  <p>欢迎访问后台管理系统</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                <form action="Login/Login_processing.php" method="post" class="form-validate">

                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="请输入您的用户名" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="请输入您的密码" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-default" id="login" class="btn btn-primary">登录</button>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
<?php include 'Include/Admin_footer.php'; ?>


