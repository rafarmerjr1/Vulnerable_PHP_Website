<?php include("header.php"); ?>
<main>
<body>
  <h3>Gallery</h3>
  <p>We haven't linked our social media accounts yet.
  But check out images our products here!</p>
  <br>
<?php
//check authentication:
session_start();
if (isset( $_SESSION['username'])) {
  echo'
<form method="POST" enctype="multipart/form-data">
  <p>Hi webadmin,
  upload photos here:</p>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <button type="submit" name="submit">Upload!</button>
</form>';

//Image upload functionality - SVG for XXe?
$root = getcwd();
$target_dir = $root."/resources/user_images/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir .($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));  //should check only the end extension
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]); //can check filesize later
  //Check filetype
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "svg") {
    echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
    $uploadOk = 0;
  }
  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
  || $imageFileType == "gif" || $imageFileType == "svg") {
    $uploadOk = 1;
  }
  //check if passed upload screening
  if ($uploadOk === 0) {
  echo "<p>Sorry, your file was not uploaded.</p>";
}
  if ($uploadOk === 1) {
    //echo "<p>I try</p>";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
      echo "<p>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";}
}}
}
if (!isset($_SESSION['username'])){
  echo'
  <p> Please <a href=login.php>log in</a> to upload images.</p>';
}

// Grab and display photographs:
$root = getcwd();
$photo_folder = $root.'/resources/user_images/';
$photo_relative = '/resources/user_images/';
$images = scandir($photo_folder);
/*print($root);
echo '<br>';
print($photo_folder);
echo '<br>'; */
foreach ($images as $image){
  $image_path = $photo_relative.$image;
  if ($image!='.' && $image!='..'){
    echo '<a href="'.$image_path.'"><img src="'.$image_path.'"></a>';
  }
}
?>
<?php include("footer.php"); ?>
</body>
</main>
