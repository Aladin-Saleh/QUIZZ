<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">

<!-- La page affiche le menu qui permet à l'utilisateur de rentrer une clé et ainsi accéder à son Quizz-->

<html>
<head>
	<title>Menu clef</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Entrer une clef</h1><br><br>
	</div>


<div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6;">
<div align="center"><br><br>
	<form method="post" action="../Eleve/essaie">
		<input type="text" name="nameCle" id="clef" placeholder="Entrez la clef !" value="<?php if(isset($name)){ echo $name; }?>">
		
			<br>
		<input type="submit" name="Valide" value="Validé !">
		
		</form>
	</div>
	

<div align="center">


<?php 
echo anchor('Eleve/listerunetable', 'Liste des clefs à disposition dans ce site');
echo br(2);
?>
</div>
</div>

<div align="center">
<?php
echo br(3);
echo anchor('PageAccueil/', 'Retour');
?>
</div>

</body>
</html>
