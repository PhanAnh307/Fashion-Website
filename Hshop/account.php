<?php

session_start();
include("server/connection.php");

if (!isset($_SESSION["logged_in"])) {

  header("location: login.php");
  exit();
}

if (isset($_GET["logout"])) {
  if(isset($_SESSION["logged_in"])) {
    unset($_SESSION["logged_in"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_email"]);
    header("location: login.php");
    exit();

  }

}


if (isset($_POST["change_password"])) {
  $password =$_POST["password"];
  $confirmPassword =$_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];

  // check if password dont match
  if($password != $confirmPassword) {
    header('location: account.php?error=Mật khẩu không khớp');

// check if password is less than 6 character
  }else if(strlen($password) < 6) {

    header('location: account.php?error=Mật khẩu phải có ít nhất 6 ký tự');
  // if no error
  }else{
    $stmt = $conn->prepare('UPDATE users SET user_password=? WHERE user_email=?');
    $stmt->bind_param('ss',md5($password),$user_email);
    if ($stmt->execute()) {
      header('location: account.php?message=Thay đổi mật khẩu thành công');
    }else{
      header('location: account.php?error=Không thể đổi mật khẩu');
    }

  }

} 

// get order
if (isset($_SESSION['logged_in'])) {
  $user_id = $_SESSION['user_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ORDER BY order_id DESC");
  $stmt->bind_param("i",$user_id);
  $stmt->execute();

  $orders = $stmt->get_result();

}

?>




<?php include('layouts/header.php') ?>

    <!--Account-->
    <section class="my-5 py-5 ps-5 ms-5">
      <div class="row container mx-auto">
        <div class="text-center mt-3 col-lg-6 col-md-12 col-sm-12 pt-5 ps-5">            
          <p class="text-center" style="color:green;" ><?php if(isset($_GET['register_success'])) {echo $_GET['register_success'];} ?></p>            
          <p class="text-center" style="color:green;" ><?php if(isset($_GET['message'])) {echo $_GET['message'];} ?></p>
          <h3 class="font-weight-bold">Thông tin tài khoản</h3>
          <hr class="mx-auto bottom-line" />
          <div class="account-info">
            <p>Tên: <span><?php if(isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];} ?></span></p>
            <p>Email: <span><?php if(isset($_SESSION['user_email'])) {echo $_SESSION['user_email'];} ?></span></p>
            <p><a style="text-decoration: none; color:orange;" href="#orders" id="orders-btn">Giỏ hàng</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Đăng xuất</a></p>



          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2 ps-5">
          <form action="account.php" method="POST" id="account-form">
            
            <h3>Đổi mật khẩu</h3>
            <hr class="mx-auto bottom-line" />
            <div class="form-group">
              <label for="">Mật khẩu mới</label>
              <input
                type="password"
                class="form-control"
                name="password"
                required
                id="account-password"
                placeholder="Mật khẩu"
              />
            </div>
            <div class="form-group">
              <label for="">Nhập lại mật khẩu mới</label>
              <input
                type="password"
                class="form-control"
                name="confirmPassword"
                required
                id="account-password-confirm"
                placeholder="Mật khẩu"
              />
            </div>
            <div class="form-group">            
              
              <input type="submit" value="Đổi mật khẩu" name="change_password" id="change-pass-btn" />
              <p class="text-center" style="color:red;" ><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!--Order-->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bolde">Giỏ hàng của bạn</h2>
        <hr />
      </div>
      <table class="mt-5 pt-5">
        <tr>
          <th>Đơn hàng</th>
          <th>Tổng giá</th>
          <th>Trạng thái</th>
          <th>Ngày mua</th>
          <th>Thông tin chi tiết</th>
        </tr>
              <!--display product info-->
        <?php while($row = $orders->fetch_assoc()) { ?>
            <tr>
              <td>
                <div class="product-info">
                  <!--<img src="" alt="">-->
                 
                  <span><?php echo $row['order_id']; ?></span>
                </div>                                     
              </td>
              <td>
                <span><?php echo number_format($row['order_cost'],'0','.',',') ?> VND</span>
              </td>
              <td>
                <span><?php echo $row['order_status'] ?></span>
              </td>
              <td>
                  <span><?php echo $row['order_date'] ?></span>
              </td>
              <td>
                  <form action="order_details.php" method="get" >
                  <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?>">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                    <input type="submit" name="order_details_btn" value="Thông tin" class="order-detail">
                  </form>
              </td>
            </tr>
        <?php } ?>
      </table>
    </section>
    

<?php include('layouts/footer.php') ?>