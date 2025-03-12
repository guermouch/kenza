

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

// Requête SQL pour récupérer la première ligne de la table "coach"
$sql = "SELECT * FROM coach where ID_coach = 5";
$result = mysqli_query($db_handle, $sql);

// Vérifiez s'il y a des résultats
if ($result && mysqli_num_rows($result) > 0) {
    // Affichez le tableau HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Bureau</th></tr>";

    // Récupérez et affichez la première ligne
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    echo "<td>" . $row["ID_coach"] . "</td>";
    echo "<td>" . $row["nom_coach"] . "</td>";
    echo "<td>" . $row["prenom_coach"] . "</td>";
    echo "<td>" . $row["email_coach"] . "</td>";
    echo "<td>" . $row["telephone_coach"] . "</td>";
    echo "<td>" . $row["bureau_coach"] . "</td>";
    echo "</tr>";

    echo "</table>";
} else {
    echo "0 results";
}

// Fermez la connexion à la base de données
mysqli_close($db_handle);
?>

</body>
</html>
