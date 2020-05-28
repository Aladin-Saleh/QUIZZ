<!DOCTYPE html>
<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/tacit.css">
<?php 

//En attendant que je comprenne comment marche le model aveec codeigniter de merde
$base_de_donnee = mysqli_connect("dwarves.iut-fbleau.fr","saleh","aladin.saleh","saleh");


 if(isset($_POST['subInsciption'])) 
 {
 		$name = htmlspecialchars($_POST['Prenom']);
 		$addr_mail = htmlspecialchars($_POST['mail']);
 		$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

 		$taille_prenom = strlen($name);

 	if (!empty($_POST['Prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) ) {
 		
 		if ($taille_prenom <= 35) {
 			
 			$insrt_base_de_donnee = ("INSERT INTO membre(prenom, mail, MDP) VALUES('$name','$addr_mail','$mdp')");
 			mysqli_query($base_de_donnee, $insrt_base_de_donnee);

 				
 		}
 		else
 		{
 			$msg_erreur = "Votre prenom est tros grand ! Changer le ! ";
 		}

 		
 	}

 	else
 	
 	{
 		$msg_erreur = " Veuillez remplir tous les champs ! ";
 	}
 }

if (isset($msg_erreur)) {

echo $msg_erreur;

}

 ?>

<html>
<head>
	<title>Inscription</title>
	<h2 align="center">Inscription</h2>
</head>
<body>

<div align="center">
	<form method="post" action="">
		<label for="prenom">Prénom</label> <br>
			<input type="text" name="Prenom" id="prenom" placeholder="Entrez votre prenom !" value="<?php if(isset($name)){ echo $name; }?>">
			<br>
		<label for="mail">Email</label><br>
			<input type="email" id="mail" name="mail" placeholder="Entrez votre email !" value="<?php if(isset($addr_mail)){ echo $addr_mail;} ?>">
			<br>
		<label for="mdp">Mot de passe</label><br>
			<input type="password" id="mdp" name="mdp" placeholder="Entrez votre mot de passe !" maxlength="30" minlength="8"><br>

			<input type="submit" name="subInsciption" value="S'inscrire ! ">
	</form>
</div>

</body>


</html>