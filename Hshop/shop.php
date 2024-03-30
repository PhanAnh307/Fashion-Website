
<?php
session_start();
include("server/connection.php");

$page_no = null;

if(isset($_POST["search"])){
  $category = $_POST['category'];
  $price = $_POST['price'];
  //if user select another page that not page 1
  



  

  // Get all products
  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");
  $stmt2->bind_param("si", $category,$price);
  $stmt2->execute();
  $products = $stmt2->get_result();



}else{
  //if user select another page that not page 1
  if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET["page_no"];
  //if user just entered the page then default page is 1
  }else{
    $page_no = 1;
  }
  // count the number of product in database
  $stmt1 = $conn->prepare("SELECT count(*) As total_records FROM products");
  $stmt1->execute();
  $stmt1->bind_result($total_records);
  $stmt1->store_result();
  $stmt1->fetch();
  // product per page
  $total_records_per_page = 8;

  $offset = ($page_no-1) * $total_records_per_page;

  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;



  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  // Get all products
  $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
  $stmt2->execute();
  $products = $stmt2->get_result();
}






?>





<?php include('layouts/header.php') ?>
    <!--Category-->
    <section id="featured" class="my-5 pb-5 categorybar">
      <div class="container text-center mt-5">
        <p>Lọc sản phẩm</p>
        <hr />
      </div>
      <form action="shop.php" method="POST">
          <div class="row container-fluid">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <p style="display: flex; margin-left: 25px">Phân loại</p>
              <div class="form-check">
                <input type="radio" value="coats" name="category" id="category_one" <?php if(isset($category) && $category== 'coats') {echo 'checked';} ?>/>
                <label for="flexRadioDefault1" class="form-check-label">Áo</label>
              </div>
              <div class="form-check">
                <input type="radio" value="pants" name="category" id="category_two" <?php if(isset($category) && $category== 'pants') {echo 'checked';} ?>/>
                <label for="flexRadioDefault2" class="form-check-label">Quần</label>
              </div>
              <div class="form-check">
                <input type="radio" value="accessories" name="category" id="category_one" <?php if(isset($category) && $category== 'accessories') {echo 'checked';} ?>/>

                <label for="flexRadioDefault1" class="form-check-label"
                  >Phụ kiện</label
                >
              </div>
              <div class="form-check">
                <input type="radio" value="bags" name="category" id="category_one" <?php if(isset($category) && $category== 'bags') {echo 'checked';} ?>/>
                <label for="flexRadioDefault1" class="form-check-label">Cặp</label>
              </div>

              <p style="display: flex; margin-left: 25px">Giá</p>
              <input
                type="range"
                class="form-range w-5"
                min="1"
                max="100000000"
                id="customRange2"
                name="price"
                value="<?php if(isset($price)) {echo $price;}else{echo 100;} ?>"
              />
              <div>
                <span style="float: left">1tr</span>
                <span style="float: right">100tr</span>
              </div>
            </div>
            <div>
              <input
                type="submit"
                name="search"
                value="Tìm kiếm"
                class="btn btn-primary"
              />
            </div>
          </div>
      </form>
    </section>



    <!--Shop products-->
    <section id="featured" class="my-5 pb-5 container-shopmenu">
      <h3 class="mt-5 pt-5">Sản phẩm nổi bật</h3>
      <p>Sản phẩm Hot nhất của chúng tôi</p>
      <hr style="width: 30%; margin: 0 auto" />
      <div class="text-center ms-5 py-5"></div>
      <div class="row shopmenu">

      <?php while($row = $products->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12 mt-5 product-container">
          <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" alt="áo phao"/>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div style="height: 60px;" >
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          </div> 
           
          <div>
            <h4 class="p-price"><?php echo number_format($row['product_price'],'0','.',','); ?> VND</h4>
          </div>
          
          <hr>
          <a class="buy-btn" href=<?php echo "single_product.php?product_id=" .$row['product_id']; ?>>Mua Ngay</a>
        </div>

      <?php }?> 
      

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

            <li class="page-item <?php if($page_no>= $total_no_of_pages){echo '#';} ?> "><a href="<?php if($page_no>=$total_no_of_pages) {echo '#';}else{echo '?page_no='.$page_no+1;} ?>" class="page-link">></a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
    <section style="height: 500px;">
      <p></p>
    </section>



    <?php include('layouts/footer.php') ?>
