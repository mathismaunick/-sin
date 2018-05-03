<!DOCTYPE html>
<html>
<?php include ('rechercheInfo.php'); ?>
<head>
	<title>Vos informations</title>
</head>
<body>

<h1>Vos informations</h1>

<p>Votre Ecole: <?php echo $Ecole ?></p><br />
<p>Votre Sexe: <?php echo $Sexe ?></p><br />
<p>Votre Age: <?php echo $Age ?></p><br />
<p>Votre Ville: <?php echo $Ville ?></p><br />
<p>Votre Mail: <?php echo $Mail ?></p><br />
<p>Votre Nom: <?php echo $Nom ?></p><br />
<p>Votre Pseudo: <?php echo $Pseudo?></p><br />

<input type="submit" value="Modifier vos informations"><br /><br />
</body>
</html>