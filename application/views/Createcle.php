<!DOCTYPE html>
<html>
<head>
	<title>CLE</title>
	<h1 align="center">Generation de la clé !</h1>
	<p align="center">Courage c'est presque fini !</p>
</head>
<body>


<form action="" method="post">
	<h3>Durée Quizz :</h3>
	<input type="number" name="duree" placeholder="Entrer la durée de votre quizz !">
	<br>
	<input type="submit" name="valide" value="TERMINER ET GENERER CLE !" > 
	<p align="center">(Garder la clé precieusement, vous en aurez sans doute besoin.<br>Partager la avec vos élèves pour qu'ils puissent le faire ! )</p>



</form>
<div align="center"> 
<a href="../QuizzControl/index?id=<?php $id = $_GET['id']; echo $id;?>">Retour au menu du prof !</a>

</div>


	

</body>
</html>