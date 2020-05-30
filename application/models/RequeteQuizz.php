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
}

 ?>