<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>

  <script src="java.js"></script>
  <style>
    /* Ajoutez vos styles CSS ici */
  </style>
</head>
<body>
  <!-- Contenu de la page de compte -->
  <header>
    <nav>
      <ul>
        <?php
          // Démarrez la session
          session_start();

          // Vérifiez si l'utilisateur est connecté
          if (isset($_SESSION['Email'])) {
            // L'utilisateur est connecté
            echo '<li><a href="deconnexion2.php">Déconnexion</a></li>';
          } else {
            // L'utilisateur n'est pas connecté
            echo '<li><a href="connexion2.php">Connexion</a></li>';
            echo '<li><a href="c2.php">Inscription</a></li>';
          }
        ?>
      </ul>
    </nav>
  </header>

  <div class="login-form">
    <h2>Connexion à votre compte</h2>
    <form action="traitementc.php" method="post">
      <div>
        <input type="text" id="Nom" name="Nom" placeholder="Nom" required>
      </div>
      <div>
        <input type="text" id="Prenom" name="Prenom" placeholder="Prenom" required>
      </div>
      <div>
        <input type="text" id="Courriel" name="Courriel" placeholder="Courriel" required>
      </div>
      <div>
        <input type="password" id="Password" name="Password" placeholder="Password" required>
      </div>
      <div>
        <input type="submit" value="Se connecter">
      </div>
    </form>
    <div class="error-message"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></div>
  </div>

  <footer>
    <!-- Votre pied de page existant -->
  </footer>
</body>
</html>
