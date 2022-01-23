<?php include("header.php"); ?>
<body>
      <?php
      session_start();
      if ($_SESSION['usertype'] == 'admin'){
        echo'
      <h4><u>Admin tools</u></h4>
      <p>View File structure here:</p>
      <form method ="POST"><button type ="submit" name="dir">Directory List</button></form>
      ';
  //list dir
  if (isset($_REQUEST['dir'])){
    include 'hidden/secretdir.php';
    echo '<ul>';
    list_dir();
    echo '</ul>';
  }
  //list photos
echo '
<p>View user images here:</p>
<form method ="POST"><button type ="submit" name="images">Photo List</button></form>';
  if (isset($_REQUEST['images'])){
    include 'hidden/secretdir.php';
    echo '<ul>';
    list_photos();
    echo '</ul>';
  }
//check if image file exists
echo '
<h4><u>Delete or modify user-uploaded images.</u></h4>
<p>Check if image exists here:</p>
<form method ="POST">
<input name="check_image" type="text" placeholder="image filename">
<button type ="submit">Choose image</button>
</form>';
if (isset($_REQUEST['check_image'])){
  $image_name=$_REQUEST['check_image'];
  $root = getcwd();
  $photo_dir = $root.'/resources/user_images';
  $a = scandir($photo_dir);
  foreach ($a as $x){
    if ($x == $image_name){
      echo '<p>Image: '.$image_name.' found!</p>';
}
}
}
echo'
<p>Modify or Delete user-submitted image:</p>
<form method="POST">
<input name="select_image" type="text" placeholder="image filename"> <br>
<label><input name="type" type="radio" value="delete"/>Delete Image</label> <br>
<label><input name="type" type="radio" value="modify"/>Modify Image</label> <br>
<label><input name="type" type="radio" value="recover"/>Recover Image</label> <br>
<button type ="submit">Make Change</button>
<p><i> Warning: This change may be irreversible!</i></p>
</form>
';
//delete photo
if (isset($_REQUEST['select_image']) && ($_POST['type'] == "delete")){
  $image_name=$_REQUEST['select_image'];
  $root = getcwd();
  $photo = $root.'/resources/user_images/'.$image_name;
  $trash_folder = $root.'/resources/deleted_images/';
  //echo '<p>'.$photo.'</p>';
  //echo '<p>'.$photo.'</p>';
  $trash_file = $trash_folder.$image_name;
  //echo '<p>'.$trash_file.'</p>';
  if (rename($photo, $trash_file)){
    echo "<p>The file ". $photo. " has been moved to the trash folder.</p>";}
    else {echo '<p>An error has occurred.</p>';}
  }
//recover photo
if (isset($_REQUEST['select_image']) && ($_POST['type'] == "recover")){
  $image_name=$_REQUEST['select_image'];
  $root = getcwd();
  $photo = $root.'/resources/user_images/'.$image_name;
  $trash_folder = $root.'/resources/deleted_images/';
  //echo '<p>'.$photo.'</p>';
  //echo '<p>'.$photo.'</p>';
  $trash_file = $trash_folder.$image_name;
  //echo '<p>'.$trash_file.'</p>';
  if (rename($trash_file, $photo)){
    echo "<p>The file ".$image_name. " has been recovered.</p>";}
    else {echo '<p>An error has occurred.</p>';
    }
  }

} else {
     echo'
     <h4><u> Restricted page. User "webadmin" only.</u></h4>
  ';
}
  ?>
  <?php include("footer.php"); ?>
