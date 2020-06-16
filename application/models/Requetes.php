<?php



//INUTILE
/*A SUPPRIMER*/

function _getConnection(){
	static $_conn = NULL;
	if ($_conn === NULL){
		$base_de_donnee = mysqli_connect("dwarves.iut-fbleau.fr","saleh","aladin.saleh","saleh");
	}
	return $_conn;
}







function add_donnee_db_inscr($name,$addr_mail,$mdp)
{

$insrt_base_de_donnee = ("INSERT INTO membre(prenom, mail, MDP) VALUES('$name','$addr_mail','mdp')");
mysqli_query($base_de_donnee, $insrt_base_de_donnee);

}


?>