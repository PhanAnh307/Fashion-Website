<?php

include("connection.php");

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='pants' LIMIT 4");
$stmt->execute();

$pants = $stmt->get_result();


?>