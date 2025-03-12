<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>
  <link rel="stylesheet" href="styles/style1.css">
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

  <main>
    <div class="gauche-encadrement">
      <h2>Cours collectifs</h2>
      <p>Vous cherchez une façon dynamique et motivante de rester en forme tout en partageant des moments de convivialité avec d'autres passionnés de sport ? Ne cherchez pas plus loin ! Notre cours collectif de sport est conçu pour vous offrir une expérience unique et stimulante, où le bien-être et la camaraderie sont au cœur de chaque séance.</p>
    </div>

    <a href="coachcoursco.php" class="droit-encadrement">
      <h2>Nathalie Brud</h2>
    </a>

    <img src="collec2.jpg" class="background-image">
  </main>
</body>
</html>