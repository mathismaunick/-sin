<?php

$db = mysqli_connect("localhost", "root", "", "piscine");
$idIm=$_POST['changer'];
$image_text =$_POST['image_text'];



    $sql = "UPDATE photos SET Description = '$image_text' WHERE idPhoto='$idIm'";
    // execute query
    mysqli_query($db, $sql);
    header('Location:Accueil.php');

 ?>
