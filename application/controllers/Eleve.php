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

    $nomEleve = $_POST['nameEleve'];
    $nom = $_POST['nameCle'];


    if(!empty($this->input->post('nameCle'))){
    if(!empty($this->EleveMod->Connex($this->input->post('nameCle')))){

      $ID = $this->EleveMod->getID($this->input->post('nameCle'));
      $msg_erreur = "Accepté";
      $msg_erreur =$ID;

      $_SESSION['id'] = $ID;
      $divert=$row['id'].$ID."&cle=".($nom)."&eleve=".($nomEleve);

      $conteneur = '0123456789';
      $cle = '';
      for($i=1; $i<=7; $i++){
        $cle .= $conteneur[rand(0, strlen($conteneur)-1)];
      }

      $this->EleveMod->set_Eleve($nomEleve, $cle, $nom);
               
               
      header("Location: ../EleveConnexion/index?id=$divert");

    }else{


    $this->load->view('Header.html');
    $this->load->view('PageCle.php');
    $this->load->view('Footer.html');
    }
    }
  }

  /*public function resultat(){

  
   
    //$data['cleEleve'] = $cle;
    $donne['res']= $this->EleveMod->readtable('Reponse');
    $donne['eleve']= $this->EleveMod->readtable('Eleve');
    $this->load->view('Header.html');
    $this->load->view('LeResultat',$donne);
    $this->load->view('Footer.html');
  }*/
}
?>