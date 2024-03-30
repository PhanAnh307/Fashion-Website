<?php

include("connection.php");

$stmt = $conn->prepare("SELECT * FROM products ORDER BY product_id LIMIT 4");

$stmt->execute();

$featured_products = $stmt->get_result(); 

?>