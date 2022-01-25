<?php include("header.php"); ?>
<body>
<?php

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
}

//call functions
list_xml();

 ?>
</body>
<?php include("footer.php"); ?>
