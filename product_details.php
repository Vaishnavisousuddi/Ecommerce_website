<!--connect file-->
<?php
include('includes/connect.php');
include('functions/common_function.php');

session_start();


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content ="width=device-width, initial-scale-1.0">
        <title>Ecommerce Website using PHP and MySQL</title>
        <!-- bootstrap CSS link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!--font awsome link-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
        <!-- css file-->
      <link rel ="stylesheet" href="styles.css">
    </head>
<body>
    <!-- navbar-->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">

  <img src="./images/logo.png"alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./users_area/user_registration.php">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price();?>/-</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
    </form>
  </div>
</nav>

<!--calling  cart function-->
<?php
cart();
?>
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <?php
            if(!isset($_SESSION['username'])){
              echo "      <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome Guest</a>
            </li>   ";
            }else{
              echo "     <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>   ";
            }
if(!isset($_SESSION['username'])){
  echo "      <li class='nav-item'>
  <a class='nav-link' href='./users_area/user_login.php'>Login</a>
</li>  ";
}else{
  echo "      <li class='nav-item'>
  <a class='nav-link' href='./users_area/logout.php'>Logout</a>
</li>  ";
}
      ?>
    </ul>
    </ul>
</nav>
<!-- third child-->
<div class="bg-light">
    <h3 class="text-center">Everything store</h3>
    <p class="text-center">Communications is the heart of e-commerce and community</p>
</div>

<!-- fourth child-->
<div class="row p-1">
    <div class="col-md-10">
        <!--products-->
        <div class="class row">
        <!-- fetching products-->
        <?php
        //calling function
        view_details();
        get_unique_categories();
        get_unique_brands();
  ?>

<!--row end-->
</div>
<!--col end-->
</div>



<!--sidenav-->

    <div class="col-md-2 bg-secondary p-0">
        <!--brands to be displayed-->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
            </li>
            <?php

getbrands();
?>


        </ul>
        <!--categories to be displyed-->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php

getcategories()
?>
            


        </ul>
    </div>
</div>

<!-- last child -->
<!-- include footer-->
<?php include("./includes/footer.php") ?>
    
</div>

<!--bootstrap js link-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>