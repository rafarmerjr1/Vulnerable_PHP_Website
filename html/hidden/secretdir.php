<?php
//add isAdmin check
function list_dir(){
$root = getcwd();
echo $root;
$a = scandir($root);
foreach ($a as $x){
  echo '<li>';
  echo ''.$x.'';
  echo '</li>';
  //echo nl2br("\r\n");
}
}
?>
