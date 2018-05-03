<?php

	include ('Accueil.php');

	$like = $bdd->query('SELECT * FROM liker');
	$idPublication=$_POST['like'];

	echo $idPublication;

	while ($donnees = $like->fetch())
	{
		echo $donnees['idPublication'];
	}

	$req = $bdd->prepare('INSERT INTO liker (idPublication, idLikeur) VALUES(:idPublication,:idLikeur)');
	$req->execute(array(
	  'idPublication' => $idPublication,
  	  'idLikeur' => $id
	  ));

	header('Location: Accueil.php');
	exit();

?>