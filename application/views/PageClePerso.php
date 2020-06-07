<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<html>
<head>
	<title>Menu Resultat</title>
	
</head>
<body>

	<div class="header">
		<h1 align="center">Entré votre clé personnel </h1><br><br>
	</div>

	<div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6;">
<div align="center"><br><br>
	<form method="post" action="../Eleve/affichageR">

	
		
		<input type="text" name="ClePerso" placeholder="Votre clé personnel !" value="<?php if(isset($name)){ echo $name; }?>">
		
			<br>
		<input type="submit" name="Valide" value="Validé !">
		
		</form>
	</div>
</div>

	
<div align="center"><br><br>
<a href="../PageAccueil/">Retour</a>
</div>


</body>
</html>