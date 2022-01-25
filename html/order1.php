<?php include("header.php"); ?>
<body>
  <p>hello</p>
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
    <option value="1">Raw Denim Jeans</option>
    <option value="2">Suspenders</option>
    </select>
    </br>
    <button type ="submit">Place Order</button>
    </p>
    </form>
      ';
      if ((isset($_REQUEST["name"])) && (isset($_REQUEST["address"])) && (isset($_REQUEST["email"]))
    && (isset($_REQUEST["item"]))){
      echo '<p>words</p>';

}}
  ?>
</body>
<?php include("footer.php");?>
