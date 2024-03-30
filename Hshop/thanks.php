
<?php
session_start();

include("server/connection.php");
//delete all product from cart

//store order information in database
$user_id = $_SESSION['user_id'];
if  (isset($_SESSION['order_id']) && !empty($_POST['cart_payment_btn'])) {
                
                $order_id = $_SESSION['order_id'];
                $order_status = 'hoàn thành';
                $payment_date = date("Y-m-d H:i:s");

                //change order_status to complete
                $stmt = $conn->prepare('UPDATE orders SET order_status=? WHERE order_id=?');
                $stmt->bind_param('si',$order_status,$order_id);
                if ($stmt->execute()) {
                  $stmt1 = $conn->prepare('INSERT INTO payments (order_id,user_id,payment_date) VALUES (?,?,?)');
                  $stmt1->bind_param('iis',$order_id,$user_id,$payment_date);
                  $stmt1->execute();
                  $_SESSION['quantity'] = 0;
                  $_SESSION['total']=0;
                  $_SESSION['cart'] = [];
                    
                
                }
            }else if(isset($_POST['order_details_payment_btn'])){
              $order_id = $_POST['order_id'];
              $order_status = 'hoàn thành';
              $payment_date = date("Y-m-d H:i:s");

                //change order_status to complete
                $stmt = $conn->prepare('UPDATE orders SET order_status=? WHERE order_id=?');
                $stmt->bind_param('si',$order_status,$order_id);
                if ($stmt->execute()) {
                  $stmt1 = $conn->prepare('INSERT INTO payments (order_id,user_id,payment_date) VALUES (?,?,?)');
                  $stmt1->bind_param('iis',$order_id,$user_id,$payment_date);
                  if($stmt1->execute()){
                    $_SESSION['cart'] = [];
                 
                  }
                }
                
            }


            


//header user to index.php


?>
<?php include('layouts/header.php') ?>






    <!--contact-->
    <section id="contact" class="container" style="margin:200px auto" >
      <div class="container text-center mt-5">
        <h3>Cảm ơn quý khách đã sử dụng dịch vụ</h3>
        <hr class="mx-auto" />
        <p class="w-50 mx-auto">Hàng sẽ được ship tới bạn sớm nhất có thể</span></p>
        <p class="w-50 mx-auto">Số điện thoại: <span>0346 589 990</span></p>
        
        <p class="w-50 mx-auto">Phục vụ 24/7 để hỗ trợ bạn.</p>
      </div>
    </section>

    <?php include('layouts/footer.php') ?>