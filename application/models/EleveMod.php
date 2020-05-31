<?php

class EleveMod extends CI_Model{


	public function readtable($table){
/*Cette fonction permet de lire la db et de la retourner*/
		$res= $this->db->get($table);
		return $res->result_array();

	}

	public function Connect($cle){
/*Cette fonction j'en sais rien dutout*/

		$cle =$this->input->post('nameCLe');
		
		$this->db->where('clé',$cle);
		

		$query = $this->db->get('Quizz');
		
		return $query;
	}
}
?>