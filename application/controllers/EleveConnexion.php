<?php
session_start();

class EleveConnexion extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();

}


public function index()
{

	
	$this->load->model('RequeteQuizz');
	$this->load->model('EleveMod');


	

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
			$data['nomAuteur']= $prenom_user;
}


}

$nameCle = intval($_GET['cle']);;
$data['cle'] = $nameCle;

$nomQuizz= $this->EleveMod->getName($nameCle);
$data['NomQuizz'] = $nomQuizz;





$data['id'] = $id_int;
$data['TableQuestion']= $this->EleveMod->readtable('Question');
$data['TableQuizz']= $this->EleveMod->readtable('Quizz');
$data['TableReponse']= $this->EleveMod->readtable('Reponse');

$this->load->view('Header.html');
$this->load->view('EleveQuizz',$data);
$this->load->view('Footer.html');
}

}
?>