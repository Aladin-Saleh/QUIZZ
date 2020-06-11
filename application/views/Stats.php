<!DOCTYPE html>
<html>
<head>
	<title>STATISTIQUES</title>
	<h1 align="center">LES STATS</h1>
</head>
<body>




	<?php
	$data=array();		
	for($i=0;$i<= count($resultat)-1;$i++){
		$data[]='Auteur :  '.$resultat[$i]['Auteur'].'. NOM :  '.$resultat[$i]['NOM'].'. CLE :  '.$resultat[$i]['Clé'] ;
	}

		echo ul ($data);

	?>

<div align="center">
	<form action="" method="post">
		
		<p>Pour consulter la moyenne d'un quizz, entrer sa clé :</p>
		<input type="text" name="cle" placeholder="Entrer la clé">
		<br>
		<input type="submit" name="subCle" value="CONSULTER LES STATS !">

	</form>
</div>

<div align="center">
	<form action="" method="post">
		<input type="submit" name="RETOUR" value="RETOUR">
	</form>
</div>


</body>
</html>