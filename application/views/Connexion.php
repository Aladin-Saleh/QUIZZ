<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Connexion</title>
	
</head>
<body>

<div class="header">
<h1 align="center">Connexion</h1>
</div><br><br>

<div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6;">
<div align="center"><br>
	<form method="POST" action="">
		<label for="mail">Email</label><br>
			<input type="email" id="mail" name="mailCon" placeholder="Entrez votre email !" value="<?php if(isset($addr_mail)){ echo $addr_mail;} ?>">
			<br>
		
		<label for="mdp">Mot de passe</label><br>
			<input type="password" id="mdp" name="mdpCon" placeholder="Entrez votre mot de passe !" maxlength="30" minlength="8"><br>

			<input type="submit" name="subConn" value="Se connecter ! ">
	</form>
</div>
</div>

<div align="center"><br>
	<form action="" method="post">
		<input type="submit" name="Retour" value="RETOUR">
	</form>
</div>
</body>


</html>