<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">

<html>
<head>
	<title>Quizz Accueil</title>



<style>

	.header h1{
		
		margin-left: 30%;
		padding: 50px;
		background-color: #2e86c1;
		width:45%;
	}



}

</style>

</head>

<div class="header">
<h1 align="center">Création du quizz </h1>
</div>

<br><br>

<body>
<div class="TextCQ">
	<p> Bonjour, cette 1er page va vous expliquer en détails comment créer votre quizz !</p>
	<p>Il faut d'abord choisir le nombre de questions que vous souhaiter.<br> Ensuite appuyé sur "Demarré !" qui vous redirigera vers la page de création.<p>
	<p>Cette page est assez simple: </p>
	<ul>
		<li> Rentré votre question dans la zone de texte</li>
		<li> Choisir le nombre de réponse à la question (maximum 4)</li>
		<li> Rentré dans les zones de textes les réponses à votre question</li>
		<li> Séléctionner la bonne réponse à la question</li>
		<li> Appuyé sur "Question suivantes" pour accéder à la suite</li>
	</ul>

	<p>La création s'arrêtera automatiquement avec un bouton qui vous propose de terminer la création</p>

	<form action="" method="post">
	<label><p>Choisissez le nombre de Question !</p>
		<input name="nombreQstn" placeholder="Nombre de Question" type="number">
	</label><br><br>

	<input type="submit" name="Creation_quizz" value="Démarré !">

	</form>

	<div align="center">
				
				<form action="" method="post">
					<input type="submit" name="Annule" value="ANNULER">

				</form>

		</div>

	



</div>


</body>
</html>