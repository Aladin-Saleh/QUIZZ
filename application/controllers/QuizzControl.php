<?php
session_start();

class QuizzControl extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();

}


public function index()
{

	
	$this->load->model('RequeteQuizz');
	

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

				$msg_erreur_bis =" Probleme avec le nom ";			}

	}
	else
	{
		$msg_erreur = "Y'a un probleme avec l'ID";
	}


	if (isset($msg_erreur)) {
	/*echo $msg_erreur;
	echo "<br>";
	echo $val_id;*/

		if (isset($msg_erreur_bis)) {
			/*echo $msg_erreur_bis;*/
			$data['titre']= $prenom_user;
}


}
$this->load->view('Header.html');
$this->load->view('Quizz',$data);
$this->load->view('Footer.html');
}


public function CreateQuizz()
{
		$id_int = intval($_GET['id']);
		
  		$_SESSION['id'] = $id_int;

	$this->load->view('Create_Quizz');

	$nmbr_question = $this->input->post('nombreQstn');

		$_SESSION['quest'] = $nmbr_question;
	if (isset($nmbr_question) AND $nmbr_question > 0 AND $nmbr_question < 40) {
		echo "ok";
		header("Location: pageCreation?id=".$_SESSION['id']."&quest=".$_SESSION['quest']); /*On met l'id de l'utilisateur pour pouvoir apres l'envoyé à la bd à la fin du 																								quizz + le nombre de question pour pouvoir le recup apres */
	}
	else
	{
		echo "Il faut entrer un nombre de question compris entre 1 et 40 pour crée son quizz !";

	}	

}

public function pageCreation()
{
	$nombre_question = $_GET['quest'];
	/*echo $nombre_question;*/


	$this->load->view('Header.html');
	$this->load->view('page_de_creation');
	$this->load->view('Footer.html');
		?>

		<div align="center">
			<form action="" method="post">
			<?php

	for ($i=1; $i <= $nombre_question ; $i++) { 
		 
		?>
		<h2>Question n°<?php echo $i;?></h2>

		<input type="text" name="quest<?php echo $i;?>" value="<?php  if(isset($quest)){ echo $quest;}?>" > 
		<?php $quest = $_POST['quest'.$iq];?>
		<br>
		<?php
	}
	?>

	<input type="submit" name="envoi" value="ENVOYER LES QUESTION !" size="255">
			</form>
		</div>
	<?php
	$ok =0;

	for ($j=1; $j <= $nombre_question; $j++) { 
		if (!empty($_POST['quest'.$j])) {
			$ok += 1;
		}
		else
		{
			echo '<font color="red">'."Il manque la question ".$j." à remplir<br></font>";

		}
	}

	if ($ok == $j) {
		header("Location: Question/");
	}


}


public function Question()
{

	$this->load->view('Question');
	$this->load->view('Footer.html');

}







	}

?>