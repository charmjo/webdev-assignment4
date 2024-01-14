<?php
  $error = false;
  require 'process.php';

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
    <?php include 'partials/header.php';?>
    <main class="pb-3">
      <?php include 'partials/nav.php';?>
      <div class="d-flex justify-content-center">
        <div class="w-50">
          <div class="alert alert-success mb-3" role="alert">
            Order processed successfully!
          </div>

          <?php if ($error) { ?>
          <div class="alert alert-danger m-3 d-block" role="alert">
            Unsuccessful Login. Password or Email entered was incorrect.
          </div>
          <?php } ?>
          <h1 class="p-3 text-center">Login Form</h1>
          <form method="POST" id="login-form" class="">
            <div class="form-group mb-3 text-start">
              <label for="login-email">Email address</label>
              <input name="login-email" type="email" class="form-control" id="login-email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mb-3 text-start">
              <label for="login-password">Password</label>
              <input name="login-password" type="password" class="form-control" id="login-password" placeholder="Password">
            </div>
            <input id="action" name="action" value="login" hidden>
            <div class="text-center pt-5">
              <button type="submit" class="btn btn-primary text-center">Submit</button>
            </div>
          </form>
        </div>           
      </div>

    </main>
    <?php include 'partials/footer.php';?>

  </body>
</html>