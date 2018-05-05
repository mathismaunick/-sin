
<?php
session_start();
//connexion a un account utillisateur
    $Mail = $_POST["Mail"];
    $mdp = $_POST["mdp"];


// connexion a mysql
 /*$conn = new mysqli("176.128.237.105", "tom", "tom", "residence-des-bains");*/
$conn = new mysqli("localhost", "root","", "piscine");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error());
}

$sql = "SELECT idMembre FROM membre WHERE Mail='$Mail' AND mdp='$mdp'";
$result = $conn->query($sql);
/*var_dump($result);*/

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) /*tant que les resultats sont bons on le fait*/
    {

        $id=$row["idMembre"];
        $_SESSION['id'] = $id;
        ///place ton code d'execution
        header('Location: vous.php?id='.$id);

    }
} 
else {echo "Votre identifiant ou mot de passe est incorrect. Veuillez revenir en arriere.";}

$conn->close();


?>