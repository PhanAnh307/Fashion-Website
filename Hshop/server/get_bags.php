<?php

include("connection.php");

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='bags' LIMIT 4");
$stmt->execute();

$bags_products = $stmt->get_result();


?>