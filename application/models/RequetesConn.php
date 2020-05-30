<?php

class RequetesConn extends CI_Model{

	function Connect($mailCon,$mdpCon)
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');




		$this->db->where('mail',$mailCon);
		$this->db->where('MDP',$mdpCon);

		$query = $this->db->get('membre');
		return $query->num_rows();




	}




	function get_Name($mailCon,$mdpCon)
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');

		$result['prenom']=array();
		$this->db->select('prenom');
		$this->db->where('mail',$mailCon);
		$this->db->where('MDP',$mdpCon);

		$query = $this->db->get('membre');
		$recup = $query->row();
		return $recup->prenom;
		


	}


	function get_ID($mailCon,$mdpCon)
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');

		$result['ID']=array();

		$this->db->select('ID');
		$this->db->where('mail',$mailCon);
		$this->db->where('MDP',$mdpCon);

		$query = $this->db->get('membre');

		$recup = $query->row();
		return $recup->ID;


	}

}


?>


