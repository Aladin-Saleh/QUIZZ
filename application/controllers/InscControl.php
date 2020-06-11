<?php

class InscControl extends CI_Controller {


public function __construct(){
    	
      parent::__construct();
      $this->load->database();

    $this->load->view('Header.html');
	$this->load->view('Inscription');
	$this->load->model('RequetesInscr');
	
	$this->load->view('Footer.html');


}

public function index()
{

	if(isset($_POST['subInsciption'])) 
 {
  

     if (!empty($_POST['Prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) ) { /*Si les inputs ne sont pas vide alors on accede au condition suivantes*/
         
         if (strlen($_POST['Prenom']) <= 35) {/*Si le prenom depasse 35 caracteres*/
                
                if ($this->RequetesInscr->Verif($_POST['mail']) >0) {/* Si on trouve un ligne contenant le mail on refuse*/
                     $msg_erreur = "Mail deja utilisé";
                 } else
                 {
            
			     $this->RequetesInscr->insc($_POST['Prenom'],$_POST['mdp'],$_POST['mail']);
                  header("Location: ../PageAccueil/");
              }
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






