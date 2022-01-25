<?php
//add isAdmin check
function list_dir(){
$root = getcwd();
echo $root;
echo '<br>';
$a = scandir($root);
foreach ($a as $x){
  if (is_file($x)){
  echo '<li>';
  echo ''.$x.'';
  echo '</li>';
}}
}
function list_photos(){
$root = getcwd();
$photo_dir = $root.'/resources/user_images';
echo $photo_dir;
echo '<br>';
$a = scandir($photo_dir);
foreach ($a as $x){
  if (!is_dir($x)){
  echo '<li>';
  echo ''.$x.'';
  echo '</li>';
}}
}
function list_orders(){
$root = getcwd();
$order_dir = $root.'/resources/orders';
echo $order_dir;
echo '<br>';
$a = scandir($order_dir);
foreach ($a as $x){
  if (!is_dir($x)){
  echo '<li>';
  echo ''.$x.'';
  echo '</li>';
}}
}
function list_xml(){
$root = getcwd()."/resources/orders";
$a = scandir($root);
global $x;
echo '<form method="POST">';
foreach ($a as $x){
  if (($x != '.') && ($x != '..')){
  echo "<button name=\"$x\">$x</button><br>";
}}
echo '</form>';
if (isset($_REQUEST["$x"])){
  echo "<p>$x</p>"
}
}
?>
