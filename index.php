<!-- I changed the indentation of the screens (html and js) and not the php code.
  The reason why I did this was the depth of my html is getting deeper and will not fit the compute screen.
-->

<?php
  require 'config/config.php';
  require 'classes/classes.php';

  session_start();
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
      <!-- TODO: ADD ordered by name, please. -->

      <div class="container py-3">
        <h1>Order List</h1>
        <form id="order-form" method="post">
          <div class="py-3 w-75">
            <label for="name" class="form-label">Customer Name: </label>
            <input id="name" name="name" type="text" class="form-control" placeholder="John Doe">
          </div>
          <div class="mb-3 w-75">
            <label for="phone" class="form-label">Phone: </label>
            <input id="phone" name="phone" type="text" class="form-control" placeholder="1234567890">
          </div>
          <div class="mb-3 w-75">
            <label for="email" class="form-label">Email: </label>
            <input id="email" name="email" type="text" class="form-control" placeholder="john@test.com">
          </div>
          <div class="mb-3 w-75">
            <label for="address" class="form-label">Address: </label>
            <input id="address" name="address" type="text" class="form-control" placeholder="103 Redfox Grove">
          </div>
          <div class="form-group row">
            <div class="w-25">
              <label for="postcode" class="form-label">Post Code: </label>
              <input id="postcode" name="postcode" type="text" class="form-control" placeholder="A1B2C3">
            </div>
            <div class="w-25">
              <label for="city" class="form-label">City: </label>
              <input id="city" name="city" type="text" class="form-control" placeholder="Waterloo">
            </div>                
          </div>

          <div class="py-3 w-75">
            <label for="cred_num" class="form-label">Credit Card Number: </label>
            <input id="cred_num" name="cred_num" type="text" class="form-control" placeholder="1234-1234-1234-1234">
          </div>

          <div class="form-group row">
            <div class="py-3 w-25">
              <label for="cred_month" class="form-label">Credit Card Expiry Month: </label>
              <input id="cred_month" name="cred_month" type="text" class="form-control" placeholder="JAN">
            </div>
            <div class="py-3 w-25">
              <label for="cred_year" class="form-label">Credit Card Expiry Year: </label>
              <input id="cred_year" name="cred_year" type="text" class="form-control" placeholder="2030">
            </div>
          </div>

          <div class="form-group w-25">
            <label for="province">Province</label>
            <select id="province" name="province" class="form-select">
              <option value="AB">Alberta</option> 
              <option value="BC">British Columbia</option> 
              <option value="MB">Manitoba</option> 
              <option value="NT">Northwest Territories</option> 
              <option value="NU">Nunavut</option> 
              <option value="QC">Quebec</option> 
              <option value="SK">Saskatchewan</option> 
              <option value="YT">Yukon</option> 
              <option value="ON" selected>Ontario</option> 
              <option value="NB">New Brunswick</option>
              <option value="NL">Newfoundland and Labrador</option> 
              <option value="NS">Nova Scotia</option> 
              <option value="PE">Prince Edward Island</option>
            </select>
          </div>
          <hr>
          <!-- product list -->
          <div>
            <h2>Products</h2>
            <p>Please enter the number of products you want to buy.</p>
            <div class="d-flex flex-row justify-content-center gap-5">
              <div class="">
                <div class="card" style="width: 18rem;">
                  <!-- 
                    Image by <a href="https://pixabay.com/users/sweetlouise-3967705/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=6193207">Luisella Planeta LOVE PEACE 💛💙</a> from <a href="https://pixabay.com//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=6193207">Pixabay</a>
                  -->
                  <img src="assets/img/fiber-6193207_1280.jpg" class="card-img-top" alt="Ball of Yarn">
                  <div class="card-body">
                    <h5 class="card-title">Yarn</h5>
                    <p class="card-text">Price per ball: $2.25</p>
                    <div class="form-group">
                      <label for="yarn_qty">Qty</label>
                      <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="input-group my-2 w-25">
                          <input name="yarn_qty" type="number" class="form-control" id="yarn_qty" value="1">
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="">
                <div class="card" style="width: 18rem;">
                  <!--  
                    Image by <a href="https://pixabay.com/users/jwdenson-9385292/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=3926038">jwdenson</a> from <a href="https://pixabay.com//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=3926038">Pixabay</a>
                  -->
                  <img src="assets/img/knitting-3926038_1280.jpg" class="card-img-top" alt="Wooden Knitting Needles">
                  <div class="card-body">
                    <h5 class="card-title">Knitting Needles</h5>
                    <p class="card-text">Price per pair: $5.50</p>
                    <div class="form-group">
                      <label for="needle_qty">Qty</label>
                      <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="input-group my-2 w-25">
                          <input name="needle_qty" type="number" class="form-control" id="needle_qty" value="1">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="d-flex flex-row justify-content-center m-5">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

      <div class="alert alert-success mb-3" role="alert">
          Order processed successfully!
      </div>
      <div class="alert alert-danger m-3" role="alert">
        Error was encountered.
      </div>
      <div id="receipt-container" class="container border border-dark">
        <div id="receipt" class="p-3">

        </div>
      </div>
    </main>
    <?php include 'partials/footer.php';?>

  </body>
</html>