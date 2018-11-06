<?php
$title = 'Evénements | Aura Events';
$description = ' ';
 ?>

 <?php include_once('layouts/header.php'); ?>

 <?php require("php/db.php"); ?>

<div class="container mt-5">
  <main>

<form method="POST" action="php/add_event.php">
  <div>
    <label for="username">Intitulé</label>
    <input class="form-control" type="text" name="name" id="name">
  </div>
  <div>
    <label for="username">Date</label>
    <input class="form-control" type="date" name="date" id="date">
  </div>
  <div>
    <label for="username">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  <div>
    <label for="username">Prix</label>
    <input class="form-control" type="text" name="price" id="price">
  </div>
  <br>
  <div>
    <button class="btn btn-primary" type="submit">Soumettre</button>
  </div>
</form>

  </main>


  <?php include_once('layouts/footer.php'); ?>
