<?php include("header.php");?>
<body>
  <?php
  session_start();
  /*
if (isset($_SESSION['username'])) {
  echo'
  <p>Place order below:</p>
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

      //Lets try this in-line
      if ((isset($_REQUEST["name"])) && (isset($_REQUEST["address"])) && (isset($_REQUEST["email"])) && (isset($_REQUEST["item"]))){
       require_once('xml_build.php');
       global $name, $addr, $email, $item;
       $name = $_REQUEST["name"];
       $addr = $_REQUEST["address"];
       $email= $_REQUEST["email"];
       $item = $_REQUEST["item"];
       make_xml($name,$addr,$email,$item);
} */
if (isset($_SESSION['username'])) {
  echo'
  <p>Upload your own order form below.</p>
  <p> Your order form should be formatted like this:
    <?xml version="1.0" encoding="utf-8"?>
    <Order>
      <order order_num="4">
        <Name>Brandon</Name>
        <Address>123 Ashley avenue</Address>
        <Email>BrandonRocks@email.com</Email>
        <Item>Raw_Denim_Jeans</Item>
      </order>
    </Order>
  <p>

  <p>
  <form method ="POST">
  <label>Order form</label><br>
  <textarea rows="15" name="order_form"></textarea><br>
  <label><Name of your order</label>
  <input type="file" name="order_name" id="orderToUpload">
  <button type="submit_order">Submit Order</button><br>
  </form>
  </p>
';
  if ((isset($_REQUEST["order_form"])) && (isset($_REQUEST["submit_order"])) && (isset($_REQUEST["order_name"]))){
    $root_dir = getcwd()."/";
    $orders_dir = $root_dir."/resources/orders/";
    $filename = $orders_dir.($_FILES["orderToUpload"]["name"]);
    $orderFileType = strtolower(pathinfo($_FILES["orderToUpload"]["name"],PATHINFO_EXTENSION));
    if($orderFileType != "xml"){
      echo "<p>Sorry, only xml files allowed</p>";
      if($orderFileType == "xml"){
        if (move_uploaded_file($_FILES["orderToUpload"]["tmp_name"], $filename)){
          echo "<p>The order ". basename($_FILES["orderToUpload"]["name"]). " has been uploaded.</p>";
        }
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
