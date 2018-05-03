<meta charset="utf-8" />

<?php
include ('Co.php');

//$id=$_POST["id"];
$id=1;
//On recherche toutes les informations du membre
$reponse = $bdd->query('SELECT * FROM info WHERE idMembre=1');

while ($donnees = $reponse->fetch())
{
	$Sexe= $donnees['Sexe'];
	$Ecole= $donnees['Ecole'];
	$Age= $donnees['Age'];
	$Ville=$donnees['Ville'];
}

$reponse = $bdd->query('SELECT * FROM membre WHERE idMembre=1');
while ($donnees = $reponse->fetch())
{
	$Mail= $donnees['Mail'];
	$Nom= $donnees['Nom'];
	$Pseudo= $donnees['Pseudo'];
	//$Photo=$donnees['Photo'];
}

?>