<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Connexion</title>
	<h2 align="center">Connexion</h2>
</head>
<body>

<div align="center">
	<form method="POST" action="Quizz">
		<label for="prenom">Prénom</label> <br>
			<input type="text" name="Prenom" id="prenom" placeholder="Entrez votre prenom !" value="<?php if(isset($name)){ echo $name; }?>">
			<br>
		
		<label for="mdp">Mot de passe</label><br>
			<input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe !" maxlength="30" minlength="8"><br>

			<input type="submit" name="subInsciption" value="Se connecter ! ">
	</form>
</div>

</body>


</html>