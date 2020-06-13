<!DOCTYPE html>
<html>
<head>
	<title>MODIFIER</title>
	<h1 align="center">MODIFICATION A EFFECTUER</h1>
</head>
<body>

	<?php
	$data=array();		
	for($i=0;$i<=count($resultat)-1;$i++){
		$data[]='Auteur :  '.$resultat[$i]['Auteur'].'. NOM :  '.$resultat[$i]['NOM'].'. CLE :  '.$resultat[$i]['Clé'] ;
	}

		echo ul ($data);

	?>

<div align="center">
	<form action="" method="post">
		<p>Entrer la clé du quizz que vous souhaitez modifier :</p>

		<input type="text" name="cle" placeholder="Entrer la clé !">
		<input type="submit" name="subCle" value="MODIFIER">


	</form>
</div>


<div align="center">
	<form action="" method="post">
		<p>Entrez la clé ici si vous souhaitez seulement changer le status du Quizz :</p>

		<input type="text" name="cleEx" placeholder="Entrer la clé !">
		<input type="submit" name="subCleExpire" value="DESACTIVER">


	</form>
</div>

<div align="center">
	<form action="" method="post">
		<p>Entrez la clé ici si vous souhaitez supprimer le quizz de manière définitive :</p>

		<input type="text" name="cleSupp" placeholder="Entrer la clé !">
		<input type="submit" name="subCleSuppr" value="SUPPRIMER">


	</form>
</div>

<div align="center">
	<form action="" method="post">
		<input type="submit" name="Retour" value="RETOUR">

	</form>
</div>

</body>
</html>