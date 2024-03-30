
<?php
session_start();
    include("server/connection.php");



    if(isset($_POST["register"])) {

      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];


      // check if password dont match
          if($password != $confirmPassword) {
              header('location: register.php?error=Mật khẩu không khớp');
          
      // check if password is less than 6 character
          }else if(strlen($password) < 6) {

              header('location: register.php?error=Mật khẩu phải có ít nhất 6 ký tự');
          
          
          //if password correct form
          }else{
                      // check whether there is a user with this email or not
                      $stmt1 = $conn->prepare('SELECT count(*) FROM users WHERE user_email=?');
                      $stmt1->bind_param('s', $email);
                      $stmt1->execute();
                      $stmt1->bind_result($num_rows);
                      $stmt1->store_result();
                      $stmt1->fetch();
                      // if email aready use in database
                      if($num_rows != 0) {
                        header('location: register.php?error=Email đã được sử dụng');


                      // if no user registed with this email before
                      }else{  
                      // create a new user
                
                      $stmt = $conn->prepare('INSERT INTO users (user_name,user_email,user_password) VALUES (?,?,?)');

                      $stmt->bind_param('sss',$name,$email,md5($password));


                      //if account was created successfully
                      if($stmt->execute()) {
                        $user_id = $stmt->insert_id;
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['user_email'] = $email;
                        $_SESSION['user_name'] = $name;
                        $_SESSION['logged_in'] = true;
                        header('location: account.php?register_success=Đăng ký thành công');
                      }else{
                        header('location: register.php?error=Không thể tạo tài khoản');
                      }
                   }
                }

    // if user aready logged in, then prevent them to enter register page
    }else if(isset($_SESSION['logged_in'])){
      header("location: account.php");
      exit;
    }

?>

<?php include('layouts/header.php') ?>
    <!--Register-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Đăng ký</h2>
        <hr
          class="mx-auto"
          style="max-width: 50px; border-width: 2px; color: orange"
        />
      </div>
      <div class="mx-auto container">
        <form action="register.php" method="POST" id="register-form">
          <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input
                  type="text"
                  class="form-control"
                  id="register-name"
                  name="name"
                  placeholder="Nhập vào tên đăng nhập"
                  required
                />
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="register-email"
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
              id="register-password"
              name="password"
              placeholder="Mật khẩu"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Nhập lại mật khẩu</label>
            <input
              type="password"
              class="form-control"
              id="register-confirm-password"
              name="confirmPassword"
              placeholder="Mật khẩu"
              required
            />
          </div>
          <div>
            <input type="submit" class="btn" id="register-btn" name="register" value="Đăng ký" />
          </div>
          <div>
            <a href="login.php" id="login-url" class="btn">Đã có tài khoản? Đăng nhập</a>
          </div>
        </form>
      </div>
    </section>

    <?php include('layouts/footer.php') ?>