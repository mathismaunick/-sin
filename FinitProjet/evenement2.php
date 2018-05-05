<?php

	include ('Co.php');
	$Texte=$_POST['Texte'];
    $DateEvent= $_POST['DateEvent'];
    $lieu= $_POST['lieu'];
    $type=1;
    $date = new DateTime();
    $datePublication=$date->format('Y-m-d H:i:s');

    //On ajoute une publication
	$req = $bdd->prepare('INSERT INTO publication (idMembre,type,datePublication) VALUES(:idMembre,:type,:datePublication)');

	$req->execute(array(
		'idMembre' => $id,
		'type' => $type,
		'datePublication' => $datePublication
	  ));

	$reponse = $bdd->query('SELECT idPublication FROM publication');
	while ($donnees = $reponse->fetch())
	{
		$idPublication=$donnees['idPublication'];
	}

    //On ajoute un evenement 
	$requete = $bdd->prepare('INSERT INTO evenement (Texte,DateEvent,lieu,idPublication) VALUES(:Texte,:DateEvent,:lieu,:idPublication)');

	$requete->execute(array(
	  'Texte' => $Texte,
  	  'DateEvent' => $DateEvent,
  	  'lieu' => $lieu,
  	  'idPublication' => $idPublication
	  ));

	header('Location: Accueil.php');
	exit();

	?>