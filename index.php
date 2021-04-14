<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Amber AgriTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
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
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php Include('nav.php')?><br>

<div class="container">
<div class="row">
  <div class="card bg-success text-white">
  <img src="https://images.unsplash.com/photo-1600333859091-e3cab71c2adc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" width="300px" height="380px" class="d-block w-100" alt="...">

  <div class="card-img-overlay">
    <h2 class="card-title">Amber AgriTech</h2>
    <p class="card-text">We provide solutions to the major problems our farmers are facing in Kenya</p>
    
  </div>

</div>
</div>

<br><br>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        
        <h2>Loans</h2>
        <p>We provide financial services to our farmers in form of loans to help them easily facilitate their agricultural activities. Most farmers are not able to produce quantity and quality products bacause of lack of enough funds to facilitate the activity.</p>
        <p><a class="btn btn-success" href="login.php">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        
        <h2>Market</h2>
        <p>We provide a platform where farmers can market their farm products and direcly sell to consumers without need of middle men. This will reduce consumer cost of purchase hence advantagious to them and to the farmers as well.</p>
        <p><a class="btn btn-success" href="login.php">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
       

          <h2>Farming</h2>
        <p> We provide learning materials which can guide our farmers on different ways of farming, pest control and storage methods</p>
        <p><a class="btn btn-success" href="login.php">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

     <?php
    //connection
    require('connect.php');
    //select querry

    $sql = "SELECT * FROM product";
    //execute querry

    $results = mysqli_query($conn,$sql);
   
    ?>



    <hr>

    
  </body>
</html>
