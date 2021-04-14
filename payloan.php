<!DOCTYPE html>
<html>
<head>
	<title>Loan Payment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

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
  padding: 20px;
}
</style>
    </style>
</head>
<body>
<div class="container">

<div class="alert alert-success">
    
    <center><h2>Fill the form to Repay Loan</h2>
    
    </center>

  </div>

	<div class="row">
      <div class="col-5">
          <img src="https://cdn.pixabay.com/photo/2017/09/07/08/53/money-2724235__340.jpg" width="400px" height="500px" class="img-fluid">
      </div>
      <div class="col">
      
<form method="POST" action="">
  <div class="col-7">
    <label for="" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" id="" aria-describedby="">
   
  </div>
  <div class="col-7">
    <label for="" class="form-label">ID number</label>
    <input type="text" name="ID" class="form-control" id="">
  </div>

  <div class="col-7">
    <label for="" class="form-label">Amount</label>
    <input type="text" name="amount" class="form-control" id="">
  </div>
  
  <button name="save" type="submit" class="btn btn-success">Submit</button>
</form>


<?php

        
        //capture
        //
    if (isset($_POST['save'])) {
          //capture the form
          # code...
          $fullName = $_POST['name'];
          $IDnumber = $_POST['ID'];
          $amount = $_POST['amount'];
          

          insertDataToTable($fullName,$IDnumber,$amount);
       
      
        }

        function insertDataToTable($fullName,$IDnumber,$amount){
          //connection with the db
          require('connect.php');




          $sql = "INSERT INTO `payloan`(`name`, `ID number`, `amount`) VALUES (?,?,?)";

          //prepare the query
          if($stmt = mysqli_prepare($conn,$sql)){
            //bind values
            mysqli_stmt_bind_param($stmt,"sii",$param_fullname,$param_ID,$param_amount);

            $param_fullname = $fullName;
            $param_ID = $IDnumber;
            $param_amount = $amount;
            
         
            //execute the query
            if (mysqli_stmt_execute($stmt)) {
              # code...
              echo "Loan Repayment Successful";
              header('location:loans.php');
              ob_end_flush();

            }else{
              echo "<h4 style='color: red;'>Something went wrong</h4>";
            }


          }else{
            echo "Something went wrong";
          }

          //close
          mysqli_close($conn);

        }

?>







</div></div>



</body>
</html>