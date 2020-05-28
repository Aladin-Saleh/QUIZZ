<?php 


class ConnexControl extends CI_Controller {


public function __construct(){
    	
      parent::__construct();
      $this->load->database();
      $this->load->view('Connexion');
      $this->load->model('RequetesConn');
      $this->load->view('Footer.html');




}

public function Connexion()
{

	$this->RequetesConn->Connect();

}



}




 ?>