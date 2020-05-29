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

	if(isset($_POST['subInsciption'])) 
 {
  

     if (!empty($_POST['Prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) ) {
         
         if (strlen($_POST['Prenom']) <= 35) {
             
          
			$this->RequetesInscr->insc();
                  header("Location: ../PageAccueil/");
         }
         else
         {
             $msg_erreur = "Votre prenom est tros grand ! Changer le ! ";
         }

         
     }

     else
     
     {
         $msg_erreur = " Veuillez remplir tous les champs ! ";
     }
 }

if (isset($msg_erreur)) {

echo $msg_erreur;

}




}

}

?> 






