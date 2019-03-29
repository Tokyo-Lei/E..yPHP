
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">基本概况</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>最新<br>用户统计</span>
                      <div class="progress">
                          <?php
                          $_count_user = $_DB->count("user");
                          ?>
                        <div role="progressbar" style="width: <?php echo $_count_user ?>%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $_count_user ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>内容<br>文章数量</span>
                      <div class="progress">
                          <?php
                          $_count_content = $_DB->count("content");
                          ?>
                        <div role="progressbar" style="width: <?php echo $_count_content ?>%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $_count_content ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>分类<br>类别统计</span>
                        <?php
                        $_count_cate = $_DB->count("category");
                        ?>
                      <div class="progress">
                        <div role="progressbar" style="width: <?php echo $_count_cate ?>%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $_count_cate ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>留言<br>回馈统计</span>
                        <?php
                        $_count_message = $_DB->count("message");
                        ?>
                      <div class="progress">
                        <div role="progressbar" style="width: <?php echo $_count_message ?>%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $_count_message ?></strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->


            <!-- Dashboard Header Section    -->
            <section class="dashboard-header">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Statistics -->
                        <div class="statistics col-lg-3 col-12">
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-blue"><i class="fa fa-gear"></i></div>
                                <div class="text"><strong><?PHP echo $_VERSION; ?></strong><br><small>E..yPHP系统版本</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-green"><i class="fa fa-desktop"></i></div>
                                <div class="text"><strong><?PHP echo PHP_OS; ?>
                                    </strong><br><small>服务器操作系统</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                                <div class="text"><strong><?PHP echo PHP_VERSION; ?></strong><br><small>PHP版本</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-orange"><i class="fa fa-clock-o"></i></div>
                                <div class="text"><strong><?PHP
                                        date_default_timezone_set ('PRC');
                                        echo date("Y-m-d G:i:s");

                                        ?>
                                    </strong><br><small>服务器时间</small></div>
                            </div>
                        </div>


                        <div class="statistics col-lg-3 col-12">
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-yellow"><i class="fa fa-cubes"></i></div>
                                <?php
                                function get_client_ip()
                                {
                                    if ($_SERVER['REMOTE_ADDR']) {
                                        $cip = $_SERVER['REMOTE_ADDR'];
                                    } elseif (getenv("REMOTE_ADDR")) {
                                        $cip = getenv("REMOTE_ADDR");
                                    } elseif (getenv("HTTP_CLIENT_IP")) {
                                        $cip = getenv("HTTP_CLIENT_IP");
                                    } else {
                                        $cip = "unknown";
                                    }
                                    return $cip;
                                }
                                ?>
                                <div class="text"><strong><?PHP echo get_client_ip() ?></strong><br><small>当前IP地址</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-red"><i class="fa fa-database"></i></div>


                                <div class="text"><strong> <?php
                                        $_DBS=$_DB->info();
                                        echo $_DBS['version'];
                                        ?></strong><br><small>Mysql版本</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-green"><i class="fa fa-microchip"></i></div>
                                <div class="text"><strong><?PHP echo$_MEDOO; ?>
                                    </strong><br><small>Medoo版本</small></div>
                            </div>
                            <div class="statistic d-flex align-items-center bg-white has-shadow">
                                <div class="icon bg-blue"><i class="fa fa-paper-plane-o"></i></div>
                                <div class="text"><strong><?PHP
                                        $num = $_DB->select("counter", [
                                            "counter"
                                        ]);
                                        echo $num[0]['counter'];
                                        ?>
                                    </strong><br><small>访问人数</small></div>
                            </div>
                        </div>






                        <div class="col-lg-6">
                            <div class="checklist card">

                                <div class="card-header d-flex align-items-center">
                                    <h2 class="h3">最新回馈 </h2>
                                </div>
                                <ul class="card-body  no-padding">


                                    <?php


                                    $message_db = $_DB->select("message",  [
                                        "id",
                                        "u_time",
                                        "u_content",
                                        "reply",
                                        "reply_time"
                                    ],
                                        [
                                            "ORDER" => ["id"=>"DESC"],
                                            "LIMIT" => 6
                                        ]
                                    );


                                foreach ($message_db as $v){

                                echo '  <li class="list-group-item ">';

                                if ($v['reply'] == null) {
                                    echo '<a href="' . "/App/Admin/Include/Message_edit.php?id=" . $v['id'] . '" class="btn btn-sm btn-info mr-2">回复</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-sm btn-success mr-2">已回</a>';
                                }
                                ?>

                                        <label for="input-1"><i class="fa fa-clock-o"></i>


                                <?php
                                if($v['reply'] == null){
                                echo date("Y-m-d H:i:s", $v['u_time']) . "-" . $v['u_content'];
                                }else{
                                    echo date("Y-m-d H:i:s", $v['u_time']) . "-" . $v['u_content'] . "/ 回复:<i
                                        class=\"fa fa-clock-o\"></i> " . date("Y-m-d H:i:s", $v['reply_time']) . "-" . $v['reply'];
                                }
                                ?>


                                        </label>
                                    </li>


                                <?php
                                 }
                                 ?>

                                </ul>
                            </div>
                        </div>



                    </div>
                </div>
            </section>



