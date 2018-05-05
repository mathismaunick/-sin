<!DOCTYPE html>
<html>
<head>
	<title>Mes Amis</title>
	        <link href="page.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
</head>
<body>


	<!--header-->
  <header class="container-fluid header">
    <div class="container">
      <a class="logo">Roze</a>
      <nav class="menu">
        <a href="Accueil.php"> Accueil </a>
        <a href="reseau.php"> Réseau </a>
        <a href="emplois.php"> Emplois </a>
        <a href="notification.php"> Notification </a>
        <a href="Vous.php"> Vous </a>
        <a href="deconnexion.php"><img src="images/logout1.PNG"> </a>
      </nav>
    </div>
  </header>
<!-- barre laterale sur la gauche -->
  <div class="contenu_actualite">

	<div class="contenu_actualite">

		<h1 class="Roze">Vos Amis</h1>
			<?php
				include ('Co.php');


			//On recherche toutes les informations du membre
			$Ami = $bdd->query("SELECT idAmi2 FROM amis WHERE amis.idAmi1 = '$id'");

			//$reponse = $bdd->query('SELECT pseudo FROM membre WHERE idMembre= $Ami');


			while ($donnees = $Ami->fetch())
			{

				$idami=$donnees['idAmi2'];

				$reponse = $bdd->query('SELECT * FROM membre WHERE idMembre=\'' . $idami . '\' ');

				while ($new = $reponse->fetch())
			{
				echo "<div class='publication'>
				Vous êtes amis avec <b>". $new['Pseudo']."</b> </br>";
				        echo "<div id='img_div'>";
			            echo "<img src='images/".$new['photo']."' >";
			    echo "</br></br></div> </div></br>";
			}

			}

			?>
	</div>
</div>


</body>
</html>

