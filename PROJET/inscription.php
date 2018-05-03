
<!DOCTYPEhtml>
<html>
  <head>
    <title>Inscription à Lindedin</title>
    <link href="projet1.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8" />
  </head> 

  <body>

    <h2 action="connexion.php" id="page-heading1"  class="titres">Inscription à Lindedin</h1>

    <form id="page-form1" class="list" method="post" >

          <label class="item item-input" id="page-input5">
        <span class="input-label">Entrer votre adresse mail</span>
        <input type="text" name="Mail" placeholder="">
      </label><br />

      <label class="item item-input" id="page-input3">
        <span class="input-label">Entrez votre nouveau mot de passe</span>
        <input type="password" name="mdp" placeholder="">
      </label><br />

      <label class="item item-input" id="page-input4">
        <span class="input-label">Confirmer votre mot de passe</span>
        <input type="password" name="cpassword" placeholder="">
      </label><br /><br />
      <input type="submit" value="Valider">

    </form>

  <?php
	try
	{
	  $bdd = new PDO('mysql:host=localhost;dbname=piscine;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

    $Mail= $_POST['Mail'];
    $mdp= $_POST['mdp'];

	$req = $bdd->prepare('INSERT INTO membre (Mail, mdp) VALUES(:Mail,:mdp)');
	$req->execute(array(
	  'Mail' => $Mail,
  	  'mdp' => $mdp
	  ));
	?>

