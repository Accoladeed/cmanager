<?php include('includes/database.php') ?>
<?php
if ($_POST) {
  $first_name = $conn -> real_escape_string($_POST['first_name']);
  $last_name = $conn -> real_escape_string($_POST['last_name']);
  $email = $conn -> real_escape_string($_POST['email']);
  $password = $conn -> real_escape_string(md5($_POST['password']));
  $address = $conn -> real_escape_string($_POST['address']);
  $address2 = $conn -> real_escape_string($_POST['address2']);
  $city = $conn -> real_escape_string($_POST['city']);
  $state = $conn -> real_escape_string($_POST['state']);
  $zipcode = $conn -> real_escape_string($_POST['zipcode']);

  //Create 'INSERT' customers query
  $queryy = "INSERT INTO customers (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', 'password')";
  //Run query
  $conn -> query($queryy);

  //Create 'INSERT' customer_addresses query
  $query = "INSERT INTO customer_addresses (customer, address, address2, city, state, zipcode) VALUES ('$conn->insert_id', '$address', '$address2', '$city', '$state', '$zipcode')";
  //Run query
  $conn -> query($query);

  header("Location:index.php?msg=success");
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CManager | Add Customer </title>
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
        <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="add_customer.php" class="nav-link active">Add Customer</a></li>
      </ul>
    </header>

      <div class="col-md-12">
        <div class="h-100 p-5 rounded-3">
          <h2>Add Customers</h2>
          <form role="form" method="post" action="add_customer.php">
               <div class="mb-3">
                 <label class="form-label">First Name</label>
                 <input name="first_name" type="text" class="form-control" placeholder="First Name">
              </div>
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="last_name" type="text" class="form-control" placeholder="Last Name">
             </div>
             <div class="mb-3">
               <label class="form-label">Email</label>
               <input name="email" type="text" class="form-control" placeholder="Email address">
             </div>
             <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Password</label>
               <input name = 'password' type="password" class="form-control" id="exampleInputPassword1">
             </div>
             <div class="mb-3">
               <label class="form-label">Address</label>
               <input name="address" type="text" class="form-control" placeholder="Enter Address">
            </div>
            <div class="mb-3">
              <label class="form-label">Address 2</label>
              <input name="address2" type="text" class="form-control" placeholder="Enter Address 2">
           </div>
           <div class="mb-3">
             <label class="form-label">City</label>
             <input name="city" type="text" class="form-control" placeholder="Enter City">
          </div>
          <div class="mb-3">
            <label class="form-label">State</label>
            <input name="state" type="text" class="form-control" placeholder="Enter State">
         </div>
         <div class="mb-3">
           <label class="form-label">Zipcode</label>
           <input name="zipcode" type="text" class="form-control" placeholder="Enter Zipcode">
        </div>

              <button type="submit" class="btn btn-primary">Add customer</button>
          </form>

        </div>
      </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2022
    </footer>
  </div>
</main>

</body>
</html>
