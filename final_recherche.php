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

// Traitement du formulaire d'ajout de rendez-vous
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $date_heure = $_POST['date_heure'];
    $lieu = $_POST['lieu'];
    $heure = $_POST['heure'];
    $id_client = $_POST['id_client'];
    $id_coach = $_POST['id_coach'];

    // Insérer le rendez-vous dans la base de données
    $query = "INSERT INTO rdv (date_heure, lieu, heure, id_client, id_coach) VALUES ('$date_heure', '$lieu', '$heure', '$id_client', '$id_coach')";
    $result = mysqli_query($db_handle, $query);

    if ($result) {
        echo "Rendez-vous ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout du rendez-vous : " . mysqli_error($db_handle);
    }
}



// Récupérer les rendez-vous existants avec les noms des clients et des coachs
$query_select_rdv = "SELECT rdv.date_heure, rdv.lieu, rdv.heure, client.nom AS nom_client, coach.nom AS nom_coach FROM rdv
                    INNER JOIN client ON rdv.id_client = client.id
                    INNER JOIN coach ON rdv.id_coach = coach.id";
$result_select_rdv = mysqli_query($db_handle, $query_select_rdv);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rendez-vous</title>
</head>
<body>

    <h1>Gestion des Rendez-vous</h1>

    <!-- Formulaire d'ajout de rendez-vous -->
    <h2>Ajouter un Rendez-vous</h2>
    <form action="" method="post">
        <label for="date_heure">Date et Heure :</label>
        <input type="datetime-local" name="date_heure" required><br>

        <label for="lieu">Lieu :</label>
        <input type="text" name="lieu" required><br>

        <label for="heure">Heure :</label>
        <input type="time" name="heure" required><br>

        <label for="id_client">ID Client :</label>
        <input type="text" name="id_client" required><br>

        <label for="id_coach">ID Coach :</label>
        <input type="text" name="id_coach" required><br>

        <input type="submit" value="Ajouter Rendez-vous">
    </form>

    <!-- Affichage des rendez-vous existants -->
    <h2>Liste des Rendez-vous</h2>
    <table border="1">
        <tr>
            <th>Date et Heure</th>
            <th>Lieu</th>
            <th>Heure</th>
            <th>ID Client</th>
            <th>ID Coach</th>
        </tr>
        <?php
        // Afficher les rendez-vous existants
        while ($row = mysqli_fetch_assoc($result_select_rdv)) {
            echo "<tr>";
            echo "<td>" . $row['date_heure'] . "</td>";
            echo "<td>" . $row['lieu'] . "</td>";
            echo "<td>" . $row['heure'] . "</td>";
            echo "<td>" . $row['id_client'] . "</td>";
            echo "<td>" . $row['id_coach'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
// Fermer la connexion
mysqli_close($db_handle);
?>
