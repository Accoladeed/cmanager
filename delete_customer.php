<?php include('includes/database.php') ?>
<?php
//To assign the get value to a variable
$id = $_GET['id'];
//Query to delete customer address from customer_addresses table
$query1 = "DELETE FROM customer_addresses WHERE customer = $id";
$conn -> query($query1);

//Guery to delete the customer from the customers table
$query = "DELETE FROM customers WHERE id = $id";
$conn -> query($query);



 ?>

 <!doctype html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="generator" content="Hugo 0.101.0">
     <title>CManager | Edit Customer </title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://kit.fontawesome.com/bc584c2741.js" crossorigin="anonymous"></script>
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
         <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
         <li class="nav-item"><a href="add_customer.php" class="nav-link">Add Customer</a></li>
       </ul>
     </header>

       <div class="col-md-12">
         <div class="h-100 p-5 rounded-3">
           <h2></h2>
           <?php
           $result = $conn -> query("SELECT * FROM customers WHERE id = $id");

           if ($result -> num_rows <= 0){
             echo '<div style="text-align: center">'.'<i class="fa-solid fa-circle-xmark fa-5x" style="color: green;"></i>' . '<br>' .'<br>'. '<h3>' . 'DELETED' . '</h3>'. '</div>';
           }
           else{
             echo "RECORD FOUND";
           }
           ?>


         </div>
       </div>

     <footer class="pt-3 mt-4 text-muted border-top">
       &copy; 2022
     </footer>
   </div>
 </main>

 </body>
 </html>
