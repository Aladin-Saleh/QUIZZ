<?php

class PageAccueil extends CI_Controller {


public function index()
	{

	$this->load->view('Home');
	$this->load->view('Footer.html');

		
	}


public function Quizz()
{

	$this->load->view('Quizz');
}





}


?>