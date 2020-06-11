<?php 


class ModelStat extends CI_Model{



function get_Note($Cle)
{


		$result['Note']=array();
		$this->db->select_avg('Note');
		$this->db->where('Clé',$Cle);

		$query = $this->db->get('Eleve');
		$recup = $query->row();
		return $recup->Note;




}

function cle_exist($cle)
{

	$this->db->where('Clé',$cle);

		$query = $this->db->get('Eleve');
		
			return $query->num_rows();
}
















}

