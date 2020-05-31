<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
</head>

<body>
<div class="header">
<h1>Votre Quizz</h1>
</div><br><br>

<!-- Cette page est l'affiche du Quizz donc affichage des questions,réponses. La page permet à l'utilisateur de répondre au quizz et valider ses réponses-->

<?php
	
	$ID_connect=54;

	for($i=0;$i<= count($resultat)-1;$i++){            /*Cette première boucle permet de récuperer les questions de la db et uniquement les questions qui possède le 														 même "ID"*/

		if($ID_connect == $resultat[$i]['ID']){
		$data[]=$resultat[$i]['Questions'];
		}
	}

	for($i=0;$i<= count($nombre)-1;$i++){				/*Ici la boucle récupère le nombre de question choisit par l'utilisateur*/

		if($ID_connect == $nombre[$i]['ID']){
			$data2=$nombre[$i]['NombreQuestion'];
		}
	}
		
	/*Ici la boucle permet d'afficher les questions et réponses dans la page*/
	for($i=0; $i < $data2; $i++){
		?><h3 align="center" style="border: 1px solid #C82C3E; padding: 3px; background-color: #22C671;"> <?php echo $data[$i]?></h3> 
		<form>
		<fieldset>

			<label>
				<input type="radio" name="reponse<?php $i+1 ?>"> Oui</label>
			<label>
				<input type="radio" name="reponse<?php $i+1 ?>"> Non</label><br><br><br>
			


	<?php } ?>
	
	<div align="center">
	<button type="submit">Envoyé</button>
	</div>
	</fieldset>
	</form>
	<div align="center">
		<?php 
			echo br(2);
			echo anchor('Eleve/index', 'Retour');
			
		?>
	</div>
</body>
</html>