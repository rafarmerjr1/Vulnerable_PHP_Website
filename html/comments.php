<html>
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
      <h2>Leave a Review below!</h2>
      <p>Did you enjoy our products?  Please let us know about your experience shopping with Custom Clothes.</p>
      <form class="mb-4" method="POST">
                             <div class="input-group">
                                 <input name="comment" type="text" class="form-control" placeholder="My comment" aria-label="My comment" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                     <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon2">
                                     <button class="form-control btn-outline-primary" type="submit">Submit Comment</button>
                                 </div>
                                 </div>
                             </form>

      <?php
                  include 'db.php';
                  $conn = OpenCon();
                  //Super vulnerable XSS #1:
                  if (isset( $_REQUEST['name']) && isset( $_REQUEST['comment'])){
                      $conn->query("INSERT INTO comments (name, usercomment) values ('" . $_REQUEST['name'] . "','" . $_REQUEST['comment']. "' )");
                      echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Added comment :)

                  </div>';
                  }
                  if( $res = $conn->query("SELECT * FROM comments where shown = True") ) {
                      while( $row = $res->fetch_assoc() ) {
                          echo '
                          <br>
                          <div class="d-flex mb-4">
                              <div class="d-flex">
                              <div class="flex-shrink-0"><img class="rounded-circle" src="resources/img/head_small.png" alt="..." /></div>
                              <div class="ms-3">
                                  <div class="fw-bold">' . $row["name"] .' </div>
                                  '. $row["usercomment"] .'
                              </div>
                          </div>
                          </div>
                          ';
                      }
                  } ?>
      <h2>Unsatisfied with your purchase?</h2>
      <p>Let us know in the comment section above after logging in with your store account email address.</p>
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

  <?php include("footer.html"); ?>
</html>
