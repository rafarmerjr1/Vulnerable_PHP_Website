<?php include("header.php"); ?>
<body>
<?php

function list_xml(){
$root = getcwd()."/resources/orders";
$a = scandir($root);
global $x;
echo '<table>
<thead>
<tr>
<th>Filename</th>
</thead>
<tbody>
';
foreach ($a as $x){
  if (($x != '.') && ($x != '..')){
  echo "
  <tr>
  <td>$x</td>
  </tr>";
}}
echo '
</tr>
</tbody>
</table>';
}

//call functions
list_xml();

echo'
<form method="POST">
<p>
<label>View Order:</label>
<input name="order" type="text" placeholder="Order Filename"> <br>
<button type ="submit">Review Order</button>
</p>
</form>';

if (isset($_REQUEST['order'])){
  global $order_name;
  $order_name = ($_REQUEST['order']);
  header("Location:view_order.php?order=$order_name");
}
 ?>
</body>
<?php include("footer.php"); ?>
