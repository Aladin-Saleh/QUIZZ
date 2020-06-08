<!DOCTYPE html>
<html>
<head>
	<title>Menu du Professeur</title>
</head>
<body>

<div class="header">
<h1 align="center"> Bienvenu(e) <?php echo $titre?> ! Vous êtes sur le menu du prof !</h1>
</div><br><br>

<div style="border: 2px solid #1c75c8; padding: 3px; background-color: #c5ddf6;">
<h2>Consulter les statistiques des éléves :</h2>
	<a href="../Statistique/Stats?id=<?php $id= $_GET['id']; echo $id;?>">STATISTIQUE ! </a>
<h2>Créer un Quizz :</h2><br>
	<a href="CreateQuizz?id=<?php $id= $_GET['id']; echo $id;?> ">CREER ! </a><br>
<h2>Modifier un Quizz :</h2><br>
	<a href="../ModifQuizzControl/Modif?id=<?php $id= $_GET['id']; echo $id;?> ">MODIFIER QUIZZ ! </a><br><br>
</div>


<div align="center"><br>
	<a href="../PageAccueil/">Retour</a>
</div>

</body>
</html>