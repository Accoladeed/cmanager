<?php include('includes/database.php') ?>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM customers INNER JOIN customer_addresses ON customers.id = customer_addresses.customer WHERE customers.id = $id";
$result = $conn -> query($query) or die($conn->error__LINE__);


if ($_GET['id']){
  $row = $result -> fetch_assoc();
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
  $password = $row['password'];
  $address = $row['address'];
  $address2 = $row['address2'];
  $city = $row['city'];
  $state = $row['state'];
  $zipcode = $row['zipcode'];
}
 ?>
 <?php
 if ($_POST) {
   $id = $_GET['id'];
   $first_name = $conn -> real_escape_string($_POST['first_name']);
   $last_name = $conn -> real_escape_string($_POST['last_name']);
   $email = $conn -> real_escape_string($_POST['email']);
   $password = $conn -> real_escape_string(md5($_POST['password']));
   $address = $conn -> real_escape_string($_POST['address']);
   $address2 = $conn -> real_escape_string($_POST['address2']);
   $city = $conn -> real_escape_string($_POST['city']);
   $state = $conn -> real_escape_string($_POST['state']);
   $zipcode = $conn -> real_escape_string($_POST['zipcode']);

   //Create 'UPDATE' customers query
   $query = "UPDATE customers SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = $id";
   //Run query
   $conn -> query($query) or die();

   //Create 'UPDATE' customer_addresses query
   $query = "UPDATE customer_addresses SET address = '$address', address2 = '$address2', city = '$city', state = '$state', zipcode = '$zipcode' WHERE customer = $id";
   //Run query
   $conn -> query($query) or die();

   header("Location:index.php?msg=Editted Successfully");
 }

  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.101.0">
    <title>CManager | Edit Customer </title>
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
        <li class="nav-item"><a href="add_customer.php" class="nav-link">Add Customer</a></li>
      </ul>
    </header>

      <div class="col-md-12">
        <div class="h-100 p-5 rounded-3">
          <h2>Edit Customers</h2>
          <form role="form" method="post" action="edit_customer.php?id=<?php echo $id ?>">
               <div class="mb-3">
                 <label class="form-label">First Name</label>
                 <input name="first_name" type="text" class="form-control" value = <?php echo $first_name ?> placeholder="First Name">
              </div>
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input name="last_name" type="text" class="form-control" value = <?php echo $last_name ?> placeholder="Last Name">
             </div>
             <div class="mb-3">
               <label class="form-label">Email</label>
               <input name="email" type="text" class="form-control" value = <?php echo $email ?> placeholder="Email address">
             </div>
             <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label" >Password</label>
               <input name = 'password' type="password" class="form-control" value = <?php echo $password ?> id="exampleInputPassword1">
             </div>
             <div class="mb-3">
               <label class="form-label">Address</label>
               <input name="address" type="text" class="form-control" value = <?php echo $address ?> placeholder="Enter Address">
            </div>
            <div class="mb-3">
              <label class="form-label">Address 2</label>
              <input name="address2" type="text" class="form-control" value="<?php echo $address2;?>" placeholder="Enter Address 2">
           </div>
           <div class="mb-3">
             <label class="form-label">City</label>
             <input name="city" type="text" class="form-control" value="<?php echo $city;?>" placeholder="Enter City">
          </div>
          <div class="mb-3">
            <label class="form-label">State</label>
            <input name="state" type="text" class="form-control" value="<?php echo $state;?>" placeholder="Enter State">
         </div>
         <div class="mb-3">
           <label class="form-label">Zipcode</label>
           <input name="zipcode" type="text" class="form-control" value="<?php echo $zipcode;?>" placeholder="Enter Zipcode">
        </div>
              <button type="submit" class="btn btn-primary">Update customer</button>
          </form>

          <a style="margin-top:60px;" type="button" class="btn btn-danger" href="delete_customer.php?id=<?php echo $id; ?>">Delete Customer</a>

        </div>
      </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      &copy; 2022
    </footer>
  </div>
</main>

</body>
</html>
