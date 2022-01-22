<?php include("header.php"); ?>
<body>
<?php //continue.php
session_start();
if (isset( $_SESSION['username']) && isset( $_SESSION['password'])){
  $username = ($_SESSION['username']);  //Left insecure for XSS in username
  echo "<h2>Welcome back $username </h2><br>";
}
else { echo "Please <a href='login.php'> click here</a> to log in.";}
?>
</div>
<?php include("footer.php"); ?>
