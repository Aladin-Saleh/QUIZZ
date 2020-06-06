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








}

?>