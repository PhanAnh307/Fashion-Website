<?php
function calculateTotalCart(){

    $total_price = 0;
    $total_quantity = 0;
  foreach ($_SESSION['cart'] as $key => $value) {
    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['product_quantity']; 

    $total_price += $price * $quantity;
    $total_quantity +=  $quantity;
  }

  $_SESSION['total'] = $total_price;
  $_SESSION['quantity'] = $total_quantity;
} 


?>