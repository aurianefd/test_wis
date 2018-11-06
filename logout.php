<?php

//on va utiliser la variable de session...
session_start();
//détruit juste la partie de la session qui concerne le member
unset($_SESSION['member']);
//ou on détruit tout
session_destroy();

//on redirige vers l'accueil
header("Location : accueil.php");

 ?>

  <?php include_once('layouts/header.php'); ?>

  <main>

    CONTENU

  </main>

  <?php include_once('layouts/footer.php'); ?>
