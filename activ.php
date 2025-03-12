<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>
  <link rel="stylesheet" href="styles/sport.css">
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
  <style>
  .center-activity h2 {
    font-family: 'Poppins', sans-serif;
    font-weight: 300;
    font-size: 50px;
    color: black; /* Nouvelle couleur du texte */
    margin: 0;
  }
</style>
  <title>Sportify - Activités sportives</title>
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
        </ul></li>
      </ul>
    </nav>

    <div class="choix">
      <ul>
        <li><a href="activ.php">Activités sportives</a></li>
        <li><a href="compet.php">Les Sports de compétition</a></li>
        <li><a href="salle.php">Salle de sport Omnes</a></li>
      </ul>
    </div>
  </header>

  <main>

      <h2>Activités sportives</h2>

    
      <div class="activite_box">
        <a href="muscu.php">
          <div class="activity-background" style="background-image: url('musculation.jpg');"></div>
          <span class="activity-title">Musculation</span>
        </a>
      </div>
      
      <div class="activite_box">
        <a href="fitness.php">
          <div class="activity-background" style="background-image: url('fitness.jpg');"></div>
          <span class="activity-title">Fitness</span>
        </a>
      </div>
      <div class="activite_box">
        <a href="biking.php">
          <div class="activity-background" style="background-image: url('biking.jpg');"></div>
          <span class="activity-title">Biking</span>
        </a>
      </div>
    
      <div class="activite_box">
        <a href="cardio.php">
          <div class="activity-background" style="background-image: url('https://th.bing.com/th/id/OIP.vfYaABdyqs9P5xMndRY3WAHaEF?w=327&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7');"></div>
          <span class="activity-title">Cardio-Training</span>
        </a>
      </div>
      <div class="activite_box">
        <a href="coursco.php">
          <div class="activity-background" style="background-image: url('coll.jpg');"></div>
          <span class="activity-title">Cours collectifs</span>
        </a>
      </div>
    
  </main>
</body>
</html>

