<?php include("header.php"); ?>
<body>
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
                } ?>
      <br>
      <table>
      <thead>
      <tr>
      <th>Username</th>
      <th>Comment</th>
      </tr>
      </thead>
      <tbody>
            <?php      if( $res = $conn->query("SELECT * FROM comments where shown = True") ) {
                      while( $row = $res->fetch_assoc() ) {
                          echo '
                                  <tr><td>' . $row["name"] .' </td>
                                <td>
                                 '. $row["usercomment"] .'
                              </td>
                          ';
                      }
                  } ?>
      </tbody>
      </table>
      
      <h2>Unsatisfied with your purchase?</h2>
      <p>Let us know in the comment section above after logging in with your store account email address.</p>
        <h2>Coming Soon!</h2>
        <p>I've always liked clothes a lot, and wanted to share my passion. </p>
        <h2>Write to us</h2>
        <p>Contact info coming soon</p>
  <?php include("footer.php"); ?>
</html>
