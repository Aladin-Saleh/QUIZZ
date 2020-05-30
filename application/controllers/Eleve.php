<?php
class Eleve extends CI_Controller{

	public function index(){

		$this->load->view('Header.html');
		$this->load->view('PageCle.php');
		$this->load->view('Footer.html');
	}


	public function listerunetable(){

		$data['resultat']= $this->EleveMod->readtable('Quizz');
		$this->load->view('Header.html');
		$this->load->view('LireT',$data);
		$this->load->view('Footer.html');

	}
	public function essaie(){
		$this->load->view('EleveQuizz');


	}


	/*public function Connexion(){
		
		if(isset($_POST['Valide'])) 
 {
         
         

     

     if (!empty($_POST['Auteur']) && !empty($_POST['clef']) ) {
         

         
      
 
          	if( $this->RequetesConn->Connect($_POST['Auteur'],$_POST['clef'])> 0 )
          	{

              $ID = $this->RequetesConn->get_ID($_POST['mailCon'],$_POST['mdpCon']);
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
	}*/
}
?>