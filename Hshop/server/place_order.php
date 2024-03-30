<?php
session_start();
include('server/calculatorfunction.php');
include("connection.php");

if (!isset($_SESSION["logged_in"])) {
    header("location: ../login.php?message=Bạn phải đăng nhập để mua hàng");
    exit();
} else {
    
    if(isset($_POST['continue_shopping'])){
            // unset($_SESSION['cart']);
            
            $_SESSION['quantity'] = 0;
            $_SESSION['total']=0;
            $_SESSION['cart'] = [];
            header('location: ../shop.php');
            calculateTotalCart();
            }

    if (isset($_POST["place_order"])) {

        //get user info and store it in database

        $email = $_POST["email"];
        $city = $_POST["city"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $order_cost = $_SESSION["total"];
        $order_status = "đang chờ";
        $user_id = $_SESSION['user_id'];
        $order_date = date("Y-m-d H:i:s");

        // issue new order and store order info in database
        $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) VALUES (?,?,?,?,?,?,?);");

        $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

        $stmt_status = $stmt->execute();
        if (!$stmt_status) {
            header('location: index.php');
            exit();
        }

        $order_id = $stmt->insert_id;


        //get products from cart(from session )

        foreach ($_SESSION['cart'] as $key => $value) {

            $product = $_SESSION['cart'][$key];
            $product_id = $product['product_id'];
            $product_name = $product['product_name'];
            $product_image = $product['product_image'];
            $product_price = $product['product_price'];
            $product_quantity = $product['product_quantity'];


            //store each single item in order_items database

            $stmt1 = $conn->prepare('INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                                            VALUES (?,?,?,?,?,?,?,?)');

            $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

            $stmt1->execute();
        }
        $_SESSION['order_id'] = $order_id;
        //remove everything from cart --> delay until payment is done
        
        // inform user whether everything is fine or there is a problem
        header('location: ../cart_payment.php?order_status=đang chờ');
    }
}
