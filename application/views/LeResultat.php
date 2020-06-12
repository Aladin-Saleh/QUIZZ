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

	<p> <?php echo $eleve ?> voici votre clé personnel, veuiller la garder en attendant l'éxpiration du Quizz. Ensuite dirigé vous vers le Menu d'Acceuil aller dans "Résultat" et rentré votre clé peronnel pour voir votre score. </p>

<?php

	echo "<h1>".$Resultat. "</h1>";

	echo 'nombre de bonne reponse totale : '. $oui;
	echo ul($RealAns);
	echo br(2);

	echo 'nombre de Bonne réponse Utilisateur : '. $Remi;
	echo ul($essaie);

	echo br();
	echo 'Voici le pourcentage de bonne réponses : '. $res.'%';
	echo br();

	echo 'Voici le nombre de mauvaise réponse : '. $mauvaiseRep;
	echo br();
	echo 'Voici votre note : '. $note.'/'.$nombreQuestion;
?>

<div align="center">
<?php
echo br(3);
?>
<a href="../ELeve/result"> Accéder directement à votre résultat</a><br><br>
<a href="../PageAccueil/">Retour vers le Menu Acceuil</a>
</div>
</body>
</html>