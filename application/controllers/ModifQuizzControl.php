<?php
session_start();

class ModifQuizzControl extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();

}



public function Modif()
{

	$this->load->view('ModifQuizz');
	$this->load->view('Footer.html');
	$this->load->model('RequeteModif');

	$id = $_GET['id'];

	$Quizz = $this->RequeteModif->get_Name_Quizz($id);

	echo $Quizz;


}



}