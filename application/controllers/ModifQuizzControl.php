<?php
session_start();

class ModifQuizzControl extends CI_Controller {

public function __construct()
{
   	parent::__construct();
    $this->load->database();

}



public function Modif()
{

	$this->load->model('RequeteModif');
	$this->load->model('ModelStat');

	$id = $_GET['id'];

	


	
	$data['resultat'] = $this->RequeteModif->readtables('Quizz',$id);

	

	if (isset($_POST['subCle'])) {
		$cle = htmlspecialchars($_POST['cle']);
		if (!empty($cle) && $this->ModelStat->cle_existQ($cle)) { /*On verifie que le champs est remplie et que la clé exist*/

			header("Location: Change?id=".$id."&cle=".$cle);
		}
		else
		{

			//echo "nop";
			echo "<font color=red>Cle inconnue</font>";
		}

		
	}
	else
	{
		//echo "non";
	}

	if (isset($_POST['subCleExpire'])) {
		$cleB = htmlspecialchars($_POST['cleEx']);
		if (!empty($cleB) && $this->ModelStat->cle_existQ($cleB)) {
			header("Location: ExpireB?id=".$id."&cle=".$cleB);
		}
		else
		{

			//echo "nop";
			echo "<font color=red>Cle inconnue</font>";

		}

		
	}
	else
	{
		//echo "non";
	}
	
	if (isset($_POST['subCleSuppr'])) {
		$cleS = htmlspecialchars($_POST['cleSupp']);
		if (!empty($cleS) && $this->ModelStat->cle_existQ($cleS) ) {
			header("Location: Supprimer?id=".$id."&cle=".$cleS);
		}
		else
		{

			//echo "nop";
			echo "<font color=red>Cle inconnue</font>";

		}

		
	}
	else
	{
		//echo "non";
	}
			
	
	
	$this->load->view('ModifQuizz',$data);
	$this->load->view('Footer.html');

	if (isset($_POST['Retour'])) {
		header("Location: ../QuizzControl/index?id=".$id);

	}





}


public function Change() /*Dans le cas ou on veut tout changer, on load cette "fonction"*/
{
	$this->load->model('RequeteModif');
	$this->load->model('RequeteQuizz');

	$cle = $_GET['cle'];
	$id = $_GET['id'];
	$NomQuizz = $this->RequeteModif->get_Name_QuizzCle($id,$cle);
	$NmbrQuest =  $this->RequeteModif->get_Quest($id,$NomQuizz,$cle);	/*On recupere les infos dans la db via les requetes*/
	$this->load->view('Changement.html');
	$this->load->view('Footer.html');

?>
<form action="" method="post">
	<?php
	for ($i=1; $i <= $NmbrQuest ; $i++) { 
		$Quest = $this->RequeteQuizz->affiche_question($i,$id,$NomQuizz);
		echo $Quest;
		echo br(1);
		?><input type="text" name="newQuest<?php echo $i;?>"><?php
		echo br(1);

	}	

	?>
	<input type="submit" name="changeQuest" value="CHANGER LES QUESTION(S)">
</form>
<?php

if (isset($_POST['changeQuest'])) {
	
	for ($j=1; $j <= $NmbrQuest ; $j++) { 
			
			$newQuest = $_POST['newQuest'.$j];
			if (!empty($newQuest)) {
				$this->RequeteModif->modif_quest($id,$NomQuizz,$j,$newQuest);
			}
			else
			{
				//echo "La question n°".$j."n'a pas été modifié.";
			}

	}

	header("Location: ChangeQuest?id=".$id."&cle=".$cle."&nomQuizz=".$NomQuizz."&nmbrQuest=".$NmbrQuest);


}
else
{
	echo "error";
}
		


}

public function ChangeQuest()
{
	$this->load->model('RequeteModif');
	$this->load->model('RequeteQuizz');
	$this->load->view('ChngQuest.html');
	$this->load->view('Footer.html');

	$cle = $_GET['cle'];
	$id = $_GET['id'];
	$NomQuizz = $_GET['nomQuizz'];
	$NmbrQuest = $_GET['nmbrQuest'];

echo "<h1 align=center>REPONSE</h1>";
?>
<form action="" method="post">
	<?php
	for ($i=1; $i <= $NmbrQuest ; $i++) { 
		$Quest = $this->RequeteQuizz->affiche_question($i,$id,$NomQuizz);
		echo "<font color=red>".$Quest."</font>";
		echo br(1);
			$Nmbr_Rep = $this->RequeteQuizz->get_nombre_reponse($NomQuizz,$id,$i);
			for ($j=1; $j <= $Nmbr_Rep ; $j++) { 
				
				$Rep = $this->RequeteQuizz->get_rep($id,$NomQuizz,$i,$j);
				echo "<font color=blue>".$Rep." :</font>";
				?>
				<input type="text" name="newRepns<?php echo $i.$j;?>" placeholder="Entrer la nouvelle réponse !">
				<?php
				echo $i.$j;
				echo br(1);
			}


	}	
	?>
<input type="submit" name="subRep" value="MODIFIER LES REPONSE(S) !">
</form>
<?php

if (isset($_POST['subRep'])) {
	for ($y=1; $y <= $NmbrQuest ; $y++) {

		$Nmbr_RepB = $this->RequeteQuizz->get_nombre_reponse($NomQuizz,$id,$y);
		for ($z=1; $z <= $Nmbr_RepB ; $z++) { 

			$newRep =$_POST['newRepns'.$y.$z];
			if (!empty($newRep)) {

				$this->RequeteModif->modif_rep($id,$NomQuizz,$y,$z,$newRep);
				header("Location: Expire?id=".$id."&cle=".$cle."&nomQuizz=".$NomQuizz."&nmbrQuest=".$NmbrQuest);
		
	}else
	{
				header("Location: Expire?id=".$id."&cle=".$cle."&nomQuizz=".$NomQuizz."&nmbrQuest=".$NmbrQuest);

	}


		}

	}
}


}

public function Expire()
{
	$this->load->model('RequeteModif');
	$this->load->model('RequeteQuizz');
	$this->load->view('EstExpire.html');
	$this->load->view('Footer.html');

	$cle = $_GET['cle'];
	$id = $_GET['id'];
	$NomQuizz = $_GET['nomQuizz'];
	$NmbrQuest = $_GET['nmbrQuest'];


	if (isset($_POST['estExpire'])) {
		
		if ($_POST['expire'] == "oui") {
			$this->RequeteModif->set_true($id,$NomQuizz,$cle);
			header("Location: ../QuizzControl/index?id=".$id);

		}
		else
		{
			$this->RequeteModif->set_false($id,$NomQuizz,$cle);
			header("Location: ../QuizzControl/index?id=".$id);
		}
	}


}

public function ExpireB() /*Si on veut seulement rendre ou non le quizz expiré*/
{
	$this->load->model('RequeteModif');
	$this->load->model('RequeteQuizz');
	$this->load->view('EstExpire.html');
	$this->load->view('Footer.html');

	$cle = $_GET['cle'];
	$id = $_GET['id'];
	$NomQuizz = $this->RequeteModif->get_Name_QuizzCle($id,$cle);


	if (isset($_POST['estExpire'])) {
		
		if ($_POST['expire'] == "oui") {
			$this->RequeteModif->set_true($id,$NomQuizz,$cle);
			header("Location: ../QuizzControl/index?id=".$id);

		}
		else
		{
			$this->RequeteModif->set_false($id,$NomQuizz,$cle);
			header("Location: ../QuizzControl/index?id=".$id);
		}
	}


}

public function Supprimer() /*Pour supprimer un quizz*/
{
	$this->load->model('RequeteModif');
	$this->load->model('RequeteQuizz');
	$this->load->view('Supprimer.html');
	$this->load->view('Footer.html');

	$cle = $_GET['cle'];
	$id = $_GET['id'];
	$NomQuizz = $this->RequeteModif->get_Name_QuizzCle($id,$cle);


	if (isset($_POST['Supprimer'])) {
		
		if ($_POST['suppr'] == "oui") {
			$this->RequeteModif->delete_quizz($cle);
			$this->RequeteModif->delete_quizz_quest($NomQuizz,$id);
			$this->RequeteModif->delete_quizz_reponse($NomQuizz,$id);
			header("Location: ../QuizzControl/index?id=".$id);

		}
		else
		{
			
			header("Location: ../QuizzControl/index?id=".$id);
		}
	}


}




}