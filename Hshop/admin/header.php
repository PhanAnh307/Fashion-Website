<?php
include("../server/connection.php");
session_start();

if (isset($_GET["logout"])) {
    if(isset($_SESSION["admin_logged_in"])) {
      unset($_SESSION["admin_logged_in"]);
      unset($_SESSION["admin_name"]);
      unset($_SESSION["admin_email"]);
      header("location: login.php");
      exit();
  
    }

    
}   
if(!isset($_SESSION['admin_logged_in'])) {
        header('location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hshop quản trị viên</title>
    <link rel="icon" href="../assets/img/logo.JPG" type="img/x-icon">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></i>&nbsp;Quản trị viên</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                    
                        <li>
                            <a href="dashboard.php?logout=1" id="logout-btn">Đăng xuất</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>