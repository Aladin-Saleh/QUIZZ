<?php

class InscControl extends CI_Controller {


public function __construct(){
    	
      parent::__construct();
      $this->load->database();


	$this->load->view('Inscription');
	$this->load->model('RequetesInscr');
	
	$this->load->view('Footer.html');


}

public function index()
{
$this->RequetesInscr->insc();

}

}

?> 