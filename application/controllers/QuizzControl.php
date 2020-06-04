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

	$ok =0;
	$nombre_question = $_GET['quest'];
	$id = $_GET['id'];
	$nom_Quizz = $this->input->post('nomQuizz');

	/*echo $nombre_question;*/

	$_SESSION['id'] = $id;
	$_SESSION['nquest'] = $nombre_question;
	$_SESSION['nom'] = $nom_Quizz;



	$this->load->model('RequeteQuizz');
	$this->load->view('Header.html');
	$this->load->view('page_de_creation');
	$this->load->view('Footer.html');
		?>

		<div align="center">
			<form action="" method="post">
				<input type="text" name="nomQuizz" placeholder="Entrer le nom du Quizz !">
			<?php

	for ($i=1; $i <= $nombre_question ; $i++) { /*La boucle crée le nombre de question que l'on a renseigné dans la page précedente, elle le récupere via l'url*/
		
		 $quest = $this->input->post('quest'.$i);/*"sauvegarde "le contenue de l'input*/
		?>
		<h2>Question n°<?php echo $i;?></h2>

		<input type="text" name="quest<?php echo $i;?>" value="<?php  if(isset($quest)){ echo $quest;}/*pour ne pas réecrire ses question*/?>" >
		<input type="number" placeholder="Nombre de réponses" name="nombre_rep<?php echo $i?>">
		
		<br>
		<?php
	}
	?>

	<input type="submit" name="envoi" value="ENVOYER LES QUESTION !" size="255">
			</form>
		</div>
	<?php
	

	for ($j=1; $j <= $nombre_question; $j++) { 
		if (!empty($_POST['quest'.$j])) {
			$ok += 1;
		}
		else
		{
			echo '<font color="red">'."Il manque la question ".$j." à remplir<br></font>";

		}
	}

		
	
if ($ok == ($j-1)) {/*Envoi dans la bd des questions*/

		for ($y=1; $y <= $nombre_question ; $y++) { 
			$qstn = $this->input->post('quest'.$y);
			$nbr_Rep = $this->input->post('nombre_rep'.$y);
			$this->RequeteQuizz->envoi_question_db($id,$qstn,$nbr_Rep,$y,$nom_Quizz);
		}
		header("Location: Question?id=".$_SESSION['id']."&nbrQuest=".$_SESSION['nquest']."&nom=".$_SESSION['nom']);
	}

}


public function Question()
{
	$this->load->model('RequeteQuizz');

	$this->load->view('Question');
	$this->load->view('Footer.html');

	$id = $_GET['id'];
	$nmbr_Quest = $_GET['nbrQuest'];
	$nom_Quizz = $_GET['nom'];
	$ok =0;/*Cette variable permet de verifier si tout les input de reponse sont "ok", c'est à dire rempli.*/
	$nombre_Rep_Tot = 0;
	echo "<h1 align=center>".$nom_Quizz."</h1>";

?>
		<form method="post"><?php
	for ($i=1; $i <=$nmbr_Quest ; $i++) { 
		echo br(2);
		$quest = $this->RequeteQuizz->affiche_question($i,$id,$nom_Quizz);
		echo $quest;
		
		$nombr_Rep = $this->RequeteQuizz->get_nombre_reponse($nom_Quizz,$id,$i);

		$nombre_Rep_Tot += $nombr_Rep;
		
				for ($j=1; $j <= $nombr_Rep; $j++) { 
					echo br(1);
					$rep = $this->input->post('reponse'.$i.$j);
					if (!empty($_POST['reponse'.$i.$j])) {
						$ok += 1;
						$reponse = $this->input->post('reponse'.$i.$j);
						 $this->RequeteQuizz->insert_reponse($nom_Quizz,$id,$reponse,$i,$j);
					}
					else
					{
						echo "<font color =red>Completer toutes les réponses !</font> ";
					}
					?>
					<input type="text" placeholder="Entrer une réponse !" name="reponse<?php echo $i.$j; ?>" value="<?php if(isset($rep)){ echo $rep;} ?>">
					<?php
					/*On recupere les questions dans la db puis on les affiches.
					Une fois la question affiché, on recupere le nombre de reponse que l'on avait attribué plus tôt et on affiche des input pour y ecrire nos reponse*/
					
				}
			
		
	}

		?>

				<br><br>
				<input type="submit" name="envoiReponse" value="ENVOYER LES REPONSES ! ">
				</form>
				<?php
					echo $nombre_Rep_Tot;
					if ($ok == $nombre_Rep_Tot) {
						header("Location: Reponse?id=".$id."&nombretotRep=".$nombre_Rep_Tot."&nomQuizz=".$nom_Quizz."&nombreQstn=".$nmbr_Quest);
					}
		



}

public function Reponse()
{

	$this->load->model('RequeteQuizz');
	$this->load->view('ReponseCreation');
	
	
	$id = $_GET['id'];
	$nombreRep_tot = $_GET['nombretotRep'];
	$nomQuizz = $_GET['nomQuizz'];
	$nmbrQuest = $_GET['nombreQstn'];
	




	echo "<h1 align=center>".$nomQuizz."</h1>";
	?><form action="" method="post"><?php

	for ($i=1; $i <=$nmbrQuest ; $i++) { 
		echo br(2);
		$quest = $this->RequeteQuizz->affiche_question($i,$id,$nomQuizz);
		echo "<h2>".$quest."</h2>";

			$nbr_rep = $this->RequeteQuizz->get_nombre_reponse($nomQuizz,$id,$i);
			
		for ($j=1; $j <= $nbr_rep ; $j++) { 
			$rep = $this->RequeteQuizz->get_rep($id,$nomQuizz,$i,$j);
			echo br(2);
			echo $rep;
			?>

			<input type="checkbox" name="bonneRep<?php echo $i.$j; ?>">
			<?php
			if (isset($_POST['bonneRep'.$i.$j])) {
				echo "ok";
				$this->RequeteQuizz->set_true($id,$nomQuizz,$i,$j);
				header("Location: CreateCle?id=".$id."&nomQuizz=".$nomQuizz."&nbrQuest=".$nmbrQuest);
			}
			else
			{
				echo "non";
			}

		}
	}
	echo br(3);
	?>
	
	<input type="submit" name="envoiRep" value="ENVOYER REPONSES !">
</form>
<?php






	$this->load->view('Footer.html');


	
}



public function CreateCle()
{

	$this->load->model('RequeteQuizz');
	$this->load->view('Createcle');
	$this->load->view('Footer.html');

	$conteneur = '0123456789';
    $cle = '';
    $duree = $_POST['duree'];
    $nomQuizz = $_GET['nomQuizz'];
    $ID = $_GET['id'];
    $Auteur = $this->RequeteQuizz->get_Name($ID);
    $NombreQuestion = $_GET['nbrQuest'];

    

    if (isset($_POST['duree']) && $_POST['duree'] > 10) {
    	 
    	 for($i=1; $i<=7; $i++){
        $cle .= $conteneur[rand(0, strlen($conteneur)-1)];



    }
    	$this->RequeteQuizz->set_Quizz($ID,$NombreQuestion,$nomQuizz,$cle,$duree,$Auteur);
        echo "<h1 align=center><font color=green>".$cle."</font></h1>";


    }
     else
    {
    	echo "<font color=red>Entrer une durée comprise entre 10 minutes et 60 minutes pour générer une clé ! </font>";
    }
   
    
	

}



	}

?>