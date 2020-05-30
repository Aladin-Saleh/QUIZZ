
<div class="header">
<h1>Voici la liste de toutes les clefs du site </h1>
</div><br><br><br>
	<?php
	$data=array();
	for($i=0;$i<= count($resultat)-1;$i++){
		$data[]='Auteur :  '.$resultat[$i]['Auteur']. '->   Nom du Test :  ' . $resultat[$i]['NOM']. '->   La clef pour efféctuer le Test : ' . $resultat[$i]['Clé'] ;
	}
		echo ul($data);
	?>

	<div align="center">
		<?php 
			echo br(2);
			echo anchor('Eleve/index', 'Retour');
			
		?>
	</div>