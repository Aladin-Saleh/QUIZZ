<?php 


class ModelStat extends CI_Model{



function get_Note($Cle)/*RETOURNE LA MOYENNE DES NOTES DE LA TABLE ELEVE*/
{


		$result['Note']=array();
		$this->db->select_avg('Note');
		$this->db->where('Clé',$Cle);

		$query = $this->db->get('Eleve');
		$recup = $query->row();
		return $recup->Note;




}

function cle_exist($cle)/*Verifie si la clé existe, si oui $query > 0*/
{

	$this->db->where('Clé',$cle);

		$query = $this->db->get('Eleve');
		
			return $query->num_rows();
}


function cle_existQ($cle)/*Verifie si la clé existe, si oui $query > 0*/
{

	$this->db->where('Clé',$cle);

		$query = $this->db->get('Quizz');
		
			return $query->num_rows();
}
















}

