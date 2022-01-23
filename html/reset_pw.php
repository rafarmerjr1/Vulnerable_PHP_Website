<?php include("header.php"); ?>
<main>
<body>

  <?php
  //check authentication:
  session_start();
  if (isset($_SESSION['username']) && isset( $_SESSION['password'])) {
    include 'db.php';
    $username = ($_SESSION['username']);  //Left insecure for XSS in username
    echo "<h3>Welcome back $username </h3><br>";
    echo '<p> Change your password below:</p>
    <form method="POST">
    <input name="Username" type="password" placeholder="Enter Username">
    <input name="old_password" type="password" placeholder="Enter password">
    <input name="new_password" type="password" placeholder="Enter new password">
    <input name="new_password2" type="password" placeholder="Enter new password">
    <button type="submit">Change Password</button>
    </form>
    ';
  }
    if ($stmt = $conn->prepare('SELECT Username, Password FROM users WHERE Username = ?')) {
       // Bind parameters (s = string)
        $stmt->bind_param('s', $_SESSION['username']);
         $stmt->execute();
          // Store the result so we can check if the account exists in the database.
         $stmt->store_result();
       }
    if ($stmt->num_rows > 0) {
       $stmt->bind_result($username, $password);
        $stmt->fetch();
         // Account exists, now we change the password.
           if (($_REQUEST['new_password'] == $_REQUEST['new_password2']) && ($_REQUEST['old_password'] == $password)){
             $_REQUEST['Username']=$username;  //allow to change other users
             $_SESSION['password']=$password;
             $_REQUEST['new_password'] = $new_password;
             $change=$conn->prepare("UPDATE users SET Password = $new_password WHERE Username= $username");
            // $change->bindParam(':password',$new_password);
             if($change->execute()){
               echo '
               <p>Changed</p>';
    }else{
      echo'
      <p>Error</p>';
    }
    }
  }

  ?>
</body>
</main>
<?php include("footer.php"); ?>
