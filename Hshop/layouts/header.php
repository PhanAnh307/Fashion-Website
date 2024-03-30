<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hshop</title>
    <link rel="icon" href="../assets/img/logo.JPG" type="img/x-icon">
    <!--style sheet-->
    <link rel="stylesheet" href="/assets/css/style.css" />
    <!--boostrap-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <!--font awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!--navbar-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top py-3 ">
          <div class="navmenu">

            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div
              class="collapse navbar-collapse nav-buttons"
              id="navbarSupportedContent"
            > 

            
              <img src="assets/img/logo.jpg" alt="picture of cart" class="logo" />
              <h2><a href="index.php" style="font-weight: bold;text-decoration:none;color:black;">Hshop</a></h1>
            
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Liên hệ</a>
                </li>
                
                <li class="nav-item icon">
                  <a href="cart.php" style="text-decoration: none;">
                    <span class="fa-solid fa-cart-shopping">
                      <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) {?>
                          <span class="cart-quantity" >

                                <?php echo $_SESSION['quantity']; ?>
                              
                          </span>
                      <?php } ?>
                  </span>
                </a>
                  <a href="account.php"><span class="fas fa-user ms-2"></span></a>
                </li>
              </ul>
  
              
            </div>
          </div>
        </nav>
      </div>