<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
</head>

<body>
<div class="header">
<<<<<<< HEAD
<h1 align="center">Votre Quizz</h1>
=======
<h1>Votre Quizz</h1>
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
</div><br><br>

<!-- Cette page est l'affiche du Quizz donc affichage des questions,réponses. La page permet à l'utilisateur de répondre au quizz et valider ses réponses-->

<?php
<<<<<<< HEAD

	$k=0;
	
	$ID_connect=54;
 /*Cette première boucle permet de récuperer les questions de la db et uniquement les questions qui possède le même "ID"*/

	for($i=0;$i<= count($TableQuestion)-1;$i++){            														 

		if($ID_connect == $TableQuestion[$i]['ID']){

		$question[]=$TableQuestion[$i]['Questions'];
		$numeroQuestion[] = $TableQuestion[$i]['Numéro'];
		$nombreRéponse[] = $TableQuestion[$i]['NombreRéponse'];

=======
	
	$ID_connect=54;

	for($i=0;$i<= count($resultat)-1;$i++){            /*Cette première boucle permet de récuperer les questions de la db et uniquement les questions qui possède le 														 même "ID"*/

		if($ID_connect == $resultat[$i]['ID']){
		$data[]=$resultat[$i]['Questions'];
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
		}
	}

	for($i=0;$i<= count($nombre)-1;$i++){				/*Ici la boucle récupère le nombre de question choisit par l'utilisateur*/

		if($ID_connect == $nombre[$i]['ID']){
<<<<<<< HEAD
			$nombreQuestion=$nombre[$i]['NombreQuestion'];
		}
	}


	for($j=0;$j<= count($Reponse)-1;$j++){

		if($ID_connect == $Reponse[$j]['ID']){
			$Réponse[]= $Reponse[$j]['Réponses'];
			$numeroRéponse[]= $Reponse[$j]['Numéro'];

		}
	}

	/*echo ul($numeroRéponse);
	echo br();
	echo ul($numeroQuestion);
	echo br();
	echo ul($nombreRéponse);
	echo ul($Réponse);*/

/*Ici la boucle permet d'afficher les questions et réponses dans la page*/
	for($i=0; $i < $nombreQuestion; $i++){
		?><h3 align="center" style="border: 1px solid #C82C3E; padding: 3px; background-color: #22C671;"> <?php echo $question[$i]?></h3><br>

	<?php

		for($j=0; $j < $nombreRéponse[$i] ; $j++){
			
			if($numeroQuestion[$i] == $numeroRéponse[$k]){
		?>

		<form>
		<fieldset>
			<div align="center">
			<label>
				<input type="checkbox" name="reponse"> <?php echo $Réponse[$k] ?></label>
			</div>
			


	<?php
	}
	$k=$k+1;
	}
	
	} 

?>
	<hr><br>
=======
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
	
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
	<div align="center">
	<button type="submit">Envoyé</button>
	</div>
	</fieldset>
	</form>
<<<<<<< HEAD

=======
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
	<div align="center">
		<?php 
			echo br(2);
			echo anchor('Eleve/index', 'Retour');
			
		?>
	</div>
<<<<<<< HEAD

=======
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
</body>
</html>