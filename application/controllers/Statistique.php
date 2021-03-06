<?php 
session_start();

class Statistique extends CI_Controller {



public function __construct()
{
   	parent::__construct();
    $this->load->database();

}




public function Stats()
{


$this->load->model('RequeteModif');
$this->load->model('ModelStat');
	$id = $_GET['id'];

if (isset($_POST['RETOUR'])) {
	header("Location: ../QuizzControl/index?id=".$id);
}

	
	$data['resultat'] = $this->RequeteModif->readtables('Quizz',$id);
	$this->load->view('Stats',$data);
	$this->load->view('Footer.html');


	if (isset($_POST['subCle'])) { /*Validation du formulaire */
		if (!empty($_POST['cle'])) {
				$cle = htmlspecialchars($_POST['cle']);
			if ($this->ModelStat->cle_exist($cle) > 0) {
				
				header("Location: StatCle?id=".$id."&cle=".$cle);
			}
			else
			{
				echo "Clé invalide";
			}
			
		}
		else
		{
			echo "<font color=red>Enter une clé !! </font>";
		}

	}



}


public function StatCle()
{

	$id = $_GET['id'];
	$cle = $_GET['cle'];
	$msg = "";

		$this->load->model('ModelStat');






	
	$note = $this->ModelStat->get_Note($cle,'Eleve');
	$data['moyenne'] = $note;

	/*Message en fonction de la moyenne sur un quizz*/

	if ($note > 50 && $note < 70) {
		$msg = 	"Vos éleves ont tout juste la moyenne ! Ils ne se sont pas foulé !";
	}

	if ($note > 0 && $note < 50) {
		$msg = 	"Vos éleves ont des notes SCAN-DA-LEUSE ! Peut être que le problème c'est vous ! ";
	}

	if ($note > 70 && $note <= 100) {
		$msg = 	"Vos éleves sont EXC-ELL-ENT ! Vous pouvez être fiere de vous !";
	}

	$data['msg'] = $msg;

	//echo $note;
	

	$this->load->view('StatCle',$data);
	$this->load->view('Footer.html');

	



}



}
