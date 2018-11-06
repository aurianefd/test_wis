<?php

$title = 'Accueil';
$description = ' ';

 ?>

 <?php include_once('layouts/header.php'); ?>


 <?php
 	require("php/db.php");
 	session_start();

 	$error = "";

 	// si le formulaire est soumis...
 	if (!empty($_POST)) {

 		$email = $_POST["email"];
 		$password = $_POST["password"];

 		//on va chercher le member en bdd en fonction de son Email
 		$sql = "SELECT *
 						FROM members
 						WHERE email = :email";

 		$stmt = $conn->prepare($sql);
 		$stmt->bindValue(":email", $email);
 		$stmt->execute();
 		$member = $stmt->fetch();

 		//si on a trouvé un résultat...
 		if (!empty($member)){
 				// on vérifie son mot de passe
 				$passwordIsOk = password_verify($password, $member['password']);

 				// si le mdp est le bon...
 				if ($passwordIsOk){
 					// on connecte le member
 					session_start();
 					$_SESSION['member'] = $member;
 				}
 				else {
 					$error = "Mauvais identifiants 1";
 				}

 		}
 		else {
 			$error = "Mauvais identifiants 2";
 		}
 	}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Connexion | Le Forum</title>
 	<meta name="viewport" content="width=device-width">
 	<link href="https://fonts.googleapis.com/css?family=Kodchasan:400,400i,700" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css">
 	<link rel="icon" href="img/favicon.png">
 </head>
 <body>
 	<div class="container">


 		<main>
 			<h1>Connexion</h1>
 			<form method="post">
 				<div>
 					<label for="email">Email</label>
 					<input type="email" name="email" id="email">
 				</div>
 				<div>
 					<label for="password">Mot de passe</label>
 					<input type="password" name="password" id="password">
 				</div>
 				<div>
 					<div class="error"><?php echo $error; ?></div>
 					<label></label>
 					<button type="submit">Go !</button>
 				</div>
 			</form>
 		</main>



<?php include_once('layouts/footer.php'); ?>
