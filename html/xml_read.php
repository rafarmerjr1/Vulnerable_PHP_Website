<?php include("header.php"); ?>
<body>
<?php

//probably won't ever use this function.  It's messy.
function list_xml(){
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
}



//call functions
list_xml();


 ?>
</body>
<?php include("footer.php"); ?>
