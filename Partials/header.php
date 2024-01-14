<header>
<?php
if(isset($_SESSION['username'])) {
    switch ($_SESSION['access_level']) {
      case 1: 
        $acLevel ="Admin";
        break;
      default:
      case 2:
        $acLevel = "Shop Manager";
    }
  

?>
<div class="d-flex justify-content-end">
  <div class="px-5 py-2">
    <h5>Welcome, <?php echo "{$_SESSION['fname']} {$_SESSION['lname']}";?></h5>
    <p class="m-0"><?php echo "{$acLevel}";?></p>
  </div>
</div>

<?php

} else {
?>
<div class="d-flex justify-content-end">
  <div class="px-5 py-2">
    <h5>User not Logged In</h5>
    <p class="m-0">Please Log In</p>
  </div>
</div>
<?php
}
?>
</header>