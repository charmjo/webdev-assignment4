<?php
  require 'config/config.php';
  require 'classes/classes.php';

  session_start();

  if(!isset($_SESSION['username'])) { 
    header("Location:login-view.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="assets/js/custom.js"></script>
</head>
<body>
  <script>
    $(window).load(function () {
      displayOrdersList();
    });
</script>
<?php include 'partials/header.php';?>
<main class="pb-3">
    <?php include 'partials/nav.php';?>
    <div class="container my-3">
      <h1>Order List</h1>
      <table id="order-list" class="table table-striped">
        <thead>
          <tr>
          <th scope="col">Ordered By</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Sales Tax</th>
          <th scope="col">Grand Total</th>
          <th scope="col">Order Date</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </main>
  <?php include 'partials/footer.php';?>
</body>
</html>