<?php

include("connection.php");

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='accessories' LIMIT 4");
$stmt->execute();

$accessories_products = $stmt->get_result();


?>