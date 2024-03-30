
<?php

session_start();
if (!empty($_SESSION["cart"])) {

 //let user in 



 //send user to home page
}else{

  header('location: index.php');
  echo '<script>alert("Không có sản phẩm để thanh toán")</script';

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
      <div class="mx-auto container">
        <form action="server/place_order.php" method="POST" id="checkout-form">
          <div class="form-group checkout-small-element">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="checkout-email"
              name="email"
              placeholder="Nhập vào email"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label for="">Số điện thoại</label>
            <input
              type="tel"
              class="form-control"
              id="checkout-phone"
              name="phone"
              placeholder="Nhập vào số điện thoại"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label for="">Thành phố</label>
            <input
              type="text"
              class="form-control"
              id="checkout-city"
              name="city"
              placeholder="Thành phố của bạn"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label for="">Địa chỉ</label>
            <input
              type="text"
              class="form-control"
              id="checkout-address"
              name="address"
              placeholder="Nhập vào địa chỉ"
              required
            />
          </div>
          <div class="form-group checkout-btn-container">
            <p>Tổng tiền: <?php echo number_format($_SESSION['total'],'0','.',',') ?> VND</p>
            <input
              type="submit"
              class="btn"
              id="checkout-btn"
              value="Đặt Hàng"
              name="place_order"
            />
          </div>
        </form>
      </div>
    </section>

    <?php include('layouts/footer.php') ?>
