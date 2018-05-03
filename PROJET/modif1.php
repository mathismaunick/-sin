<?php
include ('rechercheInfo.php');

$Sexe= $_POST['sexe'];

//On modifi les donnees
$req = $bdd->prepare('UPDATE info SET sexe = :sexe WHERE idMembre =1');
$req->execute(array(
	'sexe' => $Sexe,
	));

while ($donnees = $reponse->fetch())
{
	$donnees['Sexe']=$Sexe;

}
header("Acceuil.php")
?>