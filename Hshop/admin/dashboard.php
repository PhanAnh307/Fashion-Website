<?php include('header.php') ?>
<?php

if(!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit();
}
//get order

//if user select another page that not page 1
if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET["page_no"];
  //if user just entered the page then default page is 1
  }else{
    $page_no = 1;
  }
  // count the number of product in database
  $stmt1 = $conn->prepare("SELECT count(*) As total_records FROM orders");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();
  // product per page
  $total_records_per_page = 10;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;



  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  // Get all products
  $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset,$total_records_per_page");
  $stmt2->execute();
  $order = $stmt2->get_result();




  


?>


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
                        <h2>Đơn hàng</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <hr />
                <div>
                    <div>
                        <h5>Đơn hàng gần đây nhất</h5>
                        <p style="color:green;"><?php if(isset($_GET['update_successfully'])) {echo $_GET['update_successfully'];} ?></p>

                        <p style="color:red;"><?php if(isset($_GET['update_failure'])) {echo $_GET['update_failure'];} ?></p>

                        <p style="color:green;"><?php if(isset($_GET['message'])) {echo $_GET['message'];} ?></p>

                        <p style="color:red;"><?php if(isset($_GET['order_message'])) {echo $_GET['order_message'];} ?></p>



                        <table class="table table-striped table-bordered table-hover">
                            <thead class="btn-primary">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Status</th>
                                    <th>User ID</th>
                                    <th>Order Date</th>
                                    <th>User Phone</th>
                                    <th>User Address</th>
                                    <th>Edit</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($order as $order) { ?>
                                <tr>
                                    <td><?php echo $order['order_id'] ?></td>
                                    <td><?php echo $order['order_status'] ?></td>
                                    <td><?php echo $order['user_id'] ?></td>
                                    <td><?php echo $order['order_date'] ?></td>
                                    <td><?php echo $order['user_phone'] ?></td>
                                    <td><?php echo $order['user_address'] ?></td>
                                    <td><a href="edit_orders.php?order_id=<?php echo $order['order_id'] ?>" class="btn btn-primary">Edit</a></td>
                                    
                                </tr>
                                <?php }?>
                       
                            </tbody>
                        </table>
                        <nav aria-label="page navigation">
                                <ul class="pagination mt-5 text-center" style="bottom: 0;left: 0;right: 0;margin: 10px auto;justify-content: center;z-index: 1;">

                                    <li class="page-item <?php if($page_no<=1){echo 'disable';} ?> ">
                                    <a href="<?php if($page_no<=1) {echo '#';}else{echo '?page_no='.$page_no-1;} ?>" class="page-link"><</a>
                                    </li>
                                    <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
                                    <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>
                                    <li class="page-item"><a href="?page_no=3" class="page-link">3</a></li>
                            
                                    <li class="page-item"><a href="" class="page-link">...</a></li>
                                    <?php if($page_no>=4) { ?>
                                    
                                    <li class="page-item"><a href="<?php echo "?page_no=".$page_no; ?>" class="page-link"><?php echo $page_no; ?></a></li>
                                    
                                    <?php } ?>

                                    <li class="page-item <?php if($page_no>= $total_no_of_pages){echo '#';} ?> ">
                                    <a href="<?php if($page_no>=$total_no_of_pages) {echo '#';}else{echo '?page_no='.$page_no+1;} ?>" class="page-link">></a>
                                    </li>
                                </ul>
                        </nav>

                    </div>
            
                <!-- /. ROW  -->
    

         
       

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
