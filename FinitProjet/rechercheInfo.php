<meta charset="utf-8" />

<?php
include ('Co.php');


//On recherche toutes les informations du membre
$reponse = $bdd->query("SELECT * FROM info WHERE idMembre='$id'");

while ($donnees = $reponse->fetch())
{
	$Sexe= $donnees['Sexe'];
	$Ecole= $donnees['Ecole'];
	$Age= $donnees['Age'];
	$Ville=$donnees['Ville'];
}

$reponse = $bdd->query("SELECT * FROM membre WHERE idMembre='$id'");
while ($donnees = $reponse->fetch())
{
	$Mail= $donnees['Mail'];
	$Nom= $donnees['Nom'];
	$Pseudo= $donnees['Pseudo'];
	//$Photo=$donnees['Photo'];
}

?>