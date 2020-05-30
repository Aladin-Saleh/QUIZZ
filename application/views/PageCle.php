<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">



<html>
<head>
	<title>Menu clef</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Entrer une clef</h1><br><br>
	</div>



<div align="center">
	<form method="POST" action="">
		<input type="text" name="clef" id="clef" placeholder="Entrez la clef !" value="<?php if(isset($name)){ echo $name; }?>">
		
			<br>
		<input type="submit" name="Valide" value="Validé !">
		
		</form>
	</div>
	

<div align="center">


<?php 
echo anchor('Eleve/listerunetable', 'Liste des clefs à disposition dans ce site');
echo br(3);
echo anchor('PageAccueil/', 'Retour');
echo br(3);

?>

