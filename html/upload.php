<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if ($_SESSION['usertype'] == 'admin'){
        echo'
      <h4><u>Enter form information here.</u></h4>
      <p>Use this tool to check item stock:
      Can be used as CSRF, malicious file upload or RFI?</p>
      <h4><u>Admin notes</u></h4>
      <p>View File structure here:</p>
      <form method ="POST"><button type ="submit" name="dir">Directory List</button></form>
      ';
    } else {
       echo'
       <h4><u> Restricted page. User "webadmin" only.</u></h4>
    ';
  }

  if (isset($_REQUEST['dir'])){
    include 'hidden/secretdir.php';
    echo '<ul>';
    list_dir();
    echo '</ul>';
  }

  ?>
  <?php include("footer.php"); ?>
