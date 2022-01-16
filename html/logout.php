
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_COOKIE['PHPSESSID']);
header("Location:login.php");
?>
