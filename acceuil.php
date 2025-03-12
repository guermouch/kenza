<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>Sportify - Accueil</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  

  <script src="https://malsup.github.io/jquery.cycle2.js"></script>



  <script src="java.js"></script>
  
 

  <link rel="stylesheet" href="styles/accueil.css">
  <script type="text/javascript">
    $(document).ready(function() {
      $('.cycle-slideshow').cycle();
      $('.coach_info').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        var $name = $(incomingSlideEl).find('.specialist-name').text();
        var $speciality = $(incomingSlideEl).find('.specialist-speciality').text();

        $('#current-specialist-name').text($name);
        $('#current-specialist-speciality').text($speciality);
      });
    });
  </script>
  
  <style>
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
    <h1>Sportify</h1>
    <p>Un endroit ou tout le monde à une passion commune : le sport ! </p>
    <p>Vous avez besoin d'aide dans un domaine sportif ? n'hesitez pas à prendre rendez-vous avec nos coach !</p>
    <p>Vous avez besoin de conseils ? nos experts sont la pour vous aider !</p>
    <p>Nous avous mis à votre disposition un chat en temps réel avec nos specialistes pour vous aider à tout moment de la journée dans votre sport ! </p>
</section>

  <section class="evenement1">
    <div> 
      <h3> Championnats de natation THE ROCK pour gerer la musique ! </h3>
      <p>Date : 10 JAN 2024</p>
      <p>Heure : 17h-22h</p>
      <p>Lieu : Paris 15ème</p>
    </div>
    <div class="event-image">
      <img src="evenement.jpg" alt="evenement Sportify">
    </div>
    <div class="event-cta">
      <a href="InscriptionEvenement.php">S'inscrire à l'evenement</a>
    </div>
  </section>

  <section class="accueil2">

  <section class="coachspe">
    <h2>Sportify Coach </h2>
    <div class="cycle-slideshow" data-cycle-slides="li">
      <ul>
        <li>
          <img src="allan.jpg" alt="Spécialiste 1" height="350" width="310" />
          <div class="coach_info">
            <h3 class="specialist-name">Allan Charpentier</h3>
            <p class="specialist-speciality">Spécialité : Musculation</p>
          </div>
        </li>
        <li>
          <img src="corentin.jpg" alt="Spécialiste 2" height="700" width="660" />
          <div class="coach_info">
            <h3 class="specialist-name">Corentin Saboul</h3>
            <p class="specialist-speciality">Spécialité : Fitness</p>
          </div>
        </li>
        <li>
          <img src="andrea.jpg" alt="Spécialiste 3" height="300" width="300" />
          <div class="coach_info">
            <h3 class="specialist-name">Andrea Mellion</h3>
            <p class="specialist-speciality">Spécialité : Biking</p>
          </div>
        </li>
        
      </ul>
    </div>
  </section>
    </section>


  <footer>
    <div class="contact-info">
      <div>
        <h3>INFO</h3>
        <p>Email : sportify.ECE@gmail.com</p>
        <p>Téléphone : +33 9 10 30 50 49</p>
        <p>Adresse : 10 Rue Sextius Michel, 75015 Paris</p>
    </div>
  </footer>
</body>
</html>
