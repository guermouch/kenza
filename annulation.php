<?php

$database = "projetweb";

// Connectez-vous à la BDD
$db_handle = mysqli_connect('localhost', 'root', '');

// Vérifiez la connexion
if (!$db_handle) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Sélectionnez la base de données
$db_found = mysqli_select_db($db_handle, $database);

// Vérifiez si la base de données existe
if (!$db_found) {
    die("La base de données $database n'existe pas : " . mysqli_error($db_handle));
}

// Récupération des paramètres
$ID_rdv = $_GET['id_rdv'];

// Utilisez $db_handle au lieu de $bdd
$query = "DELETE FROM rdv WHERE id_rdv = ?";
$statement = mysqli_prepare($db_handle, $query);

// Vérifiez si la préparation a réussi
if ($statement) {
    mysqli_stmt_bind_param($statement, 'i', $ID_rdv);
    $success = mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    // Vérifiez si la suppression a réussi
    if ($success) {
        $confirmation_message = "Le rendez-vous a été annulé avec succès.";
    } else {
        $confirmation_message = "Erreur lors de l'annulation du rendez-vous : " . mysqli_error($db_handle);
    }
}

// Redirigez vers la page des rendez-vous
header("Location: rdvpage.php");
exit();

?>
