
<?php 
session_start();
?>
<?php include('layouts/header.php'); ?>
    <!--Home-->
    <section id="home">
      <div class="container">
        <h5 class="bold">Điểm đến mới</h5>
        <h1><span>Giá tốt</span> nhất</h1>
        <p>Hshop luôn có giá tốt nhất thị trường</p>
      </div>
    </section>
    <!--brand-->
    <section id="brand" class="container">
      <div class="row">
        <img
          src="/assets/img/brand_5.png"
          alt="Ảnh minh họa áo"
          class="img-fluid col-lg-3 col-md-6 col-12"
        />
        <img
          src="/assets/img/brand_6.png"
          alt="Ảnh minh họa quần"
          class="img-fluid col-lg-3 col-md-6 col-12"
        />
        <img
          src="/assets/img/brand-3.jpg"
          alt=""
          class="img-fluid col-lg-3 col-md-6 col-12"
        />
        <img
          src="/assets/img/brand-4.jfif"
          alt="Ảnh minh họa phụ kiện thời trang"
          class="img-fluid col-lg-3 col-md-6 col-12"
        />
      </div>
    </section>
    <!--3 category-->


    <section class='category_banner'>
      <div class="row ">
        <div class="col-lg-4 col-md-12 col-sm-12 text-center" >
          <a href="shop.php"><img src="assets/img/ao.jpg" alt="" class="img-fluid" /></a>
        
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-center" >
          <a href="shop.php"><img src="/assets/img/quan.jpg" alt="" class="img-fluid" /></a>
         
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-center" >
        <a href="shop.php"><img src="/assets/img/phukien.jpg" alt="" class="img-fluid" /></a>
        
        </div>

      </div>
    </section>
    <hr width="50%" class="mx-auto">

    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Sản phẩm nổi bật</h3>
        <hr />
        <p>Sản phẩm Hot nhất của chúng tôi</p>
      </div>
      <div class="row mx-auto container-fluid">

      <?php include('server/get_featured_products.php');   ?>
      
      <?php while($row = $featured_products->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image'] ?>" alt="" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price"><?php echo number_format($row['product_price'],0,".",",")  ?> VND</h4>
          <a href="<?php echo "single_product.php?product_id=" .$row['product_id']; ?>"><button class="btn buy-btn">Mua Ngay</button></a>
        </div>
      
      <?php } ?>
        
      </div>
    </section>
    <!--Banner-->
    <section id="banner" class="my-5 py-5 text-center" >
      <div class="container mt-5">
        <h4 style="color:orange;" >SALE CUỐI MÙA</h4>
        <h1 sty >
          Bộ sưu tập mùa thu <br />
          giảm tới 30%
        </h1>
      </div>
    </section>
    <!--clothes-->
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Áo khoác & Sơ mi</h3>
          <hr />
          <p>Sản phẩm Hot nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_coats.php') ?>
          <?php while($row = $coats_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img
              class="img-fluid mb-3"
              src="assets/img/<?php echo $row['product_image']; ?>"
              alt=""
            />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price"><?php echo number_format($row['product_price'],'0','.',',') ?> VND</h4>
            <a href="<?php echo "single_product.php?product_id=" .$row['product_id']; ?>"><button class="btn buy-btn">Mua Ngay</button></a>
        </div>
          <?php } ?>  
      </div>

    </section>
 <!--pants-->   
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Quần các thể loại</h3>
          <hr />
          <p>Sản phẩm Hot nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_pants.php') ?>
          <?php while($row = $pants->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img
              class="img-fluid mb-3"
              src="assets/img/<?php echo $row['product_image']; ?>"
              alt=""
            />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price"><?php echo number_format($row['product_price'],'0','.',',') ?> VND</h4>
            <a href="<?php echo "single_product.php?product_id=" .$row['product_id']; ?>"><button class="btn buy-btn">Mua Ngay</button></a>
        </div>
          <?php } ?>  
      </div>

    </section>
  <!--Accessories-->
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Phụ kiện cao cấp</h3>
          <hr />
          <p>Sản phẩm Hot nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_accessories.php') ?>
          <?php while($row = $accessories_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img
              class="img-fluid mb-3"
              src="assets/img/<?php echo $row['product_image']; ?>"
              alt=""
            />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price"><?php echo number_format($row['product_price'],'0','.',',') ?> VND</h4>
            <a href="<?php echo "single_product.php?product_id=" .$row['product_id']; ?>"><button class="btn buy-btn">Mua Ngay</button></a>
        </div>
          <?php } ?>  
      </div>

    </section>
    <!--Balo-->
    <section id="featured" class="my-5">
        <div class="container text-center mt-5 py-5">
          <h3>Balo hàng hiệu</h3>
          <hr />
          <p>Sản phẩm Hot nhất của chúng tôi</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/get_bags.php') ?>
          <?php while($row = $bags_products->fetch_assoc()) { ?>
          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img
              class="img-fluid mb-3"
              src="assets/img/<?php echo $row['product_image']; ?>"
              alt=""
            />
            <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price"><?php echo number_format($row['product_price'],'0','.',',') ?> VND</h4>
            <a href="<?php echo "single_product.php?product_id=" .$row['product_id']; ?>"><button class="btn buy-btn">Mua Ngay</button></a>
        </div>
          <?php } ?>  
      </div>

    </section>
  
<?php include('layouts/footer.php') ?>
