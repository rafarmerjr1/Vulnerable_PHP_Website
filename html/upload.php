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
  <div id="content">
    <div id="left">
      <?php
      if ($_SESSION['usertype']==1){
        echo'
      <h2>Enter form information here.</h2>
      <p>Use this tool to check item stock:</p>
      <!--XML Upload portal will go here  -->
      <h2>Admin notes</h2>
      <p>View File structure <a href=secretdir.php> here :</a></p>
      </div>';
    }
     if ($_SESSION['usertype']!=1){
       echo'
       <h2> Restricted page. Admin only.</h2>
    </div>';
  }
  ?>
   <div id="right">
      <div class="box">
        <h2>Coming Soon!</h2>
        <p>I've always liked clothes a lot, and wanted to share my passion. </p>
        <h2>Write to us</h2>
        <p>Contact info coming soon</p>
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <?php include("footer.html"); ?>
</html>
