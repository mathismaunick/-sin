<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "piscine");

  // Initialize message variable

  $idPhoto=$_POST['supprimer'];
  $idPubli=$_POST['suppr'];

  #	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	$sql = "DELETE FROM `video` WHERE idVideo='$idPhoto'";
    $sql = "DELETE FROM `publication` WHERE idPublication='$idPubli'";
  	// execute query
  	mysqli_query($db, $sql);


header('Location:Accueil.php');
?>
