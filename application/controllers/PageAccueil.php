<?php

class PageAccueil extends CI_Controller {


public function index()
	{
	$this->load->view('Header.html');
	$this->load->view('Home');
	$this->load->view('Footer.html');

		
	}








}


?>