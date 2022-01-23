<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if ($_SESSION['usertype'] == 'admin'){
        echo'
      <h4><u>Admin notes</u></h4>
      <p>View File structure here:</p>
      <form method ="POST"><button type ="submit" name="dir">Directory List</button></form>
      ';
  //list dir
  if (isset($_REQUEST['dir'])){
    include 'hidden/secretdir.php';
    echo '<ul>';
    list_dir();
    echo '</ul>';
  }
  //list photos
echo '
<p>View user images here:</p>
<form method ="POST"><button type ="submit" name="images">Photo List</button></form>';
  if (isset($_REQUEST['images'])){
    include 'hidden/secretdir.php';
    echo '<ul>';
    list_photos();
    echo '</ul>';
  }
// View order forms
echo '
<p>List Orders here:</p>
<form method ="POST"><button type ="submit" name="list_order">Order List</button></form>';
if (isset($_REQUEST['list_order'])){
  include 'hidden/secretdir.php';
  echo '<ul>';
  list_orders();
  echo '</ul>';
}
//Now write tool allo admin to enter ../user_images/file.svg to execute XXE
 /*
echo'
<p>View Order details here.  Enter filename:</p>
<form method ="POST">
<input name="order" type="text" placeholder="filename">
<button type ="submit" name="dir">Review Order</button></form>';
*/
} else {
     echo'
     <h4><u> Restricted page. User "webadmin" only.</u></h4>
  ';
}
  ?>
  <?php include("footer.php"); ?>
