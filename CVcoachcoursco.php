<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>
  <link rel="stylesheet" href="styles/style2_coach.css">
  <script src="java.js"></script><style>
    header {
  height: 170px;
  }
  nav {
  width: 100%;
  height: 20px;
  }
  </style>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Contenu de la page de compte -->
  <header>
    <img src="logo.jpg" alt="Logo" class="logo_sportify">
    <nav>
      <ul>
        <li><a href="acceuil.php">Accueil</a></li>
        <li><a class="parcourir-link" href="#">Tout Parcourir</a></li>
        <li><a href="recherche.php">Recherche</a></li>
        <li><a href="rendezvous.php">Rendez-vous</a></li>
        <li><a href="Compte.php">Votre Compte</a></li><?php
// Démarrez la session
      session_start();
      //outils debug objet session : print_r($_SESSION);
// Vérifiez si l'utilisateur est connecté
      if (isset($_SESSION['Email'])) {
    // L'utilisateur est connecté
        ?>
          <li><a href="traitementDeconnexion.php">Déconnexion</a></li>
        <?php
      } else {
    // L'utilisateur n'est pas connecté
      ?>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscriptionClient.php">Inscription</a></li>
        <?php
        }
        ?>      
        </ul></li>      </ul>
    </nav>

    <div class="choix">
      <ul>
        <li><a href="activ.php">Activités sportives</a></li>
        <li><a href="compet.php">Les Sports de compétition</a></li>
        <li><a href="salle.php">Salle de sport Omnes</a></li>
      </ul>
    </div>
  </header>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV du Coach</title>
 
</head>
<body>
  <div class="cv-1">
    <?php
    // Chemin vers le fichier XML
    $xmlFile = "CVcoachcoursco.xml";

    // Charger le contenu du fichier XML
    $xml = simplexml_load_file($xmlFile);

    // Afficher les données du fichier XML
    echo "<h2><span style='font-family: Arial, sans-serif;'>" . $xml->nom . "</span></h2>";
    echo "<p><strong>Formation:</strong> " . $xml->formations . "</p>";
    echo "<p><strong>Expériences:</strong> " . $xml->experiences . "</p>";
    echo "<p><strong>Certification Mooc:</strong> " . $xml->Certification_Mooc . "</p>";
    echo "<p><strong>Bac:</strong> " . $xml->Bac . "</p>";
    echo "<p><strong>Langues parlées:</strong> " . $xml->langues . "</p>";
    echo "<p><strong>Avis:</strong> " . $xml->Avis . "</p>";
    ?>

  </div>
</body>
</html>
