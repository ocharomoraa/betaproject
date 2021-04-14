
<!DOCTYPE html>
<html>
<head>
	<title>Amber AgriTech</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container">
			<?php include('nav.php')?><br>
			<div class="row">
				<div class="col-4">
					<img src="https://cdn.pixabay.com/photo/2014/12/02/03/11/grapes-553463__340.jpg" width="600px" class="img-fluid">
				</div>
				<div class="col-6">
					<form method="POST" action="">
					  <!--<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Subjects</label>
					    <input type="text" class="form-control" name="course_name">
					
					  </div>-->
                       <!--<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Id</label>
					    <input type="text" class="form-control" name="product_Id">
					
					  </div>-->


					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Name</label>
					    <input type="text" class="form-control" name="name">
					
					  </div>
					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Product Description</label>
					    <input type="text" class="form-control" name="description">
					
					  </div>
					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Price</label>
					    <input type="text" class="form-control" name="price">
					
					  </div>
					   <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Seller's location</label>
					    <input type="text" class="form-control" name="location">
					
					  </div>




					   
					  
			  
			  <button name="save" type="submit" class="btn btn-success">SAVE</button>
			</form>
				</div>
				
			</div>

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
					$productName = $_POST['name'];
					$productDescription=$_POST['description'];
					$productPrice = $_POST['price'];
					$productLocation=$_POST['location'];
					
					

					//save above into database shop - tables - product
					//INSERT query Values ???
					$sql = "INSERT INTO product(id, name, description, price, location) VALUES(?, ?, ?, ?, ?)";

					//prepare statement - check if the above insert is correct or not
					if ($stmt = mysqli_prepare($conn,$sql)) {
						# code...
						//bind the paramers - ? ?? - 
						//- insert data type - varchar -s , int - i double d 
						mysqli_stmt_bind_param($stmt,"dssss", $param_id,$param_name, $param_description, $param_price, $param_location);

						//bind
						//$param_id=$productId;
						$param_name = $productName;
						$param_description = $productDescription;
						$param_price = $productPrice;
						$param_location=$productLocation;
						
						
		
						//$param_desc = $courseDesc;

						//execute the command - sql query - insert into db
						if (mysqli_stmt_execute($stmt)) {
							# code...
							echo "product added successfully to the database";
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
					 mysqli_close($conn);


				}

			?>
		
	</div>

</body>
</html>
