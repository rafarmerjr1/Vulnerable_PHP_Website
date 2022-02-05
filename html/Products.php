<html>
<?php include("header.php"); ?>
<body>
      <h2>Products!</h2>
      <p>Available Products query below.</p>
      <p>Please remember we are a custom shop and can only keep a few items in stock at a time.
      Search for Items by Item number.</p>
      <?php
      session_start();
      if (isset($_SESSION['username'])) {
      echo'
      <form method="POST">
          <input name="product_id" type="text" class="form-control" placeholder="product_id goes here" aria-label="product_id" aria-describedby="basic-addon2">
             <button class="form-control btn-outline-primary" type="submit">Search for Product</button>
                            </div>
                             </form>';
                  include 'db.php';
                  $conn = OpenCon();
                  //:
                  if (!isset( $_REQUEST['product_id'] )){
                    echo "<p><i>Enter a product ID.</i></p>";
                  } ?>
      <table>
      <thead>
      <tr>
      <th>Product ID</th>
      <th>Product Info</th>
      </tr>
      </thead>
      <tbody>
        <?php
                  if (isset( $_REQUEST['product_id'] )){
                    $product_id=$_REQUEST['product_id'];
                    $query = "SELECT * FROM products where product_id = $product_id";
                    if ($res = $conn->query($query)){
                    while($obj = $res->fetch_array()){
                      echo '
                              <tr><td>' . $_REQUEST['product_id'] .' </td>
                            <td>
                             '. print_r($obj,true) .'
                          </td>
                      ';

                    }}
                    elseif($conn->error){
                      echo '
                              <tr><td>' . $_REQUEST['product_id'] .' </td>
                            <td>
                             '. print_r($conn->error,true) .'
                          </td>
                      ';
                    }}
                }
              ?>
        </tbody>
      </table> <?php
      if (!isset($_SESSION['username'])){
        echo "<h4>You must <a href=login.php>log in</a> to use this tool.</h4>";
      }
                ?>
  <?php include("footer.php"); ?>
