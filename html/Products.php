
<link href="resources/css/style.css" rel="stylesheet" type="text/css" />
<?php include("header.html"); ?>
<body>
<div id="wrap">
  <div id="top">
    <h2><a href='index.php'>Custom Clothes</a></h2>
    <div id="menu">
      <ul>
        <!--<li><a href="index.php" class="current">Home</a></li> -->
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
      <h2>Products!</h2>
      <p>Available Products listed below.</p>
      <p>Please remember we are a custom shop and can only keep a few items in stock at a time.</p>
      <?php
      session_start();
      if (isset($_SESSION['username'])) {
      echo'
      <form class="mb-4" method="POST">
                             <div class="input-group">
                                 <input name="product_id" type="text" class="form-control" placeholder="product_id goes here" aria-label="product_id" aria-describedby="basic-addon2">
                                     <button class="form-control btn-outline-primary" type="submit">Search for Product</button>
                                 </div>
                             </form>';
                  include 'db.php';
                  $conn = OpenCon();
                  //:
                  if (!isset( $_REQUEST['product_id'] )){
                    echo "Enter a product ID.  Format 001";
                  }
                  if (isset( $_REQUEST['product_id'] )){
                    $product_id=$_REQUEST['product_id'];
                    $query = "SELECT * FROM products where product_id = $product_id";
                    if ($res = $conn->query($query)){
                    while($obj = $res->fetch_array()){  //or fetch_object?
                      print_r($obj);
                    }}
                    elseif($conn->error){
                      print_r($conn->error);
                      print_r($query);
                    }}
                }
                //SELECT * FROM `products` WHERE `product_id` = 1 OR 1=1;
                // SELECT * FROM `products` WHERE `product_id` = 1 UNION SELECT NULL, `Username`,`Password` ,NULL FROM `users` WHERE `Username` = "webadmin"
      if (!isset($_SESSION['username'])){
        echo "<h2>You must <a href=login.php>LOG IN </a> to use this tool.</h2>";
      }
                ?>
      <h2>Need assistance ordering?</h2>
      <p>Let us know in the "Leave A Review" page after logging in with your store account email address.
      and we will reach out to you as soon as possible.</p>
    </div>
  <div id="right">
      <div class="box">
        <h2>Item out of stock?</h2>
        <p>Submit a pre-order form and we will contact you when it is available. </p>
        <h2>Pre-Order Form</h2>
        <p>Downloadable form coming soon</p>
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <?php include("footer.html"); ?>
