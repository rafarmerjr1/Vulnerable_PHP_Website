
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["usertype"]);
unset($_COOKIE['PHPSESSID']);
session_destroy();
header("Location:login.php");
?>
