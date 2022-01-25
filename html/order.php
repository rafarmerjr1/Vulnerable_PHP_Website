<?php include("header.php");?>
<body>
  <?php
  session_start();
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
      if ((isset($_REQUEST["name"])) && (isset($_REQUEST["address"])) && (isset($_REQUEST["email"])) && (isset($_REQUEST["item"]))){
       require_once('xml_build.php');
       global $name, $addr, $email, $item;
       $name = $_REQUEST["name"];
       $addr = $_REQUEST["address"];
       $email= $_REQUEST["email"];
       $item = $_REQUEST["item"];
       make_xml($name,$addr,$email,$item);
}
} // ends the "if logged in" logic
if (!isset($_SESSION['username'])){
  echo '<h4>You must <a href=login.php>log in</a> to use this tool.</h4>';
}
  ?>
</body>
<?php include("footer.php");?>
