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
  <div class="contenu_global">


<br><br><br><br><br>


<?php
// Create database connection
$db = mysqli_connect("localhost", "root", "", "piscine");
  include ('Co.php');
// Initialize message variable



$result = mysqli_query($db, "SELECT * FROM publication inner join (SELECT idAmi2 FROM amis where idAmi1='$id') as tutu on idMembre=tutu.idAmi2 ORDER BY `publication`.`datePublication`  DESC");



while ($row = mysqli_fetch_array($result)) {
  $datePubli= $row['datePublication'];
  $idPubli= $row['idPublication'];
  $sql = "INSERT INTO `notification` (`idNotif`, `idMembre`, `ouvert`, `idPublication`,`date`) VALUES (NULL, $id, '0', $idPubli,'$datePubli')";
  // execute query
  mysqli_query($db, $sql);
}
//on choppe les notifications de l'utilisateur
$result = mysqli_query($db, "SELECT * FROM notification where idMembre=$id");
while ($row = mysqli_fetch_array($result)) { //on
  $date=$row['date'];
   $idPubli2= $row['idPublication']; //on choppe les id des mec qui on fit la modif
  $result2 = mysqli_query($db, "SELECT * FROM publication where idPublication=$idPubli2");
  while ($row2 = mysqli_fetch_array($result2)) {

   $idAmi=$row2['idMembre'];
   $result3 = mysqli_query($db, "SELECT * FROM membre where idMembre=$idAmi");
   while ($row3 = mysqli_fetch_array($result3)) {
     $phrase= $row3['Nom'];

   }
   $type=$row2['type'];
    $phrase=$phrase. ' a publier ' ;
    if($type==1)
    {$phrase=$phrase. 'un evenement ';}
    else if($type==2)
    {$phrase=$phrase.' une photo ';}
    else if($type==3)
    {$phrase=$phrase. 'une video ';}
    else if($type==4)
    {$phrase=$phrase. 'un post ';}
    $phrase=$phrase. 'le ';
      $phrase=$phrase.$date;

    $sql = "INSERT INTO `notifglobal` (`date`,`text`,`ouvert`,`idMembre`,`id`) VALUES ('$date','$phrase','0','$id',NULL)";
    // execute query
    mysqli_query($db, $sql);
     }
  }



  //INSERT INTO `notification` (`idNotif`, `idMembre`, `ouvert`, `idPublication`) VALUES (NULL, $id, '', $row['idPublication']);
//pour les likes et commentaire mtn
$result = mysqli_query($db, "SELECT * FROM publication inner join (SELECT * FROM commentaire) as tutu on idPublication=tutu.idPubli where idMembre=$id");



while ($row = mysqli_fetch_array($result)) {
$idAmi= $row['idComAmi'];
  $result3 = mysqli_query($db, "SELECT * FROM membre where idMembre=$idAmi");
  while ($row3 = mysqli_fetch_array($result3)) {
    $phrase= $row3['Nom'];}

$phrase=$phrase.' a commente votre publication ';
$phrase=$phrase. $row['idPublication'];
$phrase=$phrase.' le ';
$phrase=$phrase. $row['Heure'];
$date= $row['Heure'];

    $sql = "INSERT INTO `notifglobal` (`date`,`text`,`ouvert`,`idMembre`,`id`) VALUES ('$date','$phrase','0','$id',NULL)";
    // execute query
    mysqli_query($db, $sql);

}


//pour les likes et commentaire mtn
$result = mysqli_query($db, "SELECT * FROM publication NATURAL join (SELECT * FROM  `liker`) as tutu  where idMembre=$id");



while ($row = mysqli_fetch_array($result)) {
$idAmi= $row['idLikeur'];
  $result3 = mysqli_query($db, "SELECT * FROM membre where idMembre=$idAmi");
  while ($row3 = mysqli_fetch_array($result3)) {
    $phrase= $row3['Nom'];}

$phrase=$phrase.' a like votre publication ';
$phrase=$phrase. $row['idPublication'];
$phrase=$phrase.' le ';
$phrase=$phrase. $row['Heure'];
$date= $row['Heure'];

    $sql = "INSERT INTO `notifglobal` (`date`,`text`,`ouvert`,`idMembre`,`id`) VALUES ('$date','$phrase','0','$id',NULL)";
    // execute query
    mysqli_query($db, $sql);

    $result = mysqli_query($db, "SELECT * FROM notifglobal where idMembre='$id' AND ouvert='0' ORDER BY date DESC");
    $nbNotif=0;
    while ($row = mysqli_fetch_array($result)) {

    $nbNotif=  $nbNotif+1;
    }

}
  ?>
  <?php

if(  $nbNotif==0)
{echo 'Pas de nouvelle notification. <br> <b>Derniere notification:</b>';echo '<br><br>';}
else if($nbNotif==0){echo 'Vous avez ';echo $nbNotif; echo ' notification';echo '<br>'; }
else{echo 'Vous avez ';echo $nbNotif; echo ' notifications';echo '<br>';}

  $result = mysqli_query($db, "SELECT * FROM notifglobal where idMembre='$id' ORDER BY date DESC");

  while ($row = mysqli_fetch_array($result)) {

    echo $row['text'];
    if($row['ouvert']==0)
    {echo ' nouveau';}
    else {echo ' vu';}
      echo '<br>';
  }

  $sql = "UPDATE `notifglobal` SET `ouvert` = '1' WHERE `notifglobal`.`ouvert` = 0;";
  // execute query
  mysqli_query($db, $sql);
   ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</div>
</body>
</html>
