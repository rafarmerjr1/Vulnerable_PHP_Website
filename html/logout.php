<html>
<link href="resources/css/style.css" rel="stylesheet" type="text/css" />
<?php include("header.html"); ?>

<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: index.php');
?>

<?php include("footer.html"); ?>
</html>
