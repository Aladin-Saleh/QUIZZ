<?php
	$con =  mysqli_connect("dwarves.iut-fbleau.fr","saleh","aladin.saleh","saleh");

	if (!$con)
	{
	die('connexion impossible' . mysqli_error());
	}

	mysqli_select_db("maBase", $con);

	mysqli_query("INSERT INTO `membre` (`id`, `prenom`, )
	VALUES(‘’, 'Griffin')
	
	");

	mysqli_close($con);
	?> 
