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

public function Inscription()
{

	$this->load->view('Inscription');
	$this->load->view('Footer.html');


}

public function Connexion()
{

	$this->load->view('Connexion');
	$this->load->view('Footer.html');

}

}
