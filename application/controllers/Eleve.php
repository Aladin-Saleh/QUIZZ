<?php
class Eleve extends CI_Controller{
/*Ce controller permet d'accéder au Quizz pour que l'utilisateur puisse effectuer le Quizz.*/

  

  public function index(){
/*Cette fonction envoie l'utilisateur vers la page qui lui permet de rentrer la clé accédant au Quizz.*/
    $this->load->view('Header.html');
    $this->load->view('PageCle.php');
    $this->load->view('Footer.html');

  if (isset($_POST['Retour'])) {
    header("Location: ../PageAccueil/");
  }


    
  }

/*_______________________________________________________________________________________________________________________________________________________*/

  public function Listerunetable(){

/*Cette fonction permet de lire dans la table "Quizz" et ainsi afficher les données de la db pour informer l'utilisateur des différentes clés existante.

*/
    
    $data['resultat']= $this->EleveMod->ReadTable('Quizz');
    $this->load->view('Header.html');
    $this->load->view('LireT',$data);
    $this->load->view('Footer.html');

  }


/*_______________________________________________________________________________________________________________________________________________________*/
  public function Essaie(){

/* Ici c'est une focntion qui gère une session, quand l'utilisateur rentre la clef du quizz il est connecté directement au quizz lié.*/

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

/*_______________________________________________________________________________________________________________________________________________________*/

public function Result(){

/* Cette fonction affiche la page où l'élève doit rentrer sa clé personnel pour accéder à ses résultats.*/

  $this->load->view('Header.html');
  $this->load->view('PageClePerso');

}

/*_______________________________________________________________________________________________________________________________________________________*/

public function AffichageR(){

  /* Cette fonction sert à prendre en compte la clé personnel de l'élève rentrer dans "PageClePerso.php" pour lui permettre d'accéder à ses résultats*/

  
  $cle = $_POST['ClePerso'];
  $TableEleve = $this->EleveMod->ReadTable('Eleve');

  if(!empty($this->EleveMod->Connexion($cle))){

  

  for($i=0; $i <= count($TableEleve)-1; $i++){

    if($cle == $TableEleve[$i]['CléPerso']){
      
      
      $note = $TableEleve[$i]['Note'];
      $cleQuizz = $TableEleve[$i]['Clé'];
      $mauvaiseRep = $TableEleve[$i]['MauvaiseReponse'];
      $nom = $TableEleve[$i]['Nom'];
      $nombreBonneRep = $TableEleve[$i]['NombreBonneRep'];
    }
  }

 
  $TableQuizz = $this->EleveMod->ReadTable('Quizz');

  for($i=0; $i <= count($TableQuizz)-1; $i++){

    if($cleQuizz == $TableQuizz[$i]['Clé']){

      $expire = $TableQuizz[$i]['estExpiré'];
      $nombreQuestion = $TableQuizz[$i]['NombreQuestion'];
      
           
    }
  }


 /* if($nombreQuestion < 10){
    $noteF = $note - 4*($mauvaiseRep);
  }elseif ($nombreQuestion > 10 && $nombreQuestion < 15) {
    $noteF = $note - 3*($mauvaiseRep);
  }else{
    $noteF = $note - 2*($mauvaiseRep);
  }*/


$noteEleve = $nombreBonneRep - 0.5*$mauvaiseRep;

$noteF = round( ($noteEleve/$nombreQuestion)* 100 );

/* Si le prof n'a pas fait expirer son Quizz alors il y a une page d'erreur qui s'affiche*/

if($expire == 1){

  $data['noteE'] = $noteEleve;
  $data['nombreQuestion'] = $nombreQuestion;
  $data['NoteF'] = $noteF;
  $data['note'] = $note;
  $data['MauvaiseRep'] = $mauvaiseRep;
  $data['clePerso'] = $cle;
  $data['nom'] = $nom;
  $data['BonneRep'] = $nombreBonneRep;
  $this->load->view('Header.html');
  $this->load->view('PageResultat',$data);
  $this->load->view('Footer.html');
}else{
  $this->load->view('Erreur');
}
    
}else{
  echo "<h2>"."Ce compte n'existe pas"."</h2>";
   $this->load->view('Header.html');
  $this->load->view('PageClePerso');
  $this->load->view('Footer.html');
}


}
}
?>