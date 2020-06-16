<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>

<!-- Cette page permet à l'élève de voir les bonnes réponses disponible et de voir sa clé presonnel-->

<head>
	<title>Menu Stat</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Génération de clé</h1><br><br>
	</div>

	<p> <?php echo $eleve ?> voici votre clef personnelle, gardé la précieusement en attendant l'expiration du Quizz. Ensuite dirigez vous vers le Menu d'Acceuil, allé dans "Résultat" et rentré votre clef peronnelle pour voir votre score. </p>

	<?php

		echo "<h1>".$Resultat. "</h1>";
	?>

	<div align="center">
	<?php
	echo br(3);
	?>
	<a href="../PageAccueil/">Retour vers le Menu Acceuil</a>
	</div>
	
</body>
</html>