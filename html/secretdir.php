<?php
//add isAdmin check
$root = getcwd();
echo $root;
$a = scandir($root);
foreach ($a as $x){
  print($x);
  echo nl2br("\r\n");
}
?>
