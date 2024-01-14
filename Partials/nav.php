<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="./index.php">
    <img id="logo" src="./assets/img/logo-new.png" alt="Winter Trinkets Logo" width="200" class="mx-2">
  </a>
  <div class="justify-content-center" id="navbarNav">
  <!-- <div class="collapse navbar-collapse justify-content-center" id="navbarNav"> -->
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order-list">Order List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="shop-managers-list">Create Shop Manager</a>
      </li>
      <!-- will hide when logged in -->

      <?php
      if(isset($_SESSION['logged_in'])) { 
        
      ?>
      <li class="nav-item">
        <a id="logout" class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php } else { ?>
      <!-- will hide when logged out -->
      <li class="nav-item">
        <a id="login" class="nav-link" href="login-view">Login</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
