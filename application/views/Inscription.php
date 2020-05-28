<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">



<html>
<head>
	<title>Inscription</title>
	<h2 align="center">Inscription</h2>
</head>
<body>



<div align="center">
	<form method="post" action="">
		<label for="prenom">Prénom</label> <br>
			<input type="text" name="Prenom" id="prenom" placeholder="Entrez votre prenom !" value="<?php if(isset($name)){ echo $name; }?>">
			<br>
		<label for="mail">Email</label><br>
			<input type="email" id="mail" name="mail" placeholder="Entrez votre email !" value="<?php if(isset($addr_mail)){ echo $addr_mail;} ?>">
			<br>
		<label for="mdp">Mot de passe</label><br>
			<input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe !" maxlength="30" minlength="8"><br>

			<input type="submit" name="subInsciption" value="S'inscrire ! ">
	</form>
</div>

<div align="center">
	<a href="/QUIZZ/index.php/PageAccueil/">Retour</a>
</div>

</body>


</html>