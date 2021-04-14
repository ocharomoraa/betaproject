<!DOCTYPE html>
<html>
<head>
	<title>Applied Loans</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
  <?php 
      include('nav.php');


    ?>
    
        <br><br>

    <h2 style="margin-left: 130px;">Loan Applications</h2>
    
      <center><div class="container-fluid">
      
    <div class="col-10">
      
    

    <table class="table table-striped">
      <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Full Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">ID Number</th>
      <th scope="col">ID Image</th>
      <th scope="col">Location</th>
      <th scope="col">Bank A/C</th>
      <th scope="col">Loan Type</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
      

    
    <?php

    /*Retrieving fetching items /records
  1.Establish connection from php and the db.
  2.Have query 
  SELECT * FROM table 
  3.Go ahead display - manipulate*/

  //connection
  //include 
  require('connect.php');

  $sql = "SELECT * FROM loans";

  //execute 
  //use the function  mysqli_query
  /*
    conn-
    query
  */
    $result = mysqli_query($conn,$sql);
    if ($result) {
      # code...
      //check if the resullts
      mysqli_num_rows($result);
      
      $rows = mysqli_num_rows($result);//returns the rows 
      if ($rows>0) {
        # code...
        //echo "$rows";
        //we can go ahead get the records
        //if we get them associate array id - 1
        
        while($record = mysqli_fetch_assoc($result)){
            //echo $record['name'];
            //echo "<br>";


            echo "<tr>";
            echo "<td>".$record['id']."</td>";
            echo "<td>".$record['Full Name']."</td>";
            echo "<td>".$record['phone']."</td>";
            echo "<td>".$record['ID number']."</td>";
            echo "<td>".$record['image']."</td>";
            echo "<td>".$record['location']."</td>";
            echo "<td>".$record['account']."</td>";
            echo "<td>".$record['type']."</td>";
            echo "<td>".$record['Amount']."</td>";
            echo "<td>
            <form method='POST' action=''>
              <a href='index.php?id=".$record['id']."' class='btn btn-success'>Approve</a>

              <a href='index.php?id=".$record['id']."' class='btn btn-success'>Reject</a>
              
              
              </form>
            </td>";
            echo "</tr>";
        }

      }else{
        echo "<h4>No Applications available</h4>";
      }
    }else{
      echo "OOPS! Something went wrong, try again ".mysqli_error($conn);
    }


    ?>

    

  
  </table>

  </div>
    
  </div></center>


</body>
</html>