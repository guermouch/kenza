<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscrisez-vous sur Sportify</title>
  <script src="java.js"></script><style>
    header {
  height: 170px;
  }
  nav {
  width: 100%;
  height: 20px;
  }
  </style>
  <style>

.logo {
  display: block;
  margin-left: 685px;
  width: 9%; /* Réduit la largeur du logo de 20% */
  border-radius: 20px;
}

.logo:hover {
  transform: scale(0.98); /* Augmentation de la taille lorsque le logo est survolé */
}

body {
  background-image:url('https://cdn.pixabay.com/photo/2021/03/11/02/57/mountain-6086083_1280.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  margin-top: 40px; /* Ajout d'une marge en haut du corps pour éviter le chevauchement avec l'en-tête */
}

.login-form {
  max-width: 400px;
  margin: 50px auto;
  background-color: #000C1A;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.login-form input[type="text"],
.login-form input[type="email"],
.login-form input[type="password"] {
  width: 94%;
  padding: 12px;
  margin-bottom: 20px;
  border: 0px solid #ccc;
  border-radius: 20px;
}

.login-form input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: #fff;
  padding: 12px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}   
 //survoler le bouton changement de couleur
.login-form input[type="submit"]:hover {
  background-color: #45a049;
}

.login-form .error-message {
  color: #ff0000;
  margin-bottom: 10px;
}


  </style>
</head>
<body>
  <!-- Contenu de la page de compte -->
  <a href="index.php">
    <img src="logo.jpg" alt="Logo" class="logo">
 </a> 
  <div class="login-form">
    <h2 style='color: white;'>Connexion</h2>
    <form action="traitementConnexion.php" method="post">
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
    <p style='color: white;'>Vous n'avez pas de compte? <a href="inscriptionClient.php">Inscrivez-vous ici</a></p>
  </div>

  <footer>
    <!-- Votre pied de page existant -->
  </footer>
</body>
</html>

