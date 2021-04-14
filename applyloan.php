<?php
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Amber AgriTech Loans</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

      <div class="container">
     <div class="alert alert-success">
    
    <center><h1>Fill the form below to apply</h1>
      
    </center>

  </div>

            <!-- <div class="row">
				
				<div class="col-6">
					
					<form method="POST" action="">

					 

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Full Name</label>
					    <input type="text" class="form-control" name="name">
					
					  </div>
					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">ID Number</label>
					    <input type="text" class="form-control" name="ID">
					
					  </div>
					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Location</label>
					    <input type="text" class="form-control" name="location">
					
					  </div>
            <div class="form-group col-5">
                           
                            <center>
                           <select name="type" id="" class="form-control">
                               <option value="">Select Type of Loan</option>
                               <option value="crop">Crop Loan</option>
                               <option value="agric">Agric Term Loan</option>
                               <option value="mechanization">Farm Mechanization</option>

                           </select>
                           </center>
                       </div>

					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Amount</label>
					    <input type="text" class="form-control" name="amount">
					
					  </div>




					   
					  
			  
			  <button name="save" type="submit" class="btn btn-success">Send</button>
			</form>-->





<form method="POST" action="" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Full Name</label>
    <input type="text" name="name" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Phone Number</label>
    <input type="text" name="phone" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">ID Number</label>
    <input type="text" name="ID" class="form-control" id="inputAddress" placeholder="">
  </div>

  <div class="col-md-4">
    <label for="image" class="form-label">Upload National ID</label>
  <input type="file" name="uploadfile" class="form-control" id="inputAddress">
   </div>               

  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address</label>
    <input type="text" name="location" class="form-control" id="inputAddress2" placeholder="">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Bank Account</label>
    <input type="text" name="account" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Loan Type</label>
    <select name="type" id="inputState" class="form-select">
      <option value="">Select Type of Loan</option>
      <option value="crop">Crop Loan</option>
      <option value="agric">Agric Term Loan</option>
      <option value="mechanization">Farm Mechanization</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Amount</label>
    <input type="text" name="amount" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <div class="col-12">
    <button name="upload" type="submit" class="btn btn-success">Apply</button>
  </div>
</form>




<?php

        
       
        
        if (isset($_POST['upload'])) {
          //capture the form
        
          $fullName = $_POST['name'];
          $phone=$_POST['phone'];
          $ID = $_POST['ID'];
          //$file=$_FILES['uploadfile']['name'];
          $location = $_POST['location'];
          $account=$_POST['account'];
          $type = $_POST['type'];
          $amount = $_POST['amount'];
          //$fileerror = $_FILES['uploadfile']['error'];

          $filename = $_FILES["uploadfile"]["name"];
          $tempname = $_FILES["uploadfile"]["tmp_name"];    
         $folder = "image/".$filename;
         
          insertDataToTable($fullName,$phone,$ID,$filename,$location,$account,$type,$amount);

        }


        function insertDataToTable($fullName,$phone,$ID,$filename,$location,$account,$type,$amount){
          //connect with db
          require('connect.php');

          $sql = "INSERT INTO `loans`(`Full Name`,`phone`, `ID number`,`image`, `location`,`account`, `type`, `Amount`) VALUES (?,?,?,?,?,?,?,?)";

          //prepare the query
          if($stmt = mysqli_prepare($conn,$sql)){
            //bind values
            mysqli_stmt_bind_param($stmt,"siisssss",$param_fullname,$param_phone,$param_ID,$param_image,$param_location,$param_account,$param_type,$param_amount);
            //param variables bind them

            $param_fullname = $fullName;
            $param_phone=$phone;
            $param_ID = $ID;
            $param_image=$filename;
            $param_location=$location;
            $param_account=$account;
            $param_type = $type;
            $param_amount=$amount;
            
            
           

            //execute the query
            if (mysqli_stmt_execute($stmt)) {
             
              echo "Application successful. We shall get back to you within 24hours.";
              header('location:loans.php');
              ob_end_flush();

            }else{
              echo "<h4 style='color: red;'>Something went wrong</h4>";
               //echo mysqli_close($conn);
            }


          }else{
            echo "Something went wrong";
           // echo mysqli_close($conn);
          }

          //close
          //mysqli_close($conn);

      }  

?>




				</div>
				
			</div></div>






</body>
</html>