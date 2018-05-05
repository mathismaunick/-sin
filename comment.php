<?php

	include ('Accueil.php');
	
	$idPubli=$_POST['commentaire'];
	$Description=$_POST['Description'];
	$date = new DateTime();
    $datePublication=$date->format('Y-m-d H:i:s');

	$req = $bdd->prepare('INSERT INTO commentaire (idPubli, idComAmi,Description,Heure) VALUES(:idPubli,:idComAmi,:Description,:Heure)');
	$req->execute(array(
	  'idPubli' => $idPubli,
  	  'idComAmi' => $id,
  	  'Description' => $Description,
  	  'Heure' => $datePublication
	  ));

	header('Location: Accueil.php');
	
?>