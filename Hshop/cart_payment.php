
<?php
  session_start();
  include("server/connection.php");

      $order_id = $_SESSION['order_id'];
  if (isset($_POST["order_pay_btn"])) {

      $order_status = $_GET['order_status'];
      $order_total_price = $_POST['order_total_price'];

  }
  
?>


<?php include('layouts/header.php') ?>
    <!-- Check Out-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Thanh Toán</h2>
        <hr
          class="mx-auto"
          style="max-width: 50px; border-width: 2px; color: orange"
        />
      </div>
      <div class="mx-auto container text-center">

  
        <?php if (isset($_SESSION['total']) && ($_SESSION['total'] != 0)) {?>

          <p><?php if (isset($_GET['order_status'])) { echo $_GET['order_status'];} ?></p>
          <p>Tổng chi phí: <?php echo number_format($_SESSION['total'],'0','.',','); ?> VND.</p>
          <form action="thanks.php" method="POST">
            <input type="submit" name="cart_payment_btn" class="btn btn-primary" value="Thanh Toán">
          </form>

          <form action="server/place_order.php" method="POST">
                  <input type="submit" name="continue_shopping" class="btn btn-success" value="  Mua tiếp  ">
          
              </form>
          
        <?php } else{ ?>

        

           <p>Giỏ hàng trống</p>
              <form action="place_order.php" method="POST">
                  <input type="submit" name="continue_shopping" class="btn btn-success" value="  Mua tiếp  ">
          
              </form>
            <?php }?>
        
      </div>
    </section>

    <?php include('layouts/footer.php') ?>
