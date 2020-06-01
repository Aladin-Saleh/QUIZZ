<?php
class Eleve extends CI_Controller{
/*Ce controller permet d'accéder au Quizz pour que l'utilisateur puisse effectuer le Quizz*/

	public function index(){
/*Cette fonction envoie l'utilisateur vers la page qui lui permet de rentrer la clé accédant au Quizz*/
		$this->load->view('Header.html');
		$this->load->view('PageCle.php');
		$this->load->view('Footer.html');
	}


	public function listerunetable(){
/*Cette fonction permet de lire dans la table "Quizz" et ainsi afficher les données de la db pour informer l'utilisateur des différentes clés existante*/

		$data['resultat']= $this->EleveMod->readtable('Quizz');
		$this->load->view('Header.html');
		$this->load->view('LireT',$data);
		$this->load->view('Footer.html');

	}
	public function essaie(){

/*Ici c'est en phase beta, la fonction permet de se connecter à l'aide de la clé vers le quizz, que l'utilisateur doit effectuer. Elle transmet aussi le nombre de questions ainsi que toutes les questions de la db*/

    if(!empty($_POST['nameCle'])){
    if(!empty($this->EleveMod->Connect($_POST['nameCle']))){

<<<<<<< HEAD
    $data['TableQuestion']= $this->EleveMod->readtable('Question');
    $data['nombre']= $this->EleveMod->readtable('Quizz');
    $data['Reponse']= $this->EleveMod->readtable('Reponse');

=======
    $data['resultat']= $this->EleveMod->readtable('Question');
    $data['nombre']= $this->EleveMod->readtable('Quizz');
>>>>>>> 1907f299f7220f5c29dea76a0c36ce5798b0768b
    $this->load->view('Header.html');
    $this->load->view('EleveQuizz',$data);
    $this->load->view('Footer.html');
    }else{

    $this->load->view('Header.html');
    $this->load->view('PageCle.php');
    $this->load->view('Footer.html');

    }
  }


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