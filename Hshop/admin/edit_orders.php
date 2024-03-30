<?php include('header.php') ?>
<?php
if(isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare('SELECT * FROM orders WHERE order_id=?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result(); 
}else if(isset($_POST['edit_order_btn'])) {
    $order_id = $_POST['order_id'];
    $order_status =   $_POST['order_status'];




    $stmt1 = $conn->prepare('UPDATE orders SET order_status=? WHERE order_id=?');
    $stmt1->bind_param('si',$order_status, $order_id);
    if($stmt1->execute()){

    header('location: dashboard.php?update_successfully=Sửa đơn hàng thành công');
    }else{
        header('location: dashboard.php?update_failure=Sửa đơn hàng thất bại');
    }
}else{
    header('location: dashboard.php?order_message=Bạn phải click vào edit để sửa đơn hàng');
}
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
                        <h2>Sửa sản phẩm</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form id="edit-form" method="POST" action="edit_orders.php">
                    <?php foreach( $order as $row ) {?>
                  
                    <div>
                        <div>
                            <div>
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>">
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label>ID Đơn hàng</label>
                                <p><?php echo $row['order_id']; ?></p>
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <label>Tổng tiền</label>
                                <p><?php echo $row['order_cost']; ?></p>
                                
                            </div>
                        </div>
                        <div>
                        <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="order_status" class="form-control" required>

                                        <option value="đang chờ" <?php if($row['order_status'] == 'đang chờ'){echo 'selected';} ?>>Đang chờ</option>
                                        <option value="hoàn thành" <?php if($row['order_status'] == 'hoàn thành'){echo 'selected';} ?>>Hoàn thành</option>

                                </select>
                                
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                    <label>Ngày đặt</label>
                                    <p><?php echo $row['order_date']  ?></p>
                                    
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-1" >
                        
                                    <input class="form-control" type="submit" style="background-color: blue; color:white;" class="btn" name="edit_order_btn"  value="Sửa"/>
                                    
                            </div>
                        </div>
                    </div>
                   <?php } ?>
  
                </form>
            
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
