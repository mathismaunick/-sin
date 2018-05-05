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
      <a href="notification.php"> Notification </a>
      <a href="Vous.php"> Vous </a>
      <a href="deconnexion.php"><img src="images/logout1.PNG"> </a>
    </nav>
  </div>
</header>


<div class="sidenav">
  <!-- btn 1 evenement -->
  <form action="evenement.php" class="list" method="post" > &nbsp;<input type="submit" class="btn_rond" value="<?php echo "Ajouter un \n Evenement" ?>"><br /><br /></form>
  <!-- btn 2 photo -->
  <form action="charger_photo.php" class="list" method="post" > &nbsp;<input type="submit" class="btn_rond" value="<?php echo "Ajouter une \n photo" ?>"><br /><br /></form>
  <!-- btn 3 video-->

  <form action="charger_video.php" class="list" method="post" > &nbsp;<input type="submit" class="btn_rond" value="<?php echo "Ajouter une \n video" ?>"><br /><br /></form>
  <!-- btn 4 post-->
  <form action="post.php" class="list" method="post" > &nbsp;<input type="submit" class="btn_rond" value="<?php echo "Ajouter un \n post" ?>"><br /><br /></form>
</div>








<div class="contenu_global">

 <h1 class="Roze">Vos informations</h1>
 <?php  //ajout de la photo de profil


$reponse = $bdd->query("SELECT photo FROM membre WHERE idMembre ='$id' ");

while ($donnees = $reponse->fetch())
{
  echo "<div class='photo_profil'>";
  echo "<img src='images/".$donnees['photo']."' >";
  echo "</br></br> </div></br>";
}



  ?>
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


   <br><br><br>
   <br><br><br>
   <div class="trait" ></div>
   <h1 class="Roze"> Vos Publications </h1>
   <br><br><br>


   <?php


  //On recoit l'id du membre qui est connecté
   $reponse = $bdd->query("SELECT * FROM publication WHERE idMembre='$id' ORDER BY datePublication DESC");

   while ($donnees = $reponse->fetch())
   {
    echo "<div id='content'>";

    $prenom = $bdd->query('SELECT Pseudo FROM membre WHERE idMembre=\'' . $id . '\'');
    $idPublication= $donnees['idPublication'];
    $test = $prenom->fetch();

    echo $test['Pseudo'].' a publié ';


    echo ' le '.$donnees['datePublication']. ': <br />';



    if($donnees['type']==1)/*evenement*/
    {

      $evenement = $bdd->query('SELECT * FROM evenement WHERE idpublication=\'' . $donnees['idPublication'] . '\'');

      $infos = $evenement->fetch();
      echo "<div class='publication'>";
      echo 'Date de l\'evenement: <b>'.$infos['DateEvent']. '</b><br> lieu: <b>'.$infos['lieu'].'</b><br> description: <b>'.$infos['Texte']. '</b><br />';
      echo "</div>";


    }


    if($donnees['type']==2)/*photo*/
    {

      $photos = $bdd->query('SELECT *FROM photos INNER JOIN publication ON photos.idPublication = \'' . $idPublication. '\'  where idMembre=\'' . $id . '\'');

      $infosphoto = $photos->fetch();

      ?>

      <?php

      echo "<div class='publication'>";
           // echo 'Le lieu de evenement est '.$infosphoto['lieu']. '<br />';
      echo "<div id='img_div'>";
      echo "<img src='images/".$infosphoto['lien']."' >";
      echo "<p> Description de l'evenement: <b>".$infosphoto['Description']."</b></p>";
      echo "</div>";
      echo "</div>";

      ?>
      <form method="POST" action="supprimerImage.php" enctype="multipart/form-data">
        <input type="hidden" name="suppr" value="<?php echo $idPublication ?>">
        <div>

          <button type="submit" class="btn_gris" name="supprimer" value="<?php echo $infosphoto['idPhoto'] ?>">Supprimer</button>
        </div>
      </form>
      <form method="POST" action="modifierImage.php" enctype="multipart/form-data">

        <div>

          <button type="submit" name="modifier" class="btn_gris" value="<?php echo $infosphoto['idPhoto'] ?>">Modifier</button>
        </div>
      </form>
      <?php

    }

    if($donnees['type']==3)/*video*/
    {

     $video = $bdd->query('SELECT * FROM video INNER JOIN publication ON video.idPublication = \'' . $idPublication. '\'  where idMembre=\'' . $donnees['idMembre'] . '\'');

     ?>


     <?php

     $infosvideo = $video->fetch();

     echo "<video controls='controls'>";
     echo "<source src='video/".$infosvideo['lien']."' type='video/mp4'/>";
     echo "<source src='video/".$infosvideo['lien']."' type='video/webm'/>";
     echo "<source src='video/".$infosvideo['lien']."' type='video/ogg'/>";
     echo "</video>";
     echo "<p>".$infosvideo['Description']."</p>";
     echo "</div>";

     ?>

     <form method="POST" action="supprimerVideo.php" enctype="multipart/form-data">
      <input type="hidden" name="suppr" value="<?php echo $infosvideo['idPublication'] ?>">
      <div>

        <button type="submit" name="supprimer" class="btn_gris" value="<?php echo $infosvideo['idVideo'] ?>">Supprimer</button>
      </div>
    </form>
    <form method="POST" action="modifierVideo.php" enctype="multipart/form-data">

      <div>

        <button type="submit" name="modifier" class="btn_gris" value="<?php echo $infosvideo['idVideo'] ?>">Modifier</button>
      </div>
    </form>

    <?php

  }

  if($donnees['type']==4) /*post*/
  {

    $post = $bdd->query('SELECT * FROM post WHERE idpublication=\'' . $donnees['idPublication'] . '\'');

    $infospost = $post->fetch();
    

    echo 'la date de evenement est <b>'.$infospost['description']. '</b><br />';


  }


}


?>





</div>

</body>
</html>
