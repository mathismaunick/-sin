<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "piscine");

// Initialize message variable

$idVideo=$_POST['modifier'];
$result = mysqli_query($db, "SELECT * FROM video  where idVideo='$idVideo'");
?>
<!DOCTYPE html>
<html>
<head>
  <title>modif video</title>
  <meta charset="utf-8">
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


  <div class="contenu_global">

  <div id="content">

    <?php

    while ($row = mysqli_fetch_array($result)) {


      echo "<video width='400' height='222' controls='controls'>";
      echo "<source src='video/".$row['lien']."' type='video/mp4'/>";
      echo "<source src='video/".$row['lien']."' type='video/webm'/>";
      echo "<source src='video/".$row['lien']."' type='video/ogg'/>";
      echo "</video>";
        $odlDescription=$row['Description'];
      echo "</div>";

      ?>

      <form method="POST" action="changerVideo.php" enctype="multipart/form-data">
      	<input type="hidden" name="size" value="1000000">

      	<div>
          <textarea	id="text"	cols="40"	rows="4"name="image_text"><?php echo $odlDescription;?></textarea>
      	</div>
      	<div>
      		<button type="submit" name="changer" value="<?php echo $idVideo; ?> ">Changer</button>
      	</div>
      </form>


    <?php  }
    ?>

  </div>
</div>
</body>
</html>
