<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>
  <link rel="stylesheet" href="styles/compte.css">
  <script src="java.js"></script><style>
    header {
  height: 170px;
  }
  nav {
  width: 100%;
  height: 20px;
  }

  <style>

    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      text-align: center;
      padding-top: 100px;
    }

    h1 {
      color: navajowhite;
    }

    .choix {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  width: 15%;
  background-color: rgba(119, 160, 250, 0.8); /* couleur des proposition */
  padding: 10px;
  margin-top: 5px;
  margin-left: 550px;
  border-radius: 5px;
}

.choix ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.choix li {
  margin-bottom: 5px;
}

.choix a {
  display: block;
  color: #000000; /* couleur de lecriture des choix */
  text-decoration: none;
  padding: 5px;
  border-radius: 3px;
  background-color: #fff; /* couleur du fond des proposition */
}

.choix a:hover {
  background-color: #8fbcfc;  /* couleur du fond des proposition avec curseur */
}

.accueil2 {
  color: #000000;
  text-align: center;

  margin: 20px 200px;
}
  </style>
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
<div class=accueil2>
  <?php if(isset($_SESSION['Prenom'])) { ?>
    <h1>Bienvenue <?php echo $_SESSION['Prenom']; ?></h1>
<?php } else { ?>
    <h1>Bienvenue</h1>
<?php } ?>

<?php
// Outils de débogage pour afficher le contenu de la session print_r($_SESSION);

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['Type']) && $_SESSION['Type'] == 'Client') {
    // L'utilisateur est connecté en tant que client
    ?>
    <h2>Vous êtes client</h2>
<?php
} else if (isset($_SESSION['Type']) && $_SESSION['Type'] == 'Admin') {
    // L'utilisateur est connecté en tant qu'administrateur
    ?>
    <h2>Vous êtes administrateur</h2>
<?php
} else if (isset($_SESSION['Type']) && $_SESSION['Type'] == 'Personnel') {
    // L'utilisateur est connecté en tant que personnel de sport
    ?>
    <h2>Vous êtes personnel de sport</h2>
<?php
} else {
    // L'utilisateur n'est pas connecté
    ?>
    <h2>Vous n'êtes pas connecté</h2>
    <a href="connexion.php">Connectez-vous ici</a>
</div>
<?php
}
?>


  <footer>
    <!-- Votre pied de page existant -->
  </footer>
</body>
</html>
