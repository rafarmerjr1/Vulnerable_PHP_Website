<?php include("header.php"); ?>
<body>
<?php

//probably won't ever use this function.  It's messy.
/*function list_xml(){
$root = getcwd()."/resources/orders";
$a = scandir($root);
global $x;
global $buttons;
$buttons =array();
$counter = -1;
echo '<form method="POST">';
foreach ($a as $x){
  if (($x != '.') && ($x != '..')){
  $counter++;
  echo "<button name=\"$counter\">$x</button><br>";
  array_push($buttons, $x);
}}
echo '</form>';
while ($counter > -1){
  echo $buttons[$counter];
  $counter -= 1;
}
} */

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
  header("Location:view_order.php");
}
 ?>
</body>
<?php include("footer.php"); ?>
