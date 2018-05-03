<!DOCTYPE html>
<html>
<head>
	<title>Emlois</title>
	<link href="page.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap.min.css">
 	<link rel="stylesheet" href="style.css">
    <meta charset="utf-8"/>



</head>
<body>

	    <!--header-->
  <header class="container-fluid header">
    <div class="container">
      <a class="logo">Roze</a>
      <nav class="menu">
        <a href="Acceuil.php"> Acceuil </a>
        <a href="reseau.php"> Réseau </a>
        <a href="emplois.php"> Emplois </a>
        <a href="messagerie.php"> Messagerie </a>
        <a href="notification.php"> Notification </a>
        <a href="Vous.php"> Vous </a>
      </nav>
    </div>
  </header>


	<div class="contenu_global">
		<h1 class="Roze">Vos Demandes D'emplois</h1>

	
				<?php 

					$conn = new mysqli("localhost", "tom","tom", "piscine");
					// Check connection
					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error());
					}

					$sql =("SELECT description FROM emplois");
    				$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
						echo "<div class='trait'></div>
							</p>";
					    // output data of each row
					    while($row = $result->fetch_assoc()) /*tant que les resultats sont bons on le fait*/
					    {

					        $description=$row["description"];

					        echo"
					        <div class='un_emploi'>

							<p>
							<!-- on met l'image ici -->
							<!-- <img class='imagedroite' src='images/apt/apt5-2.jpg'> -->
							$description
							<div class='trait'></div>
							</p>
	
							</div>";

					    }
					} 
					else {echo "Votre identifiant ou mot de passe est incorrect. Veuillez revenir en arriere.";}
				?>
	</div>

</body>
</html>