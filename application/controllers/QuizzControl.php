<?php
session_start();

class QuizzControl extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();
	$this->load->view('Quizz');
	$this->load->model('RequeteQuizz');
	$this->load->view('Footer.html');
}


public function index()
{

	if (isset($_GET['id'] )) {
		$id_int = intval($_GET['id']);
		$msg_erreur = "Val bien def";
		$val_id = $id_int;
		$prenom_user = $this->RequeteQuizz->get_Name($id_int);
			if (isset($prenom_user)) {
				$msg_erreur_bis = "prenom_user bien def";

			}
			else
			{

				$msg_erreur_bis =" Probleme avec le nom ";			}

	}
	else
	{
		$msg_erreur = "Y'a un probleme avec l'ID";
	}


	if (isset($msg_erreur)) {
	/*echo $msg_erreur;
	echo "<br>";
	echo $val_id;*/

		if (isset($msg_erreur_bis)) {
			/*echo $msg_erreur_bis;*/
			echo "<h1>Bienvenu(e) ".$prenom_user." ! ";
		}
}


}





	}

?>