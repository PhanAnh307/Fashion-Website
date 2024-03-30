<?php
session_start();
include("server/connection.php");

if(isset($_GET['order_details_btn']) && isset( $_GET['order_id'] )) {

    $order_id = $_GET['order_id'];
    $order_status = $_GET['order_status'];
  
    $stmt = $conn->prepare('SELECT * FROM order_items WHERE order_id = ?');
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order_details = $stmt->get_result();    
    $order_total_price = calculateTotalOrderPrice($order_details);

}else{
  header('location: account.php');
  exit();
}
function calculateTotalOrderPrice($order_details){

  $total = 0;
  foreach($order_details as $row){
    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];

      $total += $product_price * $product_quantity;
  }
    return $total;

}


?>


<?php include('layouts/header.php') ?>


    <!--Order detail-->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bolde">Giỏ hàng của bạn</h2>
        <hr />
      </div>
      <table class="mt-5 pt-5">
        <tr>
          <th>Sản phẩm</th>
          <th>Giá sản phẩm</th>
          <th>Số lượng</th>
        </tr>
              <!--display product info-->
              <?php foreach($order_details as $row) { ?>
                          <tr>
                            <td>
                              <div class="product-info">
                                <img src="/assets/img/<?php echo $row['product_image']; ?>" alt="Ảnh sản phẩm">
                                <div>
                                  <p class="mt-3" ><?php echo $row['product_name']; ?></p>

                                </div>                 
                              </div>                                     
                            </td>
                            <td>
                              <span><?php echo number_format($row['product_price'],'0','.',','); ?> VND</span>
                            </td>
                            <td>
                              <span><?php echo $row['product_quantity']; ?></span>
                            </td>
                
              <?php } ?>
          </tr>
                    </table>
          <?php if($order_status == 'đang chờ') { ?>
              <form method="POST" action="order_details_payment.php">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" >
                <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
                <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                <input type="submit" name="order_pay_btn" value="Thanh Toán" style="float:right;" class="btn btn-primary">
              </form>
            <?php } ?>
    </section>
    <?php include('layouts/footer.php') ?>


