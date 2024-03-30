<?php 

session_start();
include('server/calculatorfunction.php');
 
if (isset($_POST["add_to_cart"])){

      // if user has already added a product to cart
  if (isset($_SESSION['cart'])) {
    $product_array_ids = array_column($_SESSION['cart'],"product_id");
    //if product has already been added to cart or not
    if ( !in_array($_POST['product_id'], $product_array_ids ) ){
      
            $product_id = $_POST['product_id'];

                $product_array = array(

                  'product_id'=> $_POST['product_id'],
                  'product_name'=> $_POST['product_name'],
                  'product_price'=> $_POST['product_price'],
                  'product_image'=> $_POST['product_image'],
                  'product_quantity'=> $_POST['product_quantity'],
                );

                $_SESSION['cart'][$product_id] = $product_array;
    }else{
      echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng")</script>';
      
    }

    //if this is the fisrt product
  }else {

      $product_id = $_POST['product_id'];
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = $_POST['product_quantity'];

      $product_array = array(

        'product_id'=> $product_id,
        'product_name'=> $product_name,
        'product_price'=> $product_price,
        'product_image'=> $product_image,
        'product_quantity'=> $product_quantity,
      );

      $_SESSION['cart'][$product_id] = $product_array;

    }
    //calculate total cart
    calculateTotalCart();




    //remove product from cart
  }else if (isset($_POST['remove_product'])) {

    $product_id = $_POST['product_id'] ;
    unset($_SESSION['cart'] [$product_id]);
    calculateTotalCart();
  
  
  
  }else if(isset ($_POST['edit_quantity'])) {

      //we get id and quantity from the form
      $product_id = $_POST['product_id'] ;

      //get the product array from the session
      $product_quantity = $_POST['product_quantity'];
      $product_array = $_SESSION['cart'][$product_id];
      //update product quantity
      $product_array['product_quantity'] = $product_quantity;
      //return array back to its place
      $_SESSION['cart'][$product_id] = $product_array;
      calculateTotalCart();
  
  }else {

  //header("location: index.php");

}




?>




<?php include('layouts/header.php') ?>
    <!--Cart-->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bolde">Giỏ hàng của bạn</h2>
        <hr />
      </div>
      <table class="mt-5 pt-5">
        <tr>
          <th>Sản phẩm</th>
          <th>Số lượng</th>
          <th>Tổng</th>
        </tr>
    <!--display product info-->
        <?php if(isset($_SESSION['cart'])) { ?>
        <?php foreach($_SESSION['cart'] as $key => $value ) { ?>
        <tr>
          <td>
            <div class="product-info">
              <img style="position: absolute;z-index: 1;" src="assets/img/<?php echo $value['product_image']; ?>" alt="" />
              <div>
                <p style="margin-left: 90px;"><?php echo $value['product_name'];?></p>
                <small style="margin-left: 90px;"><?php echo number_format($value['product_price'],"0",".",","); ?><span> VND</span></small>
                <br />


                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                  <input style="margin-left: 90px;" type="submit" class="remove-btn" name="remove_product" value="Xóa"/>


                </form>
                
              </div>
            </div>
          </td>
          <td>
              <!--quantity form-->
            <form action="cart.php" method="POST">

                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" class="products-quantity"/>
                <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>

            </form>
          </td>
          </q><td>
            <span class="product-price"><?php echo number_format($value['product_quantity'] * $value['product_price'],"0",".",","); ?></span>
            <span>VND</span>
          </td>

        <?php } ?>
        <?php } ?>

        </tr>
      </table>
      <div class="cart-total">
        <table class="">
          <tr>
            <td>Tổng</td>
              <?php if(isset($_SESSION['cart'])) { ?>
                <td><?php echo number_format($_SESSION['total'],'0','.',','); ?> VND</td>
              <?php } ?>
          </tr>



        </table>
      </div>
      
      <div class="checkout-container">
        <form action="checkout.php" method="POST">
        <input style="float: right; background-color: orange;" type="submit" class="btn" id="checkout-btn" name="checkout" value="Đặt hàng"/>
      </form>
      </div>
    </section>

<?php include('layouts/footer.php') ?>