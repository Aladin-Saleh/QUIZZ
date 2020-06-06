<?php
session_start();

class EleveConnexion extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();

}

public function index()
{

	$this->load->model('RequeteQuizz');
	$this->load->model('EleveMod');

	if (isset($_GET['id'] )) {
		$id_int = intval($_GET['id']);
		$msg_erreur = "Val bien def";
		$val_id = $id_int;
		$prenom_user = $this->RequeteQuizz->get_Name($id_int);
			if (isset($prenom_user)) {
				$msg_erreur_bis = "prenom_user bien def";

			}
			else
			{
				$msg_erreur_bis =" Probleme avec le nom ";			
			}
	}
	else
	{
		$msg_erreur = "Y'a un probleme avec l'ID";
	}


	if (isset($msg_erreur)) {
		if (isset($msg_erreur_bis)) {
			$data['nomAuteur']= $prenom_user;
}
}

$Eleve = $_GET['eleve'];
$data['Eleve'] = $Eleve;
$_SESSION['test'] = $Eleve;

$nameCle = intval($_GET['cle']);;
$data['cle'] = $nameCle;
$_SESSION['cle'] = $nameCle;

$nomQuizz= $this->EleveMod->getName($nameCle);
$data['NomQuizz'] = $nomQuizz;
$_SESSION['nom'] = $nomQuizz;

$data['id'] = $id_int;
$_SESSION['id'] = $id_int;

$data['TableQuestion']= $this->EleveMod->readtable('Question');
$data['TableQuizz']= $this->EleveMod->readtable('Quizz');
$data['TableReponse']= $this->EleveMod->readtable('Reponse');





$this->load->view('Header.html');
$this->load->view('EleveQuizz',$data);
$this->load->view('Footer.html');










}

public function resultat(){


  	$donne['cle'] =$_SESSION['cle'];
    $donne['eleve'] = $_SESSION['test'];
    $donne['id'] = $_SESSION['id'];
    $donne['nomQuizz'] = $_SESSION['nom'];

    $TableEleve = $this->EleveMod->readtable('Eleve');


    
	for($i=0;$i<= count($TableEleve)-1;$i++){

		if($TableEleve[$i]['Nom'] == $_SESSION['test'] && $TableEleve[$i]['Clé'] == $_SESSION['cle']){

		$r = $TableEleve[$i]['CléPerso'];
		}
	}

	$donne['Resultat'] = $r;

	//$donne['TableEleve']= $this->EleveMod->readtable('Eleve');

	$TableReponse = $this->EleveMod->readtable('Reponse');

	$reponse = array();
	for($i=0;$i<= count($TableReponse)-1;$i++){

		if($TableReponse[$i]['NomQuizz'] == $_SESSION['nom']){
			if($TableReponse[$i]['BonneReponse'] == 1){

				$Vraireponse[] = $TableReponse[$i]['Réponses'];
				//$reponse[] = $TableReponse[$i]['BonneReponse'];
			}
		}
	}

	$nombreBonneRéponsesTotal = count($Vraireponse);
	$donne['oui'] = $nombreBonneRéponsesTotal;
	$donne['RealAns'] = $Vraireponse;

	$choix = array();
	if(isset($_POST['reponse'])){

		/*$nombre= $_POST['reponse'];
		$total=count($nombre);*/
		foreach($_POST['reponse'] as $valeur){
			$choix[] = $valeur;

		}
		/*for( $i=0; $i<$total; $i++ )
      {
        $choix[] = $nombre[$i];
      }*/
	}
	$donne['essaie'] = $choix;
	
	$nombreBonneReponseEleve = 0;

	for($i=0;$i<= count($TableReponse)-1;$i++){

		if($TableReponse[$i]['NomQuizz'] == $_SESSION['nom']){
			
			for($k=0; $k < count($choix); $k++){

				if($choix[$k] == $TableReponse[$i]['Réponses']){
					if($TableReponse[$i]['BonneReponse'] == 1){
						$nombreBonneReponseEleve = $nombreBonneReponseEleve + 1;
					}
					
				}
			}
		}
	}
	


	$donne['Remi'] = $nombreBonneReponseEleve;

	$Resultado = ($nombreBonneReponseEleve/$nombreBonneRéponsesTotal)*100;

	$donne['res'] = $Resultado;






    $this->load->view('Header.html');
    $this->load->view('LeResultat',$donne);
    $this->load->view('Footer.html');
  }

}
?>