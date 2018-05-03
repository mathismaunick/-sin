<!DOCTYPE html>
<html>
<?php include ('rechercheInfo.php'); ?>
<head>
	<title>Vos informations</title>
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
        <a href="messagerie.php"> Messagerie </a>
        <a href="notification.php"> Notification </a>
        <a href="Vous.php"> Vous </a>
      </nav>
    </div>
  </header>

  <div class="contenu_global">

			<h1 class="Roze">Vos informations</h1>
			<div class="taille1">

					<u><b>Votre Ecole:</b></u> <?php echo $Ecole ?><br><br>
					<u><b>Votre Sexe:</b></u> <?php echo $Sexe ?><br><br>
					<u><b>Votre Age:</b></u> <?php echo $Age ?><br><br>
					<u><b>Votre Ville:</b></u> <?php echo $Ville ?><br><br>
					<u><b>Votre Mail:</b></u> <?php echo $Mail ?><br><br>
					<u><b>Votre Nom:</b></u> <?php echo $Nom ?><br><br>
					<u><b>Votre Pseudo:</b></u> <?php echo $Pseudo?><br><br>

			</div>


			<form method="post" action="modif.php">
			<input type="submit" class="btn_vert" value="Modifier vos informations"></form>
			<br><br>

</div>
</body>
</html>