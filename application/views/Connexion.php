<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Connexion</title>
	<h2 align="center">Connexion</h2>
</head>
<body>




<div align="center">
	<form method="POST" action="">
		<label for="mail">Email</label><br>
			<input type="email" id="mail" name="mailCon" placeholder="Entrez votre email !" value="<?php if(isset($addr_mail)){ echo $addr_mail;} ?>">
			<br>
		
		<label for="mdp">Mot de passe</label><br>
			<input type="password" id="mdp" name="mdpCon" placeholder="Entrez votre mot de passe !" maxlength="30" minlength="8"><br>

			<input type="submit" name="subConn" value="Se connecter ! ">
	</form>
</div>
<div align="center">
	<a href="/QUIZZ/index.php/PageAccueil/">Retour</a>
</div>
</body>


</html>