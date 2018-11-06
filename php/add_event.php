<?php
  if(isset($_POST)) {
		// on crée des variables plus sympas avec les données du formulaire
		$name         = $_POST['name'];
		$date   = $_POST['date'];
		$description  = $_POST['description'];
		$price        = $_POST['price'];

    //ON detecte les erreurs
		if (empty($name)) {
			$error = "Veuillez renseigner l'intitulé de l'événement !";
		}
		elseif (empty($date_event)) {
			$error = "Veuillez renseigner la date de l'événement !";
		}
		elseif (empty($description)) {
			$error = "Veuillez renseigner une descrption de l'événement !";
		}
		elseif (empty($price)) {
			$error = "Veuillez renseigner le prix de l'événement !";
		}

    //ON ajoute a la BDD
    include_once('db.php');

		if (empty($error)) {
			$sql = "INSERT INTO events
							VALUES (NULL, :name, :date, :description, :price, NOW())";

			$stmt = $conn->prepare($sql);
			$stmt->execute();

      //On, écupere le dernier ID enregistré dans la table
      $id = $conn->lastInsertId();
      echo 'DONE';
      var_dump($id);
      die();
      //On redirige vers la page du bon evenement

    }
}
