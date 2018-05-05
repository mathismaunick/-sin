<!DOCTYPE html>
<html>

<!--  head -->
    <head>
        <meta charset="utf-8">
        <title> Accueil </title>
            <link href="page.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
            <link rel="stylesheet" href="bootstrap.min.css">
            <link rel="stylesheet" href="style.css">
    </head>
    <!-- body -->
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







<br>
<?php
  include ('Co.php');

//On recoit l'id du membre qui est connecté
$reponse = $bdd->query('SELECT * FROM publication ORDER BY datePublication DESC');

while ($donnees = $reponse->fetch())
{
  echo "<div class='publication'>";

  $prenom = $bdd->query('SELECT Pseudo FROM membre WHERE idMembre=\'' . $donnees['idMembre'] . '\'');
  $idPublication= $donnees['idPublication'];
  $test = $prenom->fetch();
  
  echo $test['Pseudo'].' a publié ';
  

  echo ' le '.$donnees['datePublication']. ': <br />';


  if($donnees['type']==1)/*evenement*/
  {

    $evenement = $bdd->query('SELECT * FROM evenement WHERE idpublication=\'' . $donnees['idPublication'] . '\'');

    $infos = $evenement->fetch();
    
      echo 'Date de l\'evenement: <b>'.$infos['DateEvent']. '</b><br> lieu: <b>'.$infos['lieu'].'</b><br> description: <b>'.$infos['Texte']. '</b><br />';
      
    
  }


  if($donnees['type']==2)/*photo*/
  {

    $photos = $bdd->query('SELECT *FROM photos INNER JOIN publication ON photos.idPublication = \'' . $idPublication. '\'  where idMembre=\'' . $donnees['idMembre'] . '\'');

    $infosphoto = $photos->fetch();
    ?>
      <div id="content">
  <?php

            echo 'Le lieu de evenement est '.$infosphoto['lieu']. '<br />';
        echo "<div id='img_div'>";
            echo "<img src='images/".$infosphoto['lien']."' >";
            echo "<p> Description de l'evenement: <b>".$infosphoto['Description']."</b></p>";
        echo "</div>";
        ?>
      <form method="POST" action="supprimerImage.php" enctype="multipart/form-data">
      <input type="hidden" name="suppr" value="<?php echo $idPublication ?>">
        <div>

          <button type="submit" name="supprimer" value="<?php echo $infosphoto['idPhoto'] ?>">Supprimer</button>
        </div>
      </form>
      <form method="POST" action="modifierImage.php" enctype="multipart/form-data">

        <div>

          <button type="submit" name="modifier" value="<?php echo $infosphoto['idPhoto'] ?>">Modifier</button>
        </div>
      </form>
    <?php
    
  }

  if($donnees['type']==3)/*video*/
  {
    $video = $bdd->query('SELECT * FROM video INNER JOIN publication ON video.idPublication = \'' . $idPublication. '\'  where idMembre=\'' . $donnees['idMembre'] . '\'');

        ?>
  <div id="content">

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

          <button type="submit" name="supprimer" value="<?php echo $infosvideo['idVideo'] ?>">Supprimer</button>
        </div>
      </form>
      <form method="POST" action="modifierVideo.php" enctype="multipart/form-data">

        <div>

          <button type="submit" name="modifier" value="<?php echo $infosvideo['idVideo'] ?>">Modifier</button>
        </div>
      </form>

    <?php

  }

  if($donnees['type']==4) /*post*/
  {

    $post = $bdd->query('SELECT * FROM post WHERE idpublication=\'' . $donnees['idPublication'] . '\'');

    $infospost = $post->fetch();
    
    
      echo 'la description est '.$infospost['description']. '<br />';
      

  }

$comment = $bdd->query('SELECT * FROM commentaire WHERE idPubli=\'' . $donnees['idPublication'] . '\'');
 

 echo "<div class='groupe_com'>";
  while ($idComAmi = $comment->fetch())
  {
    echo "<div class='commentaire'>";
      
      $commentaire= $bdd->query('SELECT Pseudo 
      FROM membre
      INNER JOIN commentaire
      WHERE membre.idMembre =\'' . $idComAmi['idComAmi'] . '\' ');

      $idComAmis = $commentaire->fetch();
      echo "<b>".$idComAmis['Pseudo']. ': </b><br />';
      echo $idComAmi['Description'];
      echo "</div>";
  }
echo "</div>";
echo "</div>";


?>
  <form action="like.php"  method="post">

    <button type="submit" class="btn_vert" name="like" value="<?php echo $idPublication ?>"><?php echo $donnees['nbLike'] ?> Liker</button>

    </form>

    <form action="comment.php" method="post">

      Commenter: <input type="text" name="Description"><br>
      <button type="submit" class="btn_vert" name="commentaire" value="<?php echo $idPublication ?>">Commenter</button><br><br>

    </form>

<?php
}


?>





  </div>




  </body>

</html>