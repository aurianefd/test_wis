<?php

$title = 'Inscription';
$description = ' ';

 ?>

 <?php include_once('layouts/header.php'); ?>



 <?php
	require("php/db.php");
	session_start();

	$error = "";

  if (!empty($_POST)) {
		// on crée des variables plus sympas avec les données du formulaire
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordBis = $_POST['password_bis'];

		if (empty($username)) {
			$error = "Veuillez renseigner votre pseudo !";
		}
		elseif (empty($email)) {
			$error = "Veuillez renseigner votre email !";
		}
		elseif (empty($password)) {
			$error = "Veuillez renseigner votre mot de passe !";
		}
		elseif (empty($passwordBis)) {
			$error = "Veuillez confirmer votre email !";
		}

		//longueur pseudo ok ?
		if (strlen($username) < 2 || strlen($username) > 20) {
			$error = "Votre pseudo doit avoir entre 2 et 20 caractères !";
		}

		//email valide ?
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Votre email n'est pas valide !";
		}

		// les 2 mdp correspondent ?
		if ($password != $passwordBis) {
			$error = "Vos mots de passe ne correspondent pas !";
		}

		//si le formulaire est valide...
		if (empty($error)) {
			$sql = "INSERT INTO members
							VALUES (NULL, :username, :email, :password, NOW())";

			$stmt = $conn->prepare($sql);
			$stmt->bindvalue(":username", $username);
			$stmt->bindvalue(":email", $email);

			// on hash le mot de passe
			// algo par defaut : bcrypt
			$password = password_hash($password, PASSWORD_DEFAULT, [
				'cost' => 15
			]);

			$stmt->bindvalue(":password", $password);
			$stmt->execute();


		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inscription | Le Forum</title>
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css?family=Kodchasan:400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="favicon.png">
</head>
<body>
	<div class="container">


		<main>
			<h1>Inscription</h1>
			<form method="post">
				<div>
					<label for="username">Pseudo</label>
					<input type="text" name="username" id="username">
				</div>
				<div>
					<label for="email">Email</label>
					<input type="email" name="email" id="email">
				</div>
				<div>
					<label for="password">Mot de passe</label>
					<input type="password" name="password" id="password">
				</div>
				<div>
					<label for="password_bis">Confirmez</label>
					<input type="password" name="password_bis" id="password_bis">
				</div>
				<div>

					<div class="error"><?php echo $error; ?></div>

					<label></label>
					<button type="submit">Go !</button>
				</div>
			</form>
		</main>

<?php include_once('layouts/footer.php'); ?>
