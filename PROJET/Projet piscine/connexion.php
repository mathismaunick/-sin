<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8"/>
</head>
<body>
    <form  class="list" method="post" >

          <label class="item item-input" id="page-input5">
        <span class="input-label">Entrer votre adresse mail</span>
        <input type="text" name="Mail" placeholder="">
      </label><br />

      <label class="item item-input" id="page-input3">
        <span class="input-label">Entrez votre  mot de passe</span>
        <input type="password" name="mdp" placeholder="">
      </label><br /><br />

      <input type="submit" value="Valider">
      <input action="inscription.php" type="submit" value="Inscription">

      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    </form>

</body>
</html>

<?php
session_start();

// connexion a mysql
$conn = new mysqli("localhost", "tom", "tom", "piscine");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error());
}


    $Mail= $_POST['Mail'];
    $mdp= $_POST['mdp'];

	$sql = "SELECT id , mdp FROM membre WHERE Mail='$Mail' AND mdp='$mdp' ";

	$result = $conn->query($sql);

	echo $results;
	echo $Mail;
	echo $mdp;

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {

        $id=$row["id"]; 
        $_SESSION['id']=$id;

        ///place ton code d'execution
        header('Location: projet5.php');

	}
} 
else {
    echo "wrong login information, please go back";
}

$conn->close();
	?>