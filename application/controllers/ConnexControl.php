<?php 
session_start();

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
         
         $validation = $this->RequetesConn->Connect($_POST['mailCon'],$_POST['mdpCon']);
         $ID = $this->RequetesConn->get_ID($_POST['mailCon'],$_POST['mdpCon']);
      
 
          	if( $validation > 0 )
          	{
                $msg_erreur = "Accepté";
                $msg_erreur =$ID;

                $_SESSION['id'] = $ID;
               
               
              header("Location: ../QuizzControl/index?id=".$_SESSION['id']);
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

echo $ID;
echo $Name;
}
				









}


}


?>