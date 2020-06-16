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
	echo br(3);
	echo "<hr>";
	

	echo "<h2>".'Resultat sans prise en compte des fautes : '."</h2>";
	echo br();
	echo 'Voici votre pourcentage de bonnes réponses : '. $note.'%';
	echo br();
	echo 'La note est : '. $BonneRep.'/'.$nombreQuestion;
	echo br(3);

	echo "<hr>";
	echo "<h2>".'Resultat avec prise en compte des fautes : '."</h2>";
	echo br();
	echo 'Votre nombre de fautes : '.$MauvaiseRep;

	echo br(2);

	?>
	<div align="center" style="border: 1px solid #C82C3E; font-weight:bold;"><?php
	echo 'Voici votre pourcentage final sur ce Quizz : '. $NoteF.'%';
	echo br();

	echo 'et votre note final : '.$noteE.'/'.$nombreQuestion;

	?>
	</div>
	<br>
	<br>


	<div align="center"><br><br>
	<a href="../PageAccueil/">Retour</a>
	</div>

</body>
</html>