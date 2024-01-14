<?php
  require 'config/config.php';
  require 'classes/classes.php';

  session_start();

  if(!isset($_SESSION['access_level']) || ($_SESSION['access_level'] != ADMIN)) {
    $logout = new Login();
    $logout->logoutUser();

    header('Location:login-view.php');
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
      displayManagerList();
    });
  </script>
  <?php include 'partials/header.php';?>
  <main class="pB-3">
    <?php include 'partials/nav.php';?>
    <div class="container">
      <div id="manager-form-container" class="my-3">
        <h1>Create Shop Manager</h1>
        <div class="alert alert-success mb-3" role="alert">
          Manager was added successfully!
        </div>
        <div class="alert alert-danger m-3" role="alert">
          Manager was not added because an error occured.
        </div>
        <form id="manager-form">
          <div class="form-group mb-3">
            <label for="fname">First Name</label>
            <input name="fname" type="text" class="form-control" id="fname" placeholder="John">
          </div>
          <div class="form-group mb-3">
            <label for="lname">Last Name</label>
            <input name="lname" type="text" class="form-control" id="lname" placeholder="Doe">
          </div>
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="john@test.com" required>
          </div>
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" required>
          </div>
          <div class="form-group row py-3">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Add New Manager</button>
            </div>
          </div>
        </form>
      </div>
      <div class="alert alert-danger" role="alert">
        List was not retrieved because an error occured.
      </div>
      <!-- manager list table -->
      <table id="managers-list" class="table table-striped">
        <thead>
          <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Access Level</th>
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