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
	$id = $_GET['id'];

	


	
	$data['resultat'] = $this->RequeteModif->readtables('Quizz',$id);
	$this->load->view('Stats',$data);
	$this->load->view('Footer.html');


	if (isset($_POST['subCle'])) {
		if (!empty($_POST['cle'])) {
			$cle = htmlspecialchars($_POST['cle']);
			header("Location: StatCle?id=".$id."&cle=".$cle);
		}
		else
		{
			echo "<font color=red>Enter une clé !! </font>";
		}

	}



}


public function StatCle()
{

	$this->load->view('StatCle');
	$this->load->view('Footer.html');

}



}
