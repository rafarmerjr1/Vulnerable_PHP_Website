<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if ($_SESSION['usertype'] == 'admin'){
        echo'
      <h4><u>Enter form information here.</u></h4>
      <p>Use this tool to check item stock:</p>
      <!--XML Upload portal will go here  -->
      <h4><u>Admin notes</u></h4>
      <p>View File structure <a href=secretdir.php> here</a></p>
      </div>';
    } else {
       echo'
       <h4><u> Restricted page. User "webadmin" only.</u></h4>
    </div>';
  }
  ?>
  <?php include("footer.php"); ?>
