<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
</head>

<body>
<div class="header">
<h1>Voici la liste de toutes les clefs du site </h1>
</div><br><br>

<div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6;"><br>
<?php
	$data=array();
	for($i=0;$i<= count($resultat)-1;$i++){
		$data[]='Auteur :  '.$resultat[$i]['Auteur']. '->   Nom du Test :  ' . $resultat[$i]['NOM']. '->   La clef pour efféctuer le Test : ' . $resultat[$i]['Clé'] ;
	}
		echo ul($data);
	?>
	</div>
	<div align="center">
		<?php 
			echo br(2);
			echo anchor('Eleve/index', 'Retour');
			
		?>
	</div>
</body>
</html>