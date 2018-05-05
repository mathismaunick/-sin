<?php
include ('Co.php');

 $Sexe=$_POST["Sexe"];
 $Ecole=$_POST["Ecole"];
 $Age=$_POST["Age"];
 $Ville=$_POST["Ville"];

//On modifi les donnees
$req = $bdd->prepare("UPDATE info SET Sexe = :Sexe,Ecole=:Ecole,Age= :Age,Ville=:Ville WHERE idMembre ='$id'");
$req->execute(array(
	'Sexe' => $Sexe,
	'Ecole' => $Ecole,
	'Age' => $Age,
	'Ville' => $Ville
	));

header('Location:Vous.php')

?>