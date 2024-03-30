<?php
session_start();

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: dashboard.php?');
  exit();

}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt  = $conn->prepare("SELECT admin_id,admin_name,admin_email, admin_password FROM admins Where admin_email=? AND admin_password=? LIMIT 1");

  $stmt->bind_param('ss', $email, md5($password));
  //$account = $stmt->bind_result($num_rows);

  if ($stmt->execute()) {
        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
        $stmt->store_result();
    
    if($stmt->num_rows() == 1) {
      $row = $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: dashboard.php?message=Đăng nhập thành công');

    }else{
      header('location: login.php?error=Sai tài khoản hoặc mật khẩu');
    }
  } else  {
    //error
    header('location: login.php?error=không thể kết nối');
  }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hshop</title>
    <!--style sheet-->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!--boostrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!--font awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!--navbar-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
          <div class="navmenu">

            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse nav-buttons"
              id="navbarSupportedContent"
            > 

            
              <img src="../assets/img/logo.jpg" alt="picture of cart" class="logo" />
              <h2><a href="index.php" style="font-weight: bold;text-decoration:none;color:black;">Hshop</a></h1>
            
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Liên hệ</a>
                </li>
                
                <li class="nav-item icon">
                  <a href="cart.php">
                    <span class="fa-solid fa-cart-shopping">
                      <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] > 0) {?>
                          <span class="cart-quantity" >
                              
                                <?php echo $_SESSION['quantity']; ?>
                              
                          </span>
                      <?php } ?>
                  </span>
                </a>
                  <a href="account.php"><span class="fas fa-user ms-2"></span></a>
                </li>
              </ul>
  
              
            </div>
          </div>
        </nav>
      
      </div>
    <!--Login-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Đăng nhập</h2>
        <hr
          class="mx-auto"
          style="max-width: 50px; border-width: 2px; color: orange"
        />
      </div>
      <div class="mx-auto container" method="POST" action="login.php">
        
        <form action="login.php" method="POST" id="login-form">
          <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
          <p style="color:red" class="text-center"><?php if(isset($_GET['message'])){echo $_GET['message'];} ?></p>
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="Nhập vào email"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input
              type="password"
              class="form-control"
              id="login-password"
              name="password"
              placeholder="Mật khẩu"
              required
            />
          </div>
          <div>
            <input type="submit" class="btn" id="login-btn" value="Đăng nhập" name="login_btn"/>
          </div>
          <div>
            <a href="register.php" id="register-url" class="btn">Đăng ký tài khoản</a>
          </div>
        </form>
      </div>
    </section>

    <?php include('../layouts/footer.php') ?>
