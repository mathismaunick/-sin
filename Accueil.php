<!DOCTYPE html>
<html>

<!--  head -->
    <head>
        <meta charset="utf-8">
        <title> ROZE </title>
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
        <a href="messagerie.php"> Messagerie </a>
        <a href="notification.php"> Notification </a>
        <a href="Vous.php"> Vous </a>
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

  $prenom = $bdd->query('SELECT Pseudo FROM membre WHERE idMembre=\'' . $donnees['idMembre'] . '\'');
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

    $photos = $bdd->query('SELECT *FROM photos INNER JOIN publication ON photos.idPublication = publication.idPublication  where idMembre=\'' . $donnees['idMembre'] . '\'');

    $infosphoto = $photos->fetch();
    
      echo "<div class='publication'>";
            echo 'Le lieu de evenement est '.$infosphoto['lieu']. '<br />';
        echo "<div id='img_div'>";
            echo "<img src='images/".$infosphoto['lien']."' >";
            echo "<p> Description de l'evenement: <b>".$infosphoto['Description']."</b></p>";
        echo "</div>";
      echo "</div>";

    
  }

  if($donnees['type']==3)/*video*/
  {

    echo "<div class='publication'>";
    echo "</div>";

  }

  if($donnees['type']==4) /*post*/
  {

    $post = $bdd->query('SELECT * FROM post WHERE idpublication=\'' . $donnees['idPublication'] . '\'');

    $infospost = $post->fetch();
    
    echo "<div class='publication'>";
      echo 'la date de evenement est '.$infospost['description']. '<br />';
      echo "</div>";

  }




?>
  <form action="like.php"  method="post">

    <button type="submit" name="like" value="<?php echo $idPublication ?>">Liker</button>

    </form>

    <form action="comment.php" method="post">

      Commenter: <input type="text" name="Commenter"><br>
      <input type="submit" value="Poster">
    </form>

<?php
}


?>





  </div>




  </body>

</html>