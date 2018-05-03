<meta charset="utf-8">

  <?php
	try
	{
	  $bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
    $Mail="";
    $mdp="";
    $cmdp="";
    $Nom="";
    $Mail= $_POST['Mail'];
    $mdp= $_POST['mdp'];
    $cmdp= $_POST['cmdp'];
    $Nom = $_POST['Nom'];


if($cmdp!=$mdp)
{
echo "Le mot de passe et sa confirmation ne sont pas identiques.Veuillez réessayer.";
}
if(($Mail=="")||($Nom=="")||($mdp=="")||($cmdp==""))
{
  echo "Un champ est vide. Veuillez réessayer.";
}

if(($Mail!="")&&($Nom!="")&&($mdp!="")&&($cmdp!="")&&($cmdp==$mdp))
{
    $req = $bdd->prepare('INSERT INTO membre (Mail,Nom, mdp) VALUES(:Mail,:Nom,:mdp)');
    $req->execute(array('Mail' => $Mail,'Nom' => $Nom,'mdp' => $mdp));
    header('Location:connexion.html');
}




	?>

