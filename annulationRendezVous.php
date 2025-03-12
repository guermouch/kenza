<?php
// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=projetweb1.0', 'root', '');

// Récupération des parametres
$ID_Evenement = $_GET['id'];

$query = "DELETE FROM evenements WHERE ID = :ID";
$statement = $bdd->prepare($query);
$statement->bindParam(':ID', $ID_Evenement);
$statement->execute();

header("Location: rendezvous.php");
exit();
?>
