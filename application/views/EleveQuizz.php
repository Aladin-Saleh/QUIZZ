<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>

<!-- Cette page représente l'affichage des questions, des réponses et des images du Quizz. La page permet à l'utilisateur de répondre au quizz et valider ses réponses.-->

<head>
	<style>
		img{
			margin-left: 35px;
			
	</style>
</head>
<body onload="decompte();"> <!--Appel du script JavaScript-->

<div class="header">
<h1 align="center"><?php echo 'Bienvenue ' .$Eleve.' sur le Quizz '.'"'.$NomQuizz.'"';?></h1>

</div><br><br>
<div align="center" style="border: 1px solid #C82C3E; font-weight:bold;"><br>
<p> Validé vos réponses avant la fin du timing sinon vous perdez toutes vos données !!!!</p>
<p> Attention une mauvaise réponse vous fait perdre des points !</p>
</div>
<div style="position: fixed;" align="center" id="Temps"></div><br>
<hr style="height: 6px; color: #839D2D; background-color: #839D2D; width: 60%; border: none;">

<!--___________________________________________________________________________________________________________________________________________-->

<?php

/* Ici j'ai mit une partie php qui me permet de récuperer toutes les données nécessaires pour afficher le Quizz.*/

	

	$k=0;
	
	$ID_connect=$id;

	$nomQuizz = $NomQuizz;

	$nomCle = $cle;

 /*Les 3 boucles suivantes me permete de récuperer différents éléments de la table "Question","Quizz","Reponse".*/

	for($i=0;$i<= count($TableQuestion)-1;$i++){            														 

		if($nomQuizz == $TableQuestion[$i]['NomQuizz']){

		$question[]=$TableQuestion[$i]['Questions'];
		$numeroQuestion[] = $TableQuestion[$i]['Numéro'];
		$nombreRéponse[] = $TableQuestion[$i]['NombreRéponse'];
		$image[] = $TableQuestion[$i]['Image'];

		}
	}


	for($i=0;$i<= count($TableQuizz)-1;$i++){				

		if($nomQuizz == $TableQuizz[$i]['NOM']){
			$nombreQuestion=$TableQuizz[$i]['NombreQuestion'];
		}
	}


	for($j=0;$j<= count($TableReponse)-1;$j++){

		if($nomQuizz == $TableReponse[$j]['NomQuizz']){
			$Réponse[]= $TableReponse[$j]['Réponses'];
			$numeroRéponse[]= $TableReponse[$j]['Numéro'];

		}
	}
	
/*_________________________________________________________________________________________________________________________________*/


	for($i=0; $i < $nombreQuestion; $i++){

		/* La première partie de cette boucle affiche les questions et les images.*/

		$f = $i+1;
		?>
		<h3 align="center" style="text-decoration:underline;"> <?php echo $f.')  '.$question[$i]; ?></h3><br>
		<?php if($image[$i] != NULL){?>
		<div align="center" >
		<img src="<?php echo $image[$i] ?>"width="200">
		</div><br>
		<?php 
		}

		/*La deuxième partie de cette boucle permet l'affichage des réponses en fonction du numéro de la question.*/

		for($j=0; $j < $nombreRéponse[$i] ; $j++){
			
			if($numeroQuestion[$i] == $numeroRéponse[$k]){
		?>

		<form method="post" action="../EleveConnexion/resultat">
		 
			<div align="center">
			<label>
				
				<input type="checkbox" name="reponse[]" value="<?php echo $Réponse[$k] ?>" > <?php echo $Réponse[$k] ?></label>
			</div>
			<?php
			}
		$k=$k+1;
		}
	?>
	<hr style="height: 6px; color: #839D2D; background-color: #839D2D; width: 60%; border: none;"><?php
	} 

?>
	
<br>
	
<div align="center">
<input type="submit" name="Resultat" value="Acceder à vos résultat">
</div>
	
</form>

<div align="center">
	<?php 
		echo br(2);
	?>

<a href="../Eleve/index">Retour</a>
</div>

<!--_________________________________________________________________________________________________________________________________________________-->


<!-- Pour effectuer le timer j'ai utilisé du JavaScript. Ici le temps s'écoule en minute puis la dernière minute s'écoule en secondes. -->

<script type="text/javascript"> 

<?php $res = $time*60;?>
var total = <?php echo json_encode($time);?>;
var res = 59;
var x;
 
function decompte(){

    if(total>1){
    	
        document.getElementById("Temps").innerHTML ="Temps : " + total + " minutes";
        total-- ;
        x = setTimeout(decompte,60000) ;
    }else{

    	if(res >= 0){
    	document.getElementById("Temps").innerHTML = "Temps : " +res + " secondes";
        res-- ;
        z = setTimeout(decompte,1000) ;
    	}else{

    		
    		window.location.href = "../PageAccueil/";
        clearTimeout(z) ;
    	}

        clearTimeout(x) ;
    }
     
}

</script>

</body>
</html>