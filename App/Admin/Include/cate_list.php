








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
                                        echo "<td><a href='#' class='btn btn-info btn-sm'>编辑</a> <a href='#' class='btn btn-danger btn-sm'>删除</a></td>";
                                        echo "</tr>";


                                        if(isset($v['sub'])){

                                            //排序
//                                            $sort = [];
//                                            foreach ($v['sub'] as $k => $s) {
//                                                $sort[] = $s['sort'];
//
//                                            }
//                                            array_multisort($sort, SORT_ASC, $v['sub']);



                                               foreach ($v['sub'] as $k => $s){

                                                   echo "<tr>";
                                                   echo "<th scope='row'>".$s['id']."</th>";
                                                   echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;|-".$s['cate_name']."</td>";
                                                   echo "<td>".$s['sort']."</td>";
                                                   echo "<td><a href='#' class='btn btn-info btn-sm'>编辑</a> <a href='#' class='btn btn-danger btn-sm'>删除</a></td>";
                                                   echo "</tr>";
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