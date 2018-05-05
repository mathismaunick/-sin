<?php

$db = mysqli_connect("localhost", "root", "", "piscine");
$idVdo=$_POST['changer'];
	$video_text =$_POST['image_text'];



    $sql = "UPDATE video SET Description = '$video_text' WHERE idVideo='$idVdo'";
    // execute query
    mysqli_query($db, $sql);
    header('Location:Accueil.php');

 ?>
