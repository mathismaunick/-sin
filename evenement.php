<!DOCTYPE html>
<html>
<?php include ('Co.php'); ?>
<head>
	<title>Creer un evenement</title>
</head>
<body>
<p>Veuillez créer un évènement</p>

<form method="post" action="evenement2.php">
  Rentrez la date de l'evenement:<br>
  <input type="date" name="DateEvent"><br>

  Rentrez le lieu de l'evenement:<br>
  <input type="text" name="lieu"><br>
  
  Description de l'evenement:<br>
  <input type="text" name="Texte" size="50" style="height:250px;"><br>

  <input type="submit" value="Valider l'evenement">
</form>
</body>

</html>