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
      <h2>Upload your Order Form below</h2>
      <p>Only CSV and Docx files are accepted.</p>
      <!--Upload portal will go here
        Attack will be something like:
        SELECT * FROM `products` WHERE `product_id` = 1  union select 1,'','','' INTO OUTFILE '/home/robert/Documents/dev_env_website/vulnerable_webapp/html/one.php'#
        turn off secure file privs
    -->
      <h2>Need assistance ordering?</h2>
      <p>Let us know in the "Leave A Review" page after logging in with your store account email address.
      and we will reach out to you as soon as possible.</p>
    </div>
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
