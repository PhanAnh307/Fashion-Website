<?php
  session_start();
  include("server/connection.php");
 
if(isset($_GET['product_id'])) {
  $product_quantity = 1;
  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products  WHERE product_id = ?");

  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  
  $products = $stmt->get_result(); 
  $products_array = $products->fetch_array();

  //no product id//
}else{

  header('location:index.php');
  

}
  $product_category = $products_array['product_category'];
  $stmt1 = $conn->prepare('SELECT * FROM products WHERE product_category=? LIMIT 4');
  $stmt1->bind_param('s', $product_category);
  $stmt1->execute();
  $related_products = $stmt1->get_result();

?>




<?php include('layouts/header.php') ?>
    <!--Single product-->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

          <?php foreach($products as $products) { ?>

            

            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="assets/img/<?php echo $products['product_image']; ?>" alt="" id="mainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $products['product_image']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $products['product_image2']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $products['product_image3']; ?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="/assets/img/<?php echo $products['product_image4']; ?>" alt="" width="100%" class="small-img">
                    </div>
                  </div>
                  
            </div>
            
            <div class="col-lg-6 col-md-12 col-md-12">
                <h6><?php echo $products['product_name'];?></h6>
                <h2><?php echo number_format($products['product_price'],0,".",",");?> VNĐ</h2>


                    <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['product_id']; ?>">                               
                    <input type="hidden" name="product_image" value="<?php echo $products['product_image']; ?>" >                             
                    <input type="hidden" name="product_name"value="<?php echo $products['product_name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $products['product_price']; ?>">
                      
                    
                          <input type="number" name="product_quantity" value="1"/>                  
                          <button class="btn buy-btn" type="submit" name="add_to_cart" >Giỏ hàng</button>
                 </form>
                
                <h4 class="mt-5 mb-5">Thông tin</h4>
                <span><?php echo $products['product_description']; ?></span>
            </div>
           
            <?php } ?>
        </div>

    </section>
    <!--Related product-->
    <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
          <h3>Sản phẩm liên quan</h3>
          <hr />
          <p></p>
        </div>
        
        <div class="row mx-auto container-fluid">
          <?php while($row = $related_products->fetch_assoc()) { ?>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" alt="Ảnh sản phẩm" />
    
                <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?> VND</h4>
                <a href="<?php echo 'single_product.php?product_id='.$row['product_id'] ?>"><button class="btn buy-btn">Mua Ngay</button></a>
             
            </div> 
            <?php } ?>
          
  








      <?php include('layouts/footer.php') ?>
<script>
     var mainImg = document.getElementById("mainImg");
     var smallimg = document.getElementsByClassName("small-img");

     for(let i=0; i<4; i++) {
        smallimg[i].onclick = function () {
            mainImg.src = smallimg[i].src;
        }
     }
    </script>