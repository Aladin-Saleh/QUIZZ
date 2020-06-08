<!DOCTYPE html>
<html>
<head>
	<title>MODIFIER</title>
	<h1 align="center">SELECTION DES QUIZZ A MODIFIER</h1>
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
		<input type="submit" name="subCle">


	</form>
</div>


<div align="center">
	<form action="" method="post">
		<p>Entrez la clé ici si vous souhaitez seulement changer le status du Quizz :</p>

		<input type="text" name="cleEx" placeholder="Entrer la clé !">
		<input type="submit" name="subCleExpire">


	</form>
</div>

</body>
</html>