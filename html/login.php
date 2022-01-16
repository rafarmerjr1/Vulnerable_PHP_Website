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
      <h2>Login</h2>
      <p>Please log in below.</p>
      <form class="mb-4" method="POST">
                             <div class="input-group">
                                 <input name="username" type="text" class="form-control" placeholder="Username" aria-label="username" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                     <input name="password" type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon2">
                                     <button class="form-control btn-outline-primary" type="submit">Login</button>
                                  <!--   <p><input type="checkbox" name="remember">Remember me</p> -->
                                 </div>
                             </form>

      <?php
                  include 'db.php';
                  $conn = OpenCon();

                  if (!isset( $_REQUEST['username']) && !isset( $_REQUEST['password'])){
                    echo('Please enter username and password'); //doesn't print
                  }
                  // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
                  if ($stmt = $conn->prepare('SELECT Username, Password FROM users WHERE Username = ?')) {
	                   // Bind parameters (s = string)
	                    $stmt->bind_param('s', $_REQUEST['username']);
	                     $stmt->execute();
	                      // Store the result so we can check if the account exists in the database.
	                     $stmt->store_result();
                  if ($stmt->num_rows > 0) {
	                   $stmt->bind_result($username, $password);
	                    $stmt->fetch();
	                     // Account exists, now we verify the password.
	                       if ($_REQUEST['password'] === $password) {
                           //Session or Cookie setting goes here
                           session_start();
                           $_SESSION['username']=$username;
                           $_SESSION['password']=$password;
                           //setcookie ("username",$_POST["username"],time()+ 3600);
                           //setcookie ("password",$_POST["password"],time()+ 3600);
                           echo "You are now logged in.";
                          die("<h2><a href='continue.php'>Click here to continue!</a></h2>");
                          // can also send to continue.php to display user info
	                                      } else {
		                                        // Incorrect password
		                                          echo 'Incorrect username and/or password!';
                                            }
                                          }  else {
	                                             // Incorrect username
	                                              echo 'Incorrect username and/or password!';
                                              }
                                              $stmt->close();
                                          }
                                            ?>

      <h2>Need assistance ordering?</h2>
      <p>Let us know in the "Leave A Review" page after logging in with your store account email address.
      and we will reach out to you as soon as possible.</p>
    </div>
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
</html>
