<?php include("header.php"); ?>
<body>
      <?php
      if ($_SESSION['usertype']==1){
        echo'
      <h2>Enter form information here.</h2>
      <p>Use this tool to check item stock:</p>
      <!--XML Upload portal will go here  -->
      <h2>Admin notes</h2>
      <p>View File structure <a href=secretdir.php> here :</a></p>
      </div>';
    }
     if ($_SESSION['usertype']!=1){
       echo'
       <h2> Restricted page. Admin only.</h2>
    </div>';
  }
  ?>
        <h2>Coming Soon!</h2>
        <p>I've always liked clothes a lot, and wanted to share my passion. </p>
        <h2>Write to us</h2>
        <p>Contact info coming soon</p>
  <?php include("footer.php"); ?>
