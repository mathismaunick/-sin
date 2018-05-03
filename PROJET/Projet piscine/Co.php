<meta charset="utf-8">
<?php
//TRUC QUI RECUPERE TOUTE LES DONNEES DE LA BASE POUR LES AFFI
try
{

	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

?>