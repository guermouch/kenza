<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Compte - Sportify</title>
  <link rel="stylesheet" href="styles/accueil.css">
 

  <script src="java.js"></script><style>
    header {
  height: 170px;
  }
  nav {
  width: 100%;
  height: 20px;
  }
  </style>
</head>
<body>
  <!-- Contenu de la page salle de sport  -->
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
  
  <section class="accueil2">
    <h1>L'alimentation & nutrition</h1>
        <img src="Alimentation.jpg">

    <p>
    Maintenir une bonne alimentation est essentiel pour promouvoir une santé optimale et un bien-être général. Les choix alimentaires jouent un rôle crucial dans la fourniture des nutriments nécessaires à la croissance, à la réparation des tissus et au bon fonctionnement du corps. Une alimentation équilibrée, riche en fruits, légumes, protéines maigres, grains entiers et sources de gras sains, fournit l'énergie nécessaire pour soutenir les activités quotidiennes. En plus de nourrir le corps, une alimentation équilibrée contribue à maintenir un poids corporel sain, à réguler la glycémie et à réduire le risque de nombreuses maladies chroniques telles que les maladies cardiovasculaires et le diabète. Une nutrition adéquate a également un impact positif sur la santé mentale, favorisant la concentration, la clarté mentale et une meilleure régulation de l'humeur. En résumé, adopter une bonne alimentation est un investissement précieux dans notre santé globale, contribuant à une vie plus énergique, résiliente et équilibrée.
    </p>
    
  </section>
  

<footer>

  <div class="contact-info">
    <div class="contact-details">
      <h3>Contactez-nous</h3>
      <p>Email : sportify.ECE@gmail.com</p>
      <p>Téléphone : +33 9 10 30 50 49</p>
      <p>Adresse : 10 Rue Sextius Michel, 75015 Paris</p>
    </div>
     
  </div>
</footer>


</body>
</html>