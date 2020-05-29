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



	if(isset($_POST['subConn'])) 
 {
         
         

     

     if (!empty($_POST['mailCon']) && !empty($_POST['mdpCon']) ) {
         
 
          	if($this->RequetesConn->Connect($_POST['mailCon'],$_POST['mdpCon']) > 0 )
          	{
                $msg_erreur = "Accepté";
                  header("Location: ../PageAccueil/");
          	}
          	
          	else
          	{
          		$msg_erreur = "Mot de passe ou Email Invalid ! Recommencez !";
          	}
          		
     }

     else
     
     {
         $msg_erreur = " Veuillez remplir tous les champs ! ";
     }
          	
          	
 }

if (isset($msg_erreur)) {

echo '<font color="red">'.$msg_erreur."</font>";


}
				









}


}


