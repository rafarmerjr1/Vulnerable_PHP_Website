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
  /*
  //list dir
  if (isset($_REQUEST['dir'])){
    include 'resources/secretdir.php';
    echo '<ul>';
    list_dir();
    echo '</ul>';
  }
  */
  //list xml orders - make a button?
echo '
  <h4><u>Orders page</u></h4>
  <p>Review orders here:</p>
  <form method ="POST"><button type ="submit" name="orders">Review Orders</button></form>';
if (isset($_REQUEST['orders'])){
    header("Location:xml_read.php");
  }

  //list photos
echo '
<h4><u>Image tools</u></h4>
<p>View user images here:</p>
<form method ="POST"><button type ="submit" name="images">Photo List</button></form>';
  if (isset($_REQUEST['images'])){
    include 'resources/secretdir.php';
    echo '<ul>';
    list_photos();
    echo '</ul>';
  }
echo'
<form method="POST">
<p>
<label>Delete or Recover user-submitted image:</label>
<input name="select_image" type="text" placeholder="image filename"> <br>
<label><input name="type" type="radio" value="delete"/>Delete Image</label> <br>
<label><input name="type" type="radio" value="recover"/>Recover Image</label> <br>
<label><input name="type" type="radio" value="rename"/>Rename Image</label> <br>
<input name="new_name" type="text" placeholder="new image filename"> <br>
<i> Warning: This change may be irreversible!</i><br>
<button type ="submit">Make Change</button>
</p>
</form>
';
//delete photo
if (isset($_REQUEST['select_image']) && ($_POST['type'] == "delete")){
  $image_name=htmlspecialchars($_REQUEST['select_image']);
  // No ../ are allowed and something has to be requested
  if( ($image_name == '') || (strpos($image_name, '../') !== false) || (strpos($image_name, '/') !== false)) {
    exit('Invalid Request');}
  $root = getcwd();
  $photo = $root.'/resources/user_images/'.$image_name;
  $trash_folder = $root.'/resources/deleted_images/';
  $trash_file = $trash_folder.$image_name;
  if (rename($photo, $trash_file)){
    echo "<p>The file ". $image_name. " has been moved to the trash folder.</p>";}
    else {echo '<p>An error has occurred.</p>';}
  }
//recover photo
if (isset($_REQUEST['select_image']) && ($_POST['type'] == "recover")){
  $image_name=htmlspecialchars($_REQUEST['select_image']);
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
//rename image
if (isset($_REQUEST['select_image']) && ($_POST['type'] == "rename")){
  $image_name=htmlspecialchars($_REQUEST['select_image']);
  $root = getcwd();
  $photo = $root.'/resources/user_images/'.$image_name;
  $new_name = htmlspecialchars($_REQUEST['new_name']);
  $new_photo = $root.'/resources/user_images/'.$new_name;
  if (rename($photo,$new_photo)){
    echo "<p>The file ".$image_name. " has been renamed to ".$new_name.".</p>";}
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
