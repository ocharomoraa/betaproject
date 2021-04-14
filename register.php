<?php
ob_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
<title>Register</title>
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body>

<?php Include('nav.php')?><br>

    <div class="container">


    <div class="row">
      <div class="col-4">
          <img src="https://images.unsplash.com/photo-1560466683-62821c7ab0fa?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDB8fGFncmljdWx0dXJlfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" width="300px" height="300px" class="img-fluid">
      </div>
      <div class="col">

          <form method="POST" action="">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" required>
          
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
          
            </div>

             <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="phone" required>
          
          </div>

              <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Location</label>
              <input type="text" class="form-control" name="location" required>
          
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required>
          
            </div>

             <div class="form-group">
                            <label for="">Role</label>
                            <center>
                           <select name="role" id="" class="form-control">
                               <option value="">Select Your Role</option>
                               <option value="Farmer">Farmer</option>
                               <option value="Consumer">Consumer</option>
                               <option value="Admin">Admin</option>
                           </select>
                           </center>
                       </div>
<br>


           <button name="register" type="submit" class="btn btn-success">Register</button>

      </form>

<?php

        
        //capture
        //
    if (isset($_POST['register'])) {
          //capture the form
          # code...
          $fullName = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $location = $_POST['location'];
          $password = $_POST['password'];
          $role = $_POST['role'];
          

          //hash the password
          //password_hash()
            //password to be encrypt
            //-alorigy
            //PASSWORD_DEFAULT
            //- hashed
        
          //
      $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

          insertDataToTable($fullName,$email,$phone,$location,$encryptedPassword,$role);

        }

        function insertDataToTable($fullName,$email,$phone,$location,$password,$role){
          //connection with the db
          require('connect.php');




          $sql = "INSERT INTO `users`(`name`, `email`, `Phone number`, `location`, `password`, `role`) VALUES (?,?,?,?,?,?)";

          //prepare the query
          if($stmt = mysqli_prepare($conn,$sql)){
            //bind values
            mysqli_stmt_bind_param($stmt,"ssssss",$param_fullname,$param_email,$param_phone,$param_location,$param_password,$param_role);
            //param variables bind them

            $param_fullname = $fullName;
            $param_email = $email;
            $param_phone = $phone;
            $param_location=$location;
            $param_password = $password;
            $param_role = $role;
            
            
           

            //execute the query
            if (mysqli_stmt_execute($stmt)) {
              # code...
              echo "Registered Successfully";
              header('location:login.php');
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
