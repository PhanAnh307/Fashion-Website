<?php include('header.php') ?>
<?php

if(isset($_GET['product_id'])) {
    
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $products = $stmt->get_result();
}else if(isset($_POST['edit_btn'])){
    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category = $_POST['category'];
    $image = $_POST['image'];
   




    $stmt = $conn->prepare('UPDATE products SET product_name =?,product_image=?,product_description=?,product_price=?,product_category=?  WHERE product_id=?');
    $stmt->bind_param('sssisi', $title,$image,$description,$price,$category,$product_id);
    if($stmt->execute()){

    header('location: products.php?edit_success_message=Sửa sản phẩm thành công');
    }else{
        header('location: products.php?edit_failure_message=Sửa sản phẩm thất bại');
    }





}else{
    header("location: products.php");
    exit();
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
                <form id="edit-form" method="POST" action="edit_product.php">
                    <?php foreach($products as $products)  {?>
                    <div class='row'>
                        <div>
                            <div>
                                <input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-6">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" type="text" id="product_name" placeholder="Nhập vào tên sản phẩm" value="<?php echo $products['product_name']; ?>" name="title" required/>
                                
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-6">
                                <label>Ảnh sản phẩm</label>
                               

                                <input class="form-control" type="file" name="image" id="product_image"/>
                                <p class='mt-2'>Ảnh minh họa</p>
                                <img src="../assets/img/<?php echo $products['product_image'] ?>" width='50px' height='50px ' alt="">
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-6">
                                <label>Giá sản phẩm</label>
                                <input class="form-control" type="text" id="price" name="price" placeholder="Nhập vào giá sản phẩm" value="<?php echo $products['product_price']; ?>" required/>
                                
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-6">
                                <label>Thể loại</label>
                                <select name="category" class="form-control" required>
                                
                                    <option value="coats" <?php if($products['product_category']== 'coats') {echo 'selected';} ?>>Áo</option>
                                    <option value="pants" <?php if($products['product_category']== 'pants') {echo 'selected';} ?>>Quần</option>
                                    <option value="accessories" <?php if($products['product_category']== 'accessories') {echo 'selected';} ?>>Phụ kiện</option>
                                    <option value="bags" <?php if($products['product_category']== 'bags') {echo 'selected';} ?>>Balo</option>

                                </select>
                                
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-12">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Nhập vào mô tả sản phẩm" value="" require><?php echo $products['product_description']; ?></textarea>
                                   
                                    
                            </div>
                        </div>
                        <div>
                            <div class="form-group col-md-1" >
                        
                                    <input class="form-control" type="submit" style="background-color: blue; color:white;" class="btn" name="edit_btn"  value="Sửa"/>
                                    
                            </div>
                        </div>
                    </div>
                    <?php }?>
  
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
