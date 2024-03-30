<?php
  include("server/connection.php");
  session_start();  

  if (isset($_POST["order_pay_btn"])) {
      $order_id = $_POST['order_id'];
      $order_status = $_POST['order_status'];
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
        

        <?php if(isset($_POST['order_total_price']) && $_POST['order_status'] == 'đang chờ' ) { ?>
          <p><?php echo $_POST['order_status']; ?></p>
          <p>Tổng chi phí: <?php echo number_format($_POST['order_total_price'],'0','.',','); ?> VND.</p>
          <form action="thanks.php" method="POST">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="submit" name="order_details_payment_btn" class="btn btn-primary" value="Thanh Toán">
          </form>
          
        <?php } else{ ?>


            
            <?php }?>
        
      </div>
    </section>

    <?php include('layouts/footer.php') ?>
