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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

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



    
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <div class="container">
    <div class="row">
      
      <div class="col">
    
<main class="form-signin">
  <center><form method="POST" action="">
    <img src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-clean-farm-agriculture-logo-design-concept-png-image_3554521.jpg" width="90px" height="60px">
    <h1 class="h3 mb-3 fw-normal">Please fill in!</h1>

    <div class="col-5">
    	 <label for="name">Full Name</label>
      <input type="text" class="form-control" id="" name="name" placeholder="full name">
     
    </div>
    <div class="col-5">
    	  <label for="Password">Phone</label>
      <input type="text" class="form-control" id="" name="phone" placeholder="phone">
      
    </div>
    <div class="col-5">
    	  <label for="Password">Address</label>
      <input type="text" class="form-control" id="" name="address" placeholder="location">
      
    </div>
    <div class="col-5">
    	  <label for="Password">Quantity</label>
      <input type="text" class="form-control" id="" name="quantity" placeholder="quantity">
      
    </div>

    <div class="form-group col-5">
                           
                            <center>
                           <select name="payment" id="" class="form-control">
                               <option value="">Payment Method</option>
                               <option value="M-PESA">M-PESA</option>
                               <option value="cash">Cash</option>
                               <option value="card">Card</option>
                           </select>
                           </center>
                       </div>




    <button  name="save" class="btn btn-success col-5" type="submit">Order</button>
    
  </form></center>
</main>

<?php
      /*
      1.connection to db - php and our db
      2.Capture the data from 
      3.Insert - 
        sql query
      */

        require('connect.php');
        /*require('checkloginstatus.php');
      if ($_SESSION['role']=='student') {
        # code...
        echo "You are a student hence cannot access this page";
        header('location:index.php');
      }*/

        if (isset($_POST['save'])) {
          # code...
          //$productId=$_POST['product_Id'];
          $buyerName = $_POST['name'];
          $buyerPhone=$_POST['phone'];
          $buyerAddress = $_POST['address'];
          $quantity=$_POST['quantity'];
          $payment=$_POST['payment'];
          

          //save above into database shop - tables - product
          //INSERT query Values ???
          $sql = "INSERT INTO purchases(`name`, `phone`, `address`, `quantity`, `payment`) VALUES(?, ?, ?, ?, ?)";

          //prepare statement - check if the above insert is correct or not
          if ($stmt = mysqli_prepare($conn,$sql)) {
            # code...
            //bind the paramers - ? ?? - 
            //- insert data type - varchar -s , int - i double d 
            mysqli_stmt_bind_param($stmt,"sssss", $param_name,$param_phone, $param_address, $param_quantity, $param_payment);

            //bind
            //$param_id=$productId;
            $param_name = $buyerName;
            $param_phone = $buyerPhone;
            $param_address = $buyerAddress;
            $param_quantity=$quantity;
            $param_payment = $payment;
            
            
    
            //$param_desc = $courseDesc;

            //execute the command - sql query - insert into db
            if (mysqli_stmt_execute($stmt)) {
              # code...
              echo "goods Ordered successfully";
              //redirect go to my products
              header("location:products.php");
            }else{
              echo "Something went wrong.Try again.".mysqli_error($conn);
            }
            //close the stm
            mysqli_stmt_close($stmt);

          }else{
            echo "Error in the query";
          }
          //close connection.
           echo mysqli_close($conn);


        }

      ?>

</div></div></div>
    
  </body>
</html>
