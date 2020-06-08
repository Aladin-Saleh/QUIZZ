<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Menu Resultat</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Votre résultat</h1><br><br>
	</div>





<?php

echo $clePerso;

echo br(2);

echo 'Voici votre resultat !!! : '. $note.'%';


?>
<br>
<br>
<p>NB: Vous ne pouvez accéder à la note de votre quizz dès lors que le professeur l'aura rendu expiré.<br>Si il n'y a pas de note, essayer plus tard !</p>

<div align="center"><br><br>
<a href="../PageAccueil/">Retour</a>
</div>

</body>
</html>