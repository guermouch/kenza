<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscrivez-vous sur Sportify</title>
  <script src="java.js"></script>
  <style>
    /* Your styles here */
    body {
      background-color: #000C1A;
      color: white;
    }

    .login-form {
      margin: 50px auto;
      padding: 20px;
      width: 300px;
      background-color: #fff;
      border-radius: 5px;
      text-align: center;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .login-form input[type="submit"] {
      background-color: #000C1A;
      color: white;
      cursor: pointer;
    }

    .error-message {
      color: red;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h2>Inscrivez-vous sur Sportify</h2>
    <form action="traitementi.php" method="post">
      <div>
        <input type="email" id="Email" name="Email" placeholder="Email" required>
      </div>
      <div>
        <input type="password" id="password" name="password" placeholder="Mot de passe" required>
      </div>
      <div>
        <input type="text" id="Nom" name="Nom" placeholder="Nom" required>
      </div>
      <div>
        <input type="text" id="Prenom" name="Prenom" placeholder="Prénom" required>
      </div>
      <div>
        <input type="text" id="Adresse" name="Adresse" placeholder="Adresse" required>
      </div>
      <div>
        <input type="submit" value="Créer un compte">
      </div>
    </form>
    <div class="error-message"><?php if(isset($_GET['error'])) { echo $_GET['error']; } ?></div>
    <p>Vous avez déjà un compte ? <a href="connexion2.php">Se connecter</a></p>
  </div>

  <footer>
    <!-- Your existing footer content -->
  </footer>
</body>
</html>
