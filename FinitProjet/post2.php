<?php

	include ('Co.php');

	$description=$_POST['description'];
    $type=4;
    $date = new DateTime();
    $datePublication=$date->format('Y-m-d H:i:s');

    //On ajoute une publication
	$req = $bdd->prepare('INSERT INTO publication (idMembre,type,datePublication) VALUES(:idMembre,:type,:datePublication)');

	$req->execute(array(
		'idMembre' => $id,
		'type' => $type,
		'datePublication'=> $datePublication
	  ));

	$reponse = $bdd->query('SELECT idPublication FROM publication');
	while ($donnees = $reponse->fetch())
	{
		$idPublication=$donnees['idPublication'];
	}

    //On ajoute un evenement 
	$requete = $bdd->prepare('INSERT INTO post (description,idPublication) VALUES(:description,:idPublication)');

	$requete->execute(array(
	  'description' => $description,
  	  'idPublication' => $idPublication
	  ));

	header('Location: Accueil.php');
	exit();

	?>