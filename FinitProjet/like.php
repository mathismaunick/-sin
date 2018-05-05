<?php

	include ('Accueil.php');

	$idPublication=$_POST['like'];
	$date = new DateTime();
    $datePublication=$date->format('Y-m-d H:i:s');

	$req = $bdd->prepare('INSERT INTO liker (idPublication, idLikeur,Heure) VALUES(:idPublication,:idLikeur,:Heure)');
	$req->execute(array(
	  'idPublication' => $idPublication,
  	  'idLikeur' => $id,
  	  'Heure' => $datePublication
	  ));

	$reponse=$bdd->query('SELECT * FROM publication WHERE idPublication =\'' . $idPublication . '\'');

	$new= $reponse->fetch();

	$nbLike=0;
	$nbLike=$new['nbLike']+1;

	//On modifi les donnees
	$req = $bdd->prepare('UPDATE publication SET nbLike = :nbLike WHERE idPublication =\'' . $idPublication . '\'');
	$req->execute(array(
	'nbLike' => $nbLike,
	));

	header('Location: Accueil.php');
	

?>