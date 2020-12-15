<?php
 
  $db = mysqli_connect("localhost", "root", "", "login");

 
  $msg = "";

  if (isset($_POST['upload'])) {
  
  	$image = $_FILES['image']['name'];
  
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  
  	$target = "images/".basename($image);
      $name = $_SESSION['name'];
  	$sql = "INSERT INTO post (username,image, image_text) VALUES ('$name','$image','$image_text')";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
         
  	}else{
  		$msg = "Failed to upload image";
      }
     
  }
  
  $result = mysqli_query($db, "SELECT * FROM post");
  
?>
