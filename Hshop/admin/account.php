<?php include('header.php') ?>




        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="assets/img/find_user.png" class="img-responsive" />
                     
                    </li>


                    <li>
                        <a href="dashboard.php"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>


                    <li>
                        <a href="dashboard.php"><i class="fa fa-table "></i>Đơn hàng</a>
                    </li>
                    <li>
                        <a href="products.php"><i class="fa fa-edit "></i>Sản phẩm</a>
                    </li>

                    <li>
                        <a href="add_product.php"><i class="fa fa-qrcode "></i>Thêm sản phẩm</a>
                    </li>
                    <li>
                        <a href="account.php"><i class="fa fa-bar-chart-o"></i>Tài khoản</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tài khoản quản trị viên</h2>
                    </div>
                </div>
                <hr />
                <div style="margin-left:20px;font-weight:bold;">
                    <p>ID: <span style="color:red;"><?php echo $_SESSION['admin_id'];  ?></span></p>
                    <p>Tên: <span style="color:red;"><?php echo $_SESSION['admin_name'] ?></span></p>
                    <p>Email: <span style="color:red;"><?php echo $_SESSION['admin_email'] ?></span></p>
                </div>

    

         
       

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    


</body>
</html>
