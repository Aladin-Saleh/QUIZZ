
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	


</head>

<body onload="decompte();">

<div class="header">
<h1 align="center"><?php echo 'Bienvenue ' .$Eleve.' sur le Quizz '.'"'.$NomQuizz.'"';?></h1>

</div><br><br>
<div id="Temps"></div>

<!-- Cette page est l'affiche du Quizz donc affichage des questions,réponses. La page permet à l'utilisateur de répondre au quizz et valider ses réponses-->

<?php

	

	$k=0;
	
	$ID_connect=$id;

	$nomQuizz = $NomQuizz;

	$nomCle = $cle;
 /*Cette première boucle permet de récuperer les questions de la db et uniquement les questions qui possède le même "ID"*/

	for($i=0;$i<= count($TableQuestion)-1;$i++){            														 

		if($nomQuizz == $TableQuestion[$i]['NomQuizz']){

		$question[]=$TableQuestion[$i]['Questions'];
		$numeroQuestion[] = $TableQuestion[$i]['Numéro'];
		$nombreRéponse[] = $TableQuestion[$i]['NombreRéponse'];

		}
	}


	for($i=0;$i<= count($TableQuizz)-1;$i++){				/*Ici la boucle récupère le nombre de question choisit par l'utilisateur*/

		if($nomQuizz == $TableQuizz[$i]['NOM']){
			$nombreQuestion=$TableQuizz[$i]['NombreQuestion'];
		}
	}


	for($j=0;$j<= count($TableReponse)-1;$j++){

		//$nomQuizz == $TableReponse[$j]['NomQuizz']
		if($nomQuizz == $TableReponse[$j]['NomQuizz']){
			$Réponse[]= $TableReponse[$j]['Réponses'];
			$numeroRéponse[]= $TableReponse[$j]['Numéro'];

		}
	}
	


/*Ici la boucle permet d'afficher les questions et réponses dans la page*/
	for($i=0; $i < $nombreQuestion; $i++){
		?>
		<h3 align="center" style="border: 1px solid #C82C3E; padding: 3px; background-color: #22C671;"> <?php echo $question[$i]?></h3><br>

	<?php
		
		for($j=0; $j < $nombreRéponse[$i] ; $j++){
			
			if($numeroQuestion[$i] == $numeroRéponse[$k]){
		?>

		<form method="post" action="../EleveConnexion/resultat">
		<fieldset>
			<div align="center">
			<label>
				
				<input type="checkbox" name="reponse[]" value="<?php echo $Réponse[$k] ?>" > <?php echo $Réponse[$k] ?></label>
			</div>
			


	<?php
	}
	$k=$k+1;
	}
	
	} 

?>
	<hr><br>
	
	<div align="center">
	<input type="submit" name="Resultat" value="Acceder à vos résultat">
	</div>
	</fieldset>
	</form>

	<div align="center">
		<?php 
			echo br(2);
			
		?>
		<a href="../Eleve/index">Retour</a>
	</div>


	<script type="text/javascript"> 

<?php $res = $time*60;?>
var total = <?php echo json_encode($time);?>;
var res = 59;
var x ;
 
function decompte()
{
    if(total>1)
    {
    	
        document.getElementById("Temps").innerHTML = "Il vous reste " + total + " minutes";
        total-- ;
        x = setTimeout(decompte,60000) ;
    }
    else
    {
    	if(res >= 0){
    	document.getElementById("Temps").innerHTML = "Il vous reste " + res + " secondes";
        res-- ;
        z = setTimeout(decompte,1000) ;
    	}else{

    		//document.write("Il fallait valider votre Quizz !!!!");
    		window.location.href = "../PageAccueil/";
        clearTimeout(z) ;
    	}

        clearTimeout(x) ;
    }
     
}

</script>

</body>
</html>