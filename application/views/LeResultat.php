<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Menu Stat</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Génération de clé</h1><br><br>
	</div>

	<p> <?php echo $eleve ?> voici votre clé personnel, veuiller la garder en attendant l'éxpiration du Quizz. Ensuite dirigé vous vers le Menu d'Acceuil aller dans "Résultat" et rentré votre clé peronnel pour voir votre score. </p>

<?php


/*$r = array();
for($i=0;$i<= count($TableEleve)-1;$i++){

		if($TableEleve[$i]['Nom'] == $eleve && $TableEleve[$i]['Clé'] == $cle){

		$r = $TableEleve[$i]['CléPerso'];
		}
	}

	echo $r;*/
	echo "<h1>".$Resultat. "</h1>";
	echo 'nombre de bonne reponse totale : '. $oui;
	echo ul($RealAns);
	echo br(2);

	echo 'nombre de Bonne réponse Utilisateur : '. $Remi;
	echo ul($essaie);

	echo br();
	echo 'Voici le pourcentage de bonne réponses : '. $res.'%';

?>

<div align="center">
<?php
echo br(3);
?>
<a href="../PageAccueil/">Retour vers le Menu Acceuil</a>
</div>
</body>
</html>