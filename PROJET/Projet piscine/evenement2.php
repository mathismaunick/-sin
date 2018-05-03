<?php

	include ('Co.php');
	$Texte=$_POST['Texte'];
    $DateEvent= $_POST['DateEvent'];
    $lieu= $_POST['lieu'];
    $idMembre=1;

    //On ajoute une publication
	$req = $bdd->prepare('INSERT INTO publication (idMembre) VALUES(:idMembre)');

	$req->execute(array(
		'idMembre' => $idMembre
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