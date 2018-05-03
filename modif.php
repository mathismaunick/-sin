<!DOCTYPE html>
<html>
<?php include ('rechercheInfo.php'); ?>
<head>
	<title>Modification</title>
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
	<h2 class="Roze">Modifier vos informations</h2>
<br>
    <form action="modif1.php" class="list" method="post" >

        Modifier son sexe: &nbsp;
        <input type="text" name="Sexe" placeholder="<?php echo $Sexe ?> ">
        <input type="submit" class="btn_vert" value="Modifier"><br /><br />

      Modifier votre ville: &nbsp;
        <input type="text" name="Ville" placeholder="<?php echo $Ville ?> ">&nbsp;
        <input type="submit" class="btn_vert" value="Modifier"><br /><br />

        Modifier votre âge:&nbsp;
        <input type="text" name="Age" placeholder="<?php echo $Age ?> ">&nbsp;
        <input type="submit" class="btn_vert" value="Modifier"><br /><br />

        Modifier votre Ecole:&nbsp;
        <input type="text" name="Ecole" placeholder="<?php echo $Ecole ?> ">&nbsp;
        <input type="submit" class="btn_vert" value="Modifier"><br /><br />
      
    </form>
</div>

</body>
</html>

