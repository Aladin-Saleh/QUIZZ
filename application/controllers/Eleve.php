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

public function result(){

  $this->load->view('Header.html');
  $this->load->view('PageClePerso');
}

public function affichageR(){

  
  $cle = $_POST['ClePerso'];
  $TableEleve = $this->EleveMod->readtable('Eleve');

  if(!empty($this->EleveMod->Connexion($cle))){

  

  for($i=0; $i <= count($TableEleve)-1; $i++){

    if($cle == $TableEleve[$i]['CléPerso']){
      
      
      $note = $TableEleve[$i]['Note'];
      $cleQuizz = $TableEleve[$i]['Clé'];
    }
  }

 



  $TableQuizz = $this->EleveMod->readtable('Quizz');

  for($i=0; $i <= count($TableQuizz)-1; $i++){

    if($cleQuizz == $TableQuizz[$i]['Clé']){

      $expire = $TableQuizz[$i]['estExpiré'];
      
           
    }
  }

if($expire == 1){
$data['note'] = $note;

$data['clePerso'] = $cle;
$this->load->view('PageResultat',$data);
}else{
  $this->load->view('Erreur');
}
    
}else{
  echo "<h2>"."Ce compte n'existe pas"."</h2>";
   $this->load->view('Header.html');
  $this->load->view('PageClePerso');
}


}
}
?>