<?php

class EleveMod extends CI_Model{


	public function readtable($table){

		$res= $this->db->get($table);
		return $res->result_array();

	}

	public function Connect($clef){

		$clef =$this->input->post('clef');
		
		$this->db->where('clé',$clef);
		

		$query = $this->db->get('Quizz');
		
		return $query->num_rows();
	}

	/*public function Get_Key($clef){

	}*/
}
?>