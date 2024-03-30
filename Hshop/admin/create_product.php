<?php

include("../server/connection.php");

if(isset($_POST["create_product"])){

    //store product data in variable
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];
    $product_description = $_POST['description'];

    //store image data in variable
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];



    $image_name1 = $product_name."_1.jpg";
    $image_name2 = $product_name."_2.jpg";
    $image_name3 = $product_name."_3.jpg";
    $image_name4 = $product_name."_4.jpg";
    

    //upload images
    move_uploaded_file($image1,"../assets/img/".$image_name1);
    move_uploaded_file($image2,"../assets/img/".$image_name2);
    move_uploaded_file($image3,"../assets/img/".$image_name3);
    move_uploaded_file($image4,"../assets/img/".$image_name4);

    //insert images in to database
    $stmt = $conn->prepare("INSERT INTO products (product_name,product_price,product_category,product_description,product_image,product_image2,product_image3,product_image4) 
                                            VALUE(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sissssss", $product_name,$product_price, $product_category, $product_description, $image_name1,$image_name2,$image_name3,$image_name4) ;

    if( $stmt->execute() ) {
        header("location: products.php?product_created=Sản phẩm đã được thêm vào danh sách");
    }else{
        header("location: products.php?product_failure=Sản phẩm không thể thêm vào danh sách");
    }

}


?>