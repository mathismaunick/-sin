
<?php
include ('Co.php');

  // Initialize message variable
  
  $db = mysqli_connect("localhost", "root", "", "piscine");
  $date = new DateTime();
  $datePublication=$date->format('Y-m-d H:i:s');

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name

    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "video/".basename($image);

  # $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
    $sql = "INSERT INTO `publication` (`idPublication`, `idMembre`, `type`,`nbCom`,`nbLike`,`datePublication`) VALUES (NULL, '$id', 3,0,0,'$datePublication')";
    mysqli_query($db, $sql);

    $kiki = mysqli_query($db, "SELECT * FROM publication");
    while ($tutu = mysqli_fetch_array($kiki)) {

      $pipi= $tutu['idPublication'];
    }
    

    $sql = "INSERT INTO `video` (`idVideo`, `Description`, `lieu`, `idPublication`, `lien`) VALUES (NULL, '$image_text', '', $pipi, '$image')";
    
    // execute query
    mysqli_query($db, $sql);
    header('Location:Vous.php');
    
  }

?>
<!DOCTYPE html>
<html>
<head>

<!--css-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/upload.css">
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
<br><br><br><br><br>
  <form method="POST" action="charger_video.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
      <input type="file" name="image">
      <textarea
        id="text"
        cols="40"
        rows="4"
        name="image_text"
        placeholder="Description..."></textarea><br>
      <button type="submit" class="btn_vert" name="upload">Publier</button>
  </form>
</div>

</body>
</html>
