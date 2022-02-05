<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if (!isset($_SESSION['username'])){
        echo'
      <h2>Login</h2>
      <p>Please log in below.</p>
      <form method="POST">
                                 <input name="username" type="text" placeholder="Username">
                                     <input name="password" type="password" placeholder="Password">
                                     <button type="submit">Login</button>
                             </form>';
                  include 'db.php';
                  $conn = OpenCon();

                  if (!isset( $_REQUEST['username']) && !isset( $_REQUEST['password'])){
                    echo('<p>Please enter username and password</p>');
                  }
                  if (isset( $_REQUEST['username']) && isset( $_REQUEST['password'])){
                  // Preparing the SQL statement 
                  if ($stmt = $conn->prepare('SELECT Username, Password FROM users WHERE Username = ?')) {
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
                           if ($username == 'webadmin'){
                             $_SESSION['usertype'] = 'admin';
                           } else{
                             $_SESSION['usertype']= 'user';
                           }
                           echo "<h3>You are now logged in.</h3>";
                          die("<p><a href='continue.php'>Click here to continue!</a></p>");
	                                      } else {
		                                        // Incorrect password
		                                          echo '<p>Incorrect username and/or password!</p>';
                                            }
                                          }  else {
	                                             // Incorrect username
	                                              echo '<p>Incorrect username and/or password!</p>';
                                              }
                                              $stmt->close();
                                          }}}
      if (isset($_SESSION['username'])){
        echo'<h3>You are already logged in.</h3>';}
      ?>
  </body>
  <?php include("footer.php"); ?>
</html>
