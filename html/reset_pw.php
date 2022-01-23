<?php include("header.php"); ?>
<main>
<body>
  <h2>Password Reset</h2>
  <?php
  //check authentication:
  include 'db.php';
  session_start();
  if (isset($_SESSION['username']) && isset( $_SESSION['password'])) {
    $username = ($_SESSION['username']);  //Left insecure for XSS in username?
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
       // Bind parameters (s = string)
        $stmt->bind_param('s', $_SESSION['username']);
         $stmt->execute();
          // Store the result so we can check if the account exists in the database.
         $stmt->store_result();
       }
    if ($stmt->num_rows > 0) {
       $stmt->bind_result($username, $password);
        $stmt->fetch();
        echo 'Initial Connection made.';
         // Account exists, now we change the password.
           if (($_POST['new_password'] == $_POST['new_password2']) && ($_POST['old_password'] == $password)){
             $conn = OpenCon();
             echo 'checked passwords';
             echo ''.$password.'';
             $username_entered = $_POST['Username'];  //allow to change other users
             $new_password = $_POST['new_password'];
             echo ''.$new_password.''.$username_entered.'';
             $change="UPDATE users SET Password = '$new_password' where Username = '$username_entered'";
             echo ''.$change.'';
             if ($run = $conn->query($change)){
             echo 'Running Query';
             print_r($run);
           }else{
             echo ''.print_r($conn->error,true).''; }
    }
  }}
if (!isset($_SESSION['username']) || !isset( $_SESSION['password'])) {
  echo'
  <p> Please <a href="login.php">log in</a> to reset password.</p>';
}
  ?>
</body>
</main>
<?php include("footer.php"); ?>
