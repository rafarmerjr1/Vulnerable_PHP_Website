<?php include("header.php"); ?>
<main>
<body>
  <h2>Password Reset</h2>
  <?php
  //check authentication:
  include 'db.php';
  session_start();
  if (isset($_SESSION['username']) && isset( $_SESSION['password'])) {
    $username = ($_SESSION['username']);
    echo "<h4>Welcome back $username </h4>";
    echo '<p> Change your password below:</p>
    <form method="POST">
    <input name="Username" type="text" placeholder="Enter Username">
    <input name="old_password" type="password" placeholder="Enter old password">
    <input name="new_password" type="password" placeholder="Enter new password">
    <input name="new_password2" type="password" placeholder="Enter new password">
    <button type="submit">Change Password</button>
    </form>
    ';
}
    if (isset($_POST['Username']) && isset( $_POST['new_password'])) {
    $conn = OpenCon();
    if ($stmt = $conn->prepare('SELECT Username, Password FROM users WHERE Username = ?')) {
        $stmt->bind_param('s', $_SESSION['username']);
         $stmt->execute();
          // Store the result so we can check if the account exists in the database.
         $stmt->store_result();
       }
    if ($stmt->num_rows > 0) {
       $stmt->bind_result($username, $password);
        $stmt->fetch();
           if (($_POST['new_password'] == $_POST['new_password2']) && (strcmp($_POST['old_password'],$password) == 0)){
             $conn = OpenCon();
             $username_entered = $_POST['Username'];
             $new_password = $_POST['new_password'];
             $change="UPDATE users SET Password = '$new_password' where Username = '$username_entered'";
             if ($run = $conn->query($change)){
             echo '<p>Password Changed!</p>';
           }else{
             echo 'Error resetting Password'; }
    }else{
      echo 'Passwords do not match, incorrect username, or incorrect password.';
    }
  }
}
if (!isset($_SESSION['username']) || !isset( $_SESSION['password'])) {
  echo'
  <p> Please <a href="login.php">log in</a> to reset password.</p>';
}
  ?>
</body>
</main>
<?php include("footer.php"); ?>
