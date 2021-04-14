<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
<title>Amber AgriTech</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">

    

    <!--Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
  </head>
  <body>

    

<div class="container">
 
    

<div class="b-example-divider"></div>

<header class="p-3 bg-success text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item">
    <img src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-clean-farm-agriculture-logo-design-concept-png-image_3554521.jpg" width="90px" height="60px">






 <?php
  if (isset($_SESSION['name'])) {


      //admin
      if ($_SESSION['role']=='Admin') {

        echo '
          <li class="nav-item">
            <a class="nav-link text-white"a href="loanrecords.php">Loan Applications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white"a href="loanrepayments.php">Loan Repayments</a>
          </li>
        ';
        
      }elseif ($_SESSION['role']=='Farmer'){
        echo '
            <li class="nav-item">
              <a class="nav-link text-white"a href="addproducts.php">Add Products</a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white"a href="orders.php">Orders</a>
          </li>
           <li class="nav-item">
              <a class="nav-link text-white"a href="loans.php">Loans</a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link text-white"a href="info.php">Information</a>
          </li>
          ';
      

       }elseif ($_SESSION['role']=='Consumer'){
        echo '
            <li class="nav-item">
              <a class="nav-link text-white"a href="products.php">Products</a>
          </li>
          
          

          ';
        }
    
      echo '<li class="nav-item"><a class="nav-link text-dark" disabled" href="" tabindex="-1" aria-disabled="true"> Hi,'.$_SESSION['role'].' '.$_SESSION['name'].'</a></li>
    <li class="nav-item"> <a class="nav-link text-white" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>      
      </li>
  
  ';

  }else{
    //login
    echo '
       
     <li class="nav-item">
      <a class="nav-link text-white" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
    </li>
    ';
  }
  ?>




<!--</li>
        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
        <li><a href="addproducts.php" class="nav-link px-2 text-white">Add Product</a></li>
        <li><a href="products.php" class="nav-link px-2 text-white">Products</a></li>
        <li><a href="orders.php" class="nav-link px-2 text-white">Orders</a></li>
        <li><a href="loans.php" class="nav-link px-2 text-white">Loans</a></li>
        <li><a href="applyloan.php" class="nav-link px-2 text-white">Apply Loan</a></li>
        <li><a href="info.php" class="nav-link px-2 text-white">Information</a></li>
        <li><a href="admin.php" class="nav-link px-2 text-white">Admin</a></li>
        <li><a href="loanrecords.php" class="nav-link px-2 text-white">Applications</a></li>-->
      
      </ul>

      <!--<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        
      </form>

      <div class="text-end">
            <a href='login.php?' class='btn btn-outline-light me-2'>Login</a>
        <a href='register.php?' class='btn btn-light'>sign up</a>-->
        
  
      </div>
    </div>
  </div>
</header>

</div>
</body>

</html>




