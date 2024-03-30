
<?php


session_start();
  include('server/connection.php');

  if(isset($_SESSION['logged_in'])){
    header('location: account.php?');
    exit();

  }

  if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt  = $conn->prepare("SELECT user_id,user_name,user_email, user_password FROM users Where user_email=? AND user_password=? LIMIT 1");

    $stmt->bind_param('ss', $email, md5($password));
    //$account = $stmt->bind_result($num_rows);

    if ($stmt->execute()) {
          $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
          $stmt->store_result();
      
      if($stmt->num_rows() == 1) {
        $row = $stmt->fetch();

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['logged_in'] = true;

        header('location: account.php?message=Đăng nhập thành công');

      }else{
        header('location: login.php?error=Sai tài khoản hoặc mật khẩu');
      }
    } else  {
      //error
      header('location: login.php?error=không thể kết nối');
    }

  }
  
?>



<?php include('layouts/header.php') ?>
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

    <?php include('layouts/footer.php') ?>
