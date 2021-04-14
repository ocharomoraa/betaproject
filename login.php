
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
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="col-5">
    	 <label for="name">Username</label>
      <input type="text" class="form-control" name="email" id="" placeholder="Email">
     
    </div>
    <div class="col-5">
    	  <label for="Password">Password</label>
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      
    </div>

    <div class="form-group col-5">
                           
                            <center>
                           <select name="role" id="" class="form-control">
                               <option value="">Select Your Role</option>
                               <option value="farmer">Farmer</option>
                               <option value="consumer">Consumer</option>
                               <option value="Admin">Admin</option>
                           </select>
                           </center>
                       </div>



  <div class="form-group col-5">
    <input class="btn btn-success col-5" type="submit" name="login"><br>
    <a style='text-decoration: none;'href="register.php"><span>Create Account</span></a>	
    </div>
  </form></center>
</main>



<?php
if (isset($_POST['login'])) {
      
        $email = $_POST['email'];
        $role= $_POST['role'];
        $password = $_POST['password'];

        //connect
        require('connect.php');
        //sql
        $sql = "SELECT * FROM users WHERE email = ? AND role=?";


        if ($stmt = mysqli_prepare($conn,$sql)) {
         
          //bind
          mysqli_stmt_bind_param($stmt,"ss",$param_email,$param_role);
          $param_email = $email;
          $param_role = $role;
          

          //execute the query
          mysqli_execute($stmt);

          //get results
          $result = mysqli_stmt_get_result($stmt);

          if ($result) {
        
          $rows = mysqli_num_rows($result);
          if ($rows>0) {
            $record = mysqli_fetch_assoc($result);
            # code...
            //verify password
            //function password_verify
            //echo $record['password'];
            $status= password_verify($password, $record['password']);
            if ($status) {
              # code...

              echo "Successfully Logged In.Welcome ".$record['name'];
              header('location:index.php');

              //store the name of logined person
              //sessions
              session_start();
              $_SESSION['name']=$record['name'];
              $_SESSION['email'] = $record['email'];
              $_SESSION['role'] = $record['role'];

            }else{
              echo "<h4 style='color:red'>Invalid email or password.Try again</h4>";
            }
            
            
          }else{
            echo "<h4 style='color:red'>Invalid email or password.Try again</h4>";
          }

          }else{
            echo "Something is wrong ".mysqli_error($conn);
          }

        }

      }
?>
</div></div></div>



    
  </body>
</html>

