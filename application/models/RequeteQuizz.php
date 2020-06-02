<?php 


class RequeteQuizz extends CI_Model{


	function get_Name($ID)
	{
	

		$result['prenom']=array();
		$this->db->select('prenom');
		$this->db->where('ID',$ID);


		$query = $this->db->get('membre');
		$recup = $query->row();
		return $recup->prenom;
		


	}



	function envoi_question_db($ID,$qstn,$nombreReponse,$numero,$nomQuizz)/*Fonction qui contient la requetes : INSERT INTO Question('ID','Questions','Numéro','NomQuizz','NombreRéponse') VALUES($ID,$qstn,$numero,$nomQuizz,$nombreReponse) */
	{

		$question = htmlspecialchars($qstn);

				$this->db->set('ID',$ID);
                $this->db->set('Questions',$qstn);
                $this->db->set('Numéro',$numero);
                $this->db->set('NomQuizz',$nomQuizz);
                $this->db->set('NombreRéponse',$nombreReponse);
                $this->db->insert('Question');
	}

function affiche_question($numero_Question,$ID,$nomQuizz) /* Fonction qui contient la requetes : SELECT 'Questions' FROM Question WHERE Numéro=$numero_Question AND ID=$ID AND NomQuizz=$nomQuizz*/
{
	$result['Questions']=array();
	$this->db->select('Questions');
	$this->db->where('Numéro',$numero_Question);
	$this->db->where('ID',$ID);
	$this->db->where('NomQuizz',$nomQuizz);

	$query = $this->db->get('Question');
		
		$recup = $query->row();
		return $recup->Questions;








}

function get_nombre_reponse($nomQuizz,$ID,$numQuestion)/*Fonction qui la requetes : SELECT 'NombreRéponse' FROM Question WHERE ID=$ID AND NomQuizz=$nomQuizz AND Numéro=$numQuestion*/
{
$result['NombreRéponse']=array();
	$this->db->select('NombreRéponse');
	$this->db->where('ID',$ID);
	$this->db->where('NomQuizz',$nomQuizz);
	$this->db->where('Numéro',$numQuestion);


	$query = $this->db->get('Question');
		
		$recup = $query->row();
		return $recup->NombreRéponse;

}





}

 ?>