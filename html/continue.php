<?php include("header.php"); ?>
<body>
<?php //continue.php
session_start();
if (isset( $_SESSION['username']) && isset( $_SESSION['password'])){
  $username = ($_SESSION['username']);  //Left insecure for XSS in username
  echo "<h3>Welcome back $username </h3><br>";
}
if ($_SESSION['usertype'] === 'admin') {
  echo "<p>Please access your <a href=\"admin_page.php\"> admin portal </a> to continue.</p>";
}
else { echo "<p>Please <a href='login.php'> click here</a> to log in.</p>";}
?>
</div>
<?php include("footer.php"); ?>
