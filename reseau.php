
<?php
	include ('Co.php');

//On recoit l'id du membre qui est connecté
$id=1;
//On recherche toutes les informations du membre
$Ami = $bdd->query('SELECT idAmi2 FROM amis WHERE amis.idAmi1 = 1');

//$reponse = $bdd->query('SELECT pseudo FROM membre WHERE idMembre= $Ami');

echo "vos amis sont: ";

while ($donnees = $Ami->fetch())
{

	$idami=$donnees['idAmi2'];

	$reponse = $bdd->query('SELECT pseudo FROM membre WHERE idMembre=\'' . $idami . '\' ');

	while ($new = $reponse->fetch())
{
	echo 'Vous êtes amis avec'.$new['pseudo'] .'</br>';
}

}

?>
