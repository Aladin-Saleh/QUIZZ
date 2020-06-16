<?php 


class RequeteModif extends CI_Model{




function get_Name_Quizz($ID)
{
	$result['NOM']=array();
	$this->db->select('NOM');
	$this->db->where('ID',$ID);

	$query = $this->db->get('Quizz');
		$recup = $query->row();
		return $recup->NOM;



}


function get_Nombre_Quizz($ID)/*A supprimer quand plus besoin*/
{
	$result['NombrDeQuizz']=array();
	$this->db->select('NombrDeQuizz');
	$this->db->where('ID',$ID);

	$query = $this->db->get('membre');
		$recup = $query->row();
		return $recup->NombrDeQuizz;



}

function readtables($table,$ID){
/*Cette fonction permet de lire la db et de la retourner*/
		$this->db->where('ID',$ID);
		$res= $this->db->get($table);
				
		return $res->result_array();

	}


function get_Name_QuizzCle($ID,$Cle)
{
	$result['NOM']=array();
	$this->db->select('NOM');
	$this->db->where('ID',$ID);
	$this->db->where('Clé',$Cle);


	$query = $this->db->get('Quizz');
		$recup = $query->row();
		return $recup->NOM;



}


function get_Quest($ID,$NomQuizz,$cle)	

{

$result['NombreQuestion']=array();
	$this->db->select('NombreQuestion');
	$this->db->where('ID',$ID);
	$this->db->where('NOM',$NomQuizz);
	$this->db->where('Clé',$cle);

	


	$query = $this->db->get('Quizz');
		
		$recup = $query->row();
		return $recup->NombreQuestion;

}


function modif_quest($ID,$NomQuizz,$NumQuest,$newQuest)/*UPDATE DE Question */
{

	$this->db->set('Questions',$newQuest);
	$this->db->where('ID',$ID);
	$this->db->where('NomQuizz',$NomQuizz);
	$this->db->where('Numéro',$NumQuest);

	$this->db->update('Question');
}

function modif_rep($ID,$NomQuizz,$NumRep,$NumRepBis,$newRep)
{

	$this->db->set('Réponses',$newRep);
	$this->db->where('ID',$ID);
	$this->db->where('NomQuizz',$NomQuizz);
	$this->db->where('Numéro',$NumRep);
	$this->db->where('NumeroRep',$NumRepBis);


	$this->db->update('Reponse');
}





function set_true($ID,$NomQuizz,$Cle)/*UPDATE TRUE de la valeur estExpiré (bool) dans la table Quizz*/
{

	$this->db->set('estExpiré',TRUE);
	$this->db->where('ID',$ID);
	$this->db->where('NOM',$NomQuizz);
	$this->db->where('Clé',$Cle);

	$this->db->update('Quizz');
}

function set_false($ID,$NomQuizz,$Cle)/*UPDATE FALSE de la valeur estExpiré (bool) dans la table Quizz*/
{

	$this->db->set('estExpiré',FALSE);
	$this->db->where('ID',$ID);
	$this->db->where('NOM',$NomQuizz);
	$this->db->where('Clé',$Cle);

	$this->db->update('Quizz');
}




function delete_quizz($Cle)/*DELETE FROM 'Quizz' WHERE Clé=$Cle;*/
{

	$this->db->where('Clé', $Cle);

	$this->db->delete('Quizz');
}

function delete_quizz_quest($Nom,$id)/*DELETE FROM 'Question' WHERE ID=$id AND NomQuizz = $Nom;*/
{
	$this->db->where('ID', $id);
	$this->db->where('NomQuizz', $Nom);


	$this->db->delete('Question');
}

function delete_quizz_reponse($Nom,$id)/*DELETE FROM 'Reponse' WHERE ID=$id AND NomQuizz = $Nom;*/
{
	$this->db->where('ID', $id);
	$this->db->where('NomQuizz', $Nom);


	$this->db->delete('Reponse');
}





}

?>