<?php

//调出管理用户
$user_db = $_DB->select("user", [
    "id",
    "nickname",
    "thumbnail",
    "level"
],[
    "level" => 2
]);

?>

<body>
<div class="page">
    <!-- Main Navbar-->
<header class="header">
    <nav class="navbar">
        <!-- Search Box-->
        <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
                <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
        </div>
        <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <!-- Navbar Header-->
                <div class="navbar-header">
                    <!-- Navbar Brand --><a href="/admin" class="navbar-brand d-none d-sm-inline-block">
                        <div class="brand-text d-none d-lg-inline-block"><span>E..yPHP </span><strong>Admin</strong></div>
                        <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                    <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                </div>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item"><a href="<?php echo $App_URL ?>Processing.php?dele=del_cache.php" class="nav-link logout"> <span class="d-none d-sm-inline">更新缓存</span><i class="fa fa-magic"></i></a></li>
                    <li class="nav-item"><a href="<?php echo $App_URL ?>Login/Login_out.php" class="nav-link logout"> <span class="d-none d-sm-inline">安全退出</span><i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo $user_db[0]['thumbnail'] ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
                <h1 class="h4">您好，<?php echo $user_db[0]['nickname'] ?></h1>
                <p>欢迎您回来。</p>
            </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">导航菜单</span>
        <ul class="list-unstyled">



            <?php if($_URL_['filename'] == 'index'){
                echo '<li class="active"><a href="/admin"> <i class="icon-home"></i>基本概况</a></li>';
            }else{
                echo '<li><a href="/admin"> <i class="icon-home"></i>基本概况 </a></li>';
            }
            ?>

            <?php if($_URL_['filename'] == 'Category_add' or $_URL_['filename'] == 'Category' or $_URL_['filename'] == 'category_edit'){
                echo '

                <li class="active"><a href="#exampledropdownDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-interface-windows"></i>分类管理 </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Category_add.php">新建分类</a></li>
                        <li><a href="'. $App_URL_Include .'Category.php" target="_parent">管理分类</a></li>
                    </ul>
                </li>

';
            }else{
                echo '
                
                 <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>分类管理 </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Category_add.php">新建分类</a></li>
                        <li><a href="'. $App_URL_Include .'Category.php" target="_parent">管理分类</a></li>
                    </ul>
                </li>
                
                ';
            }
            ?>

            <?php if($_URL_['filename'] == 'Content_add' or $_URL_['filename'] == 'Content'){
                echo '

                <li class="active"><a href="#contentdownDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-grid"></i>内容管理 </a>
                    <ul id="contentdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Content_add.php">撰写内容</a></li>
                        <li><a href="'. $App_URL_Include .'Content.php" target="_parent">管理内容</a></li>
                    </ul>
                </li>

';
            }else{
                echo '
                
                 <li><a href="#contentdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-grid"></i>内容管理 </a>
                    <ul id="contentdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Content_add.php">撰写内容</a></li>
                        <li><a href="'. $App_URL_Include .'Content.php" target="_parent">管理内容</a></li>
                    </ul>
                </li>
                
                ';
            }
            ?>


            <?php if($_URL_['filename'] == 'Fragment_add' or $_URL_['filename'] == 'Fragment'){
                echo '

                <li class="active"><a href="#tagDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-list"></i>碎片管理 </a>
                    <ul id="tagDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Fragment_add.php">增加碎片</a></li>
                        <li><a href="'. $App_URL_Include .'Fragment.php" target="_parent">管理碎片</a></li>
                    </ul>
                </li>

';
            }else{
                echo '
                
                 <li><a href="#tagDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-list"></i>碎片管理 </a>
                    <ul id="tagDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'Fragment_add.php">增加碎片</a></li>
                        <li><a href="'. $App_URL_Include .'Fragment.php" target="_parent">管理碎片</a></li>
                    </ul>
                </li>
                
                ';
            }
            ?>






            <!--用户管理-->
            <?php if($_URL_['filename'] == 'User' or $_URL_['filename'] == 'User_edit' ){
                echo '

                <li class="active"><a href="#userdownDropdown" aria-expanded="true" data-toggle="collapse"> <i class="icon-user"></i>用户管理 </a>
                    <ul id="userdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'User.php" target="_parent">用户数据</a></li>
                    </ul>
                </li>

';
            }else{
                echo '
                
                 <li><a href="#userdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>用户管理 </a>
                    <ul id="userdownDropdown" class="collapse list-unstyled ">
                        <li><a href="'. $App_URL_Include .'User.php" target="_parent">用户数据</a></li>
                    </ul>
                </li>
                
                ';
            }
            ?>



            <?php if($_URL_['filename'] == 'Message'){
                echo '<li class="active"><a href="'. $App_URL_Include .'Message.php"> <i class="icon-rss-feed"></i>留言管理 </a></li>';
            }else{
                echo '<li><a href="'. $App_URL_Include .'Message.php"> <i class="icon-rss-feed"></i>留言管理 </a></li>';
            }
            ?>






            <?php if($_URL_['filename'] == 'Configure'){
                echo '<li class="active"><a href="'. $App_URL_Include .'Configure.php"> <i class="icon-home"></i>站点配置 </a></li>';
            }else{
                echo '<li><a href="'. $App_URL_Include .'Configure.php"> <i class="icon-home"></i>站点配置 </a></li>';
            }
            ?>


            <li><a href="/"> <i class="icon-screen"></i>返回前台 </a></li>

    </nav>