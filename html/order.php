<?php include("header.php");?>
<body>
  <?php
  session_start();

//form method
if (isset($_SESSION['username'])) {
  echo'
  <p><b>Place order below:</b></p>
  <form method="POST">
  <p>
    <label>Full Name</label><br>
    <input type="text" name="name">
    </p>

    <p>
    <label>Address</label><br>
    <input type="text" name="address">
    </p>

    <p>
    <label>Email</label><br>
    <input type="text" name="email">
    </p>

    <p>
    <select id="item" name="item">
    <option selected="selected" value="1">Item</option>
    <option value="Raw_Denim_Jeans">Raw Denim Jeans</option>
    <option value="Suspenders">Suspenders</option>
    </select>
    </br>
    <button type ="submit">Place Order</button>
    </p>
    </form>
      ';

      if ((isset($_REQUEST["name"])) && (isset($_REQUEST["address"])) && (isset($_REQUEST["email"])) && (isset($_REQUEST["item"]))){
       require_once('xml_build.php');
       global $name, $addr, $email, $item;
       $name = $_REQUEST["name"];
       $addr = $_REQUEST["address"];
       $email= $_REQUEST["email"];
       $item = $_REQUEST["item"];
       make_xml($name,$addr,$email,$item);
}

//upload method
  echo'
  <p><b>Or, Upload your own order form below.</b></p>
  <p> Your order form should be formatted like this:';

    $example=<<<EXMPL
    <?xml version="1.0" encoding="utf-8"?>
    <Order>
      <order order_num="4">
        <Name>Brandon</Name>
        <Address>123 Ashley avenue</Address>
        <Email>BrandonRocks@email.com</Email>
        <Item>Raw_Denim_Jeans</Item>
      </order>
    </Order>
    EXMPL;

  echo "<p><pre>".htmlspecialchars($example)."</pre></p>";

  echo'
  <form method ="POST" enctype="multipart/form-data">
  <p>Order form</p><br>
  <input type="file" name="orderToUpload" id="orderToUpload">
  <button type="submit" name="submit_order">Submit Order</button><br>
  </form>
  </p>';

  if ((isset($_POST["submit_order"]))){
    $root_dir = getcwd()."/";
    $orders_dir = $root_dir."/resources/orders/";
    $filename = $orders_dir.($_FILES["orderToUpload"]["name"]);
    $orderFileType = strtolower(pathinfo($_FILES["orderToUpload"]["name"],PATHINFO_EXTENSION));
    if($orderFileType != "xml"){
      echo "<p>Sorry, only xml files allowed</p>";}
      if($orderFileType == "xml"){
        if (move_uploaded_file($_FILES["orderToUpload"]["tmp_name"], $filename)){
          echo "<p>The order ". basename($_FILES["orderToUpload"]["name"]). " has been uploaded.</p>";
        }
      }
    }

} // ends the "if logged in" logic
if (!isset($_SESSION['username'])){
  echo '<h4>You must <a href=login.php>log in</a> to use this tool.</h4>';
}
  ?>
</body>
<?php include("footer.php");?>
