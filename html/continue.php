<html>
<link href="resources/css/style.css" rel="stylesheet" type="text/css" />
<?php include("header.html"); ?>
<body>
<div id="wrap">
  <div id="top">
    <h2><a href='index.php'>Custom Clothes</a></h2>
    <div id="menu">
      <ul>
        <li><a href="comments.php">Leave A Review!</a></li>
        <li><a href="upload.php">Upload Order Form</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a href="login.php">Login</a></la>
        <li><a href="logout.php">Logout</a></la>
      </ul>
    </div>
  </div>

<?php //continue.php
session_start();
if (isset( $_SESSION['username']) && isset( $_SESSION['password'])){
  $username = ($_SESSION['username']);  //Left insecure for XSS in username
  echo "<h2>Welcome back $username </h2><br>";
}
else { echo "Please <a href='login.php'> click here</a> to log in.";}
?>
</div>
