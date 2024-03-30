<?php include('header.php') ?>
<?php



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
                <form id="edit-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                    
                    <div class='row'>
                    
                        <div>
                            <div class="form-group col-md-12">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" id="product_name" placeholder="Nhập vào tên sản phẩm" name="name" required/>
                                
                            </div>
                        </div>
                        
                        <div>
                        <div class="form-group col-md-12">
                                <label>Giá sản phẩm</label>
                                <input class="form-control" type="text" id="price" name="price" placeholder="Nhập vào giá sản phẩm" required/>
                                
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                                <label>Thể loại</label>
                                <select name="category" class="form-control" required>
                                
                                    <option value="coats" >Áo</option>
                                    <option value="pants" >Quần</option>
                                    <option value="accessories" >Phụ kiện</option>
                                    <option value="bags" >Balo</option>

                                </select>
                                
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                                <label>Ảnh sản phẩm 1</label>
                                <input class="form-control" type="file" name="image1"/>
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                                <label>Ảnh sản phẩm 2</label>
                                <input class="form-control" type="file" name="image2"  />
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                                <label>Ảnh sản phẩm 3</label>
                                <input class="form-control" type="file" name="image3"  />
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                                <label>Ảnh sản phẩm 4</label>
                                <input class="form-control" type="file" name="image4"  />
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Nhập vào mô tả sản phẩm"  require></textarea>
                                    
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-1" >
                        
                                    <input class="form-control" type="submit" style="background-color: blue; color:white;" class="btn" name="create_product"  value="Thêm"/>
                                    
                            </div>
                        </div>
                    </div>
                  
  
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
