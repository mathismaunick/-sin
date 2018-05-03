<!DOCTYPE html>
<html>
<?php include ('rechercheInfo.php'); ?>
<head>
	<title>Modification</title>
</head>

<body>

	<h2>Modifier vos informations</h2>

    <form action="modif1.php" class="list" method="post" >

        Modifier son sexe
        <input type="radio" name="Sexe" checked>H
        <input type="radio" name="Sexe" >F
        <input type="submit" value="Modifier"><br /><br />

      Modifier votre ville
        <input type="text" name="Ville" placeholder="<?php echo $Ville ?> ">
        <input type="submit" value="Modier"><br /><br />

        Modifier votre âge
        <input type="text" name="Ville" placeholder="<?php echo $Age ?> ">
        <input type="submit" value="Modifier"><br /><br />
      
    </form>

</body>
</html>

