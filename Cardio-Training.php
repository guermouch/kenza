<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
       <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            
        }

        .h1 {
            color: #333;
        }

        .p {
            margin-bottom: 10px;
        }
    </style>
       <script>
$(document).ready(function(){
$("input").focus(function(){ $(this).css("background-color", "gold");
});
$("input").blur(function(){ $(this).css("background-color", "yellow");
});
}); </script>
      <style>
        #header {
            color: white;
            background-color: black;
            text-align: center;
            padding: 5px;
        }
              .body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .centrer {
            text-align: center;
        }
          .cadre {
            border: 2px solid #333;
            padding: 20px;
            width: 300px;
            margin: 20px;
            margin-top: 50px;
            margin-right: 150px; /* Ajustez cette valeur selon vos besoins */
        }
        /
        .contenu {
            color: #333;
        }
         img {
            max-width: 100%; /* La largeur maximale de l'image sera de 100% de la largeur du conteneur parent */
            height: auto;    /* La hauteur est automatiquement ajustée pour conserver les proportions de l'image */
        }
         button {
            margin: 10px;
            padding: 10px;
        }
         table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
   
    </style>
</head>

<body>
      <div id="header">
        <h1> Coach de cardio-training</h1>
    </div>
    <div class="centrer">
     
 
     <div class="cadre">
        <p class="contenu">

      

<h1>Simon Claire</h1>
 <h2>Coach de cardio-training</h2>
    <section>
        <h2>Coordonnées</h2>
        <p>Téléphone : <a href="tel:+1234567890">0789123456</a></p>
        <p> E-mail : <a href="simon.claire@email.com">pierre.lefevre@email.com</a></p>
        <p>Bureau 8 </p>
    </section>
</p>
        </div>


    <a href="rdvpage.php">
        <button>Prendre un RDV</button>
    </a>
       
        <button onclick="communiquerAvecCoach()">Communiquer avec le Coach</button>
        <button onclick="voirCv()">Voir son CV
            <a href= "../htdocs/cvmuscu.pdf"> </button>
        <table>
            <tr>
                <th>Jour</th>
                <th>Disponibilités</th>
            </tr>
            <tr>
                <td>Lundi</td>
             
                <td>9:00 - 12:00</td>
            </tr>
            <tr>
                <td>Mardi</td>
                <td>14:00 - 17:00</td>
            </tr>
            <tr>
                <td>Mercredi</td>
                <td>14:00 - 17:00</td>
            </tr>
            <tr>
                <td>Jeudi</td>
                <td>14:00 - 17:00</td>
            </tr>
            <tr>
                <td>Vendredi</td>
                <td>14:00 - 17:00</td>
            </tr>
            <tr>
                <td>Samedi</td>
                <td>14:00 - 17:00</td>
            </tr>


   



<?php

$database = "projetweb";


$db_handle = mysqli_connect('localhost', 'root', '');


if (!$db_handle) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$db_found = mysqli_select_db($db_handle, $database);


if (!$db_found) {
    die("La base de données $database n'existe pas : " . mysqli_error($db_handle));
}


$sql = "SELECT * FROM coach Where ID_coach = 1";
$result = mysqli_query($db_handle, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Téléphone</th><th>Bureau</th></tr>";

    
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $date_heure = $_POST['date_heure'];

    $lieu = $_POST['lieu'];

    $heure = $_POST['heure'];

    $id_client = $_POST['id_client'];

    $id_coach = $_POST['id_coach'];


    

    $query = "INSERT INTO rdv (date_heure, lieu, heure, id_client, id_coach) VALUES ('$date_heure', '$lieu', '$heure', '$id_client', '$id_coach')";

    $result = mysqli_query($db_handle, $query);


    if ($result) {

        echo "Rendez-vous ajouté avec succès!";

    } else {

        echo "Erreur lors de l'ajout du rendez-vous : " . mysqli_error($db_handle);

    }

}


mysqli_close($db_handle);
?>
           
         
        </table>
    </div>
          </div>


</html>