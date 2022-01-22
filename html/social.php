<?php include("header.php"); ?>
<main>
<body>
  <h3>Gallery</h3>
  <p>We haven't linked our social media accounts yet.
  But please upload images of yourself wearing our products here!</p>
  <br>

<form method="POST" enctype="multipart/form-data">
  <p>Upload your own photo here!</p>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <button type="submit" name="submit">Upload!</button>
</form>
<?php
//Image upload functionality
$target_dir = "/resources/user_images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  print($imageFileType);
  print($target_dir);
  print($target_file);
  //Check filetype
}

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
    $uploadOk = 0;
  }
  if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
  || $imageFileType == "gif" ) {
    $uploadOk = 1;
  }
  //check if passed upload screening
  if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
}
  if ($uploadOK == 1) {
    print("words");
      //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file){
      //  echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
}
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
    echo '<img src="'.$image_path.'">';
  }
}
?>
<?php include("footer.php"); ?>
</body>
</main>
