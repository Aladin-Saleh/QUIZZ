<?php

class RequetesConn extends CI_Model{

	function Connect($mailCon,$mdpCon) /*Fonction qui contient la requete : SELECT * FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon", elle retourne le nombre de ligne validant les conditions de la requete*/
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');




		$this->db->where('mail',$mailCon);
		$this->db->where('MDP',$mdpCon);

		$query = $this->db->get('membre');
		
		return $query->num_rows();



	}




	function get_Name($mailCon,$mdpCon) /*Fonction qui contient la requetes : SELECT prenom FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon" retourn le prenom*/
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


	function get_ID($mailCon,$mdpCon) /*Fonction qui contient la requetes : SELECT ID FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon" retourn l'id*/
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


