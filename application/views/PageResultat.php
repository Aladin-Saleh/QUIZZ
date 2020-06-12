<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<!-- Ici l'utilisateur peux voir son résultat-->
<head>
	<title>Menu Resultat</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Votre résultat</h1><br><br>
	</div>

	<?php

	echo 'Bienvenue '.$nom.' !';

	echo br(2);

	echo 'Voici votre pourcentage de bonnes réponses : '. $note.'%';
	echo br();

	echo 'Votre nombre de fautes : '.$MauvaiseRep;

	echo br(2);
	echo 'Voici votre note final sur ce Quizz : '. $NoteF.'%';


	?>
	<br>
	<br>


	<div align="center"><br><br>
	<a href="../PageAccueil/">Retour</a>
	</div>

</body>
</html>