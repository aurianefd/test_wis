
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include_once('layouts/head.php'); ?>
     <link rel="stylesheet" href="css/style.css">
  </head>

<?php include_once('layouts/javascript.php'); ?>

<body>

<footer>
  <p>Aura Events | <?php echo date("Y") ?></p>
  <p>
    <?php
      if (empty($_SESSION['member'])) {
        echo "Vous n'êtes pas connecté !";
      }
      else {
        echo "Vous êtes connecté en tant que " . $_SESSION['member']['username'];
      }
     ?>
  </p>
  <nav>
    <a href="accueil.php">Accueil</a>
    <a href="inscription.php">Inscription</a>
    <a href="connexion.php">Connexion</a>
    <a href="logout.php">Déconnexion</a>
  </nav>
</footer>
</div>
</body>
</html>
