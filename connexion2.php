<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscrisez-vous sur Sportify</title>
  <script src="java.js"></script><style>

  </style>
</head>
<body>
  <!-- Contenu de la page de compte -->

   <a href="index.html">Accueil</a>

  <div class="login-form">
    <h2 style='color: white;'>Connexion</h2>
    <form action="traitementc.php" method="post">
      <div>  
        <input type="text" id="Email" name="Email" placeholder="Email" required>
      </div>
      <div>
        <input type="password" id="password" name="password" placeholder="password" required>
      </div>
      <div>
        <input type="submit" value="Se connecter" style='color: #000C1A;'>
      </div>
    </form>
    <div class="error-message"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></div>
    <p style='color: white;'>Vous n'avez pas de compte? <a href="c2.php">Inscrivez-vous ici</a></p>
  </div>

  <footer>
    <!-- Votre pied de page existant -->
  </footer>
</body>
</html>

