<?php
//To include the database file that connected to our store database
include('includes/database.php');
 ?>
 <?php
 //Create the SELECT query
 $query = "SELECT c.id, c.first_name, c.last_name, c.email, ca.address, ca.city, ca.state, ca.zipcode FROM customers as c INNER JOIN customer_addresses as ca ON c.id = ca.customer ORDER BY join_date DESC ";

 //To get the result from our above query
 $result = $conn->query($query) or die($mysqli->error._LINE_);
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CManager | Dashboard </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<main>
  <div class="container py-4">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Store CManager</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="add_customer.php" class="nav-link">Add Customer</a></li>
      </ul>
    </header>
      <div class="col-md-12">
        <div class="h-100 p-5 rounded-3">
          <?php
          session_start();
          if(!empty($_GET['msg'])) {
            $message = $_GET['msg'];
            echo '<div class="alert alert-success" role="alert">'. $message . '</div>';
        }
           ?>
          <h2>Customers</h2>
          <table class="table table-striped">

            <thead>
              <tr>
                <th scope="">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              //To check if a result was displayed
              if ($result -> num_rows > 0){
                //Loop through results
                while ($row = $result->fetch_assoc()) {
                  //Display customer info
                  $output = '<tr>';
                  $output .= '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
                  $output .= '<td>'.$row['email'].'</td>';
                  $output .= '<td>'.$row['address'].' '.$row['city'].' '.$row['state'].'</td>';
                  $output .= '<td>'.'<a href="edit_customer.php?id='.$row['id'].'" class="btn btn-outline-primary btn-sm" id ='.'>'.'Edit'.'</a>'.'</td>';

                  //Display output
                  echo $output;

                }
              }
              else{
                echo "Sorry, no customers were found";
              }
               ?>
             </tbody>
            </table>
        </div>
      </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2022
    </footer>
  </div>
</main>

</body>
</html>
