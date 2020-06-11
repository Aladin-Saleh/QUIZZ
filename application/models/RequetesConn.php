<?php

class RequetesConn extends CI_Model{






	function get_cle_mdp($mailCon)
	{
		$result['MDP']=array();
		$this->db->select('MDP');
		$this->db->where('mail',$mailCon);

		
		$query = $this->db->get('membre');
		$recup = $query->row();

		if ($query->num_rows() > 0) {
			return $recup->MDP;
		}
		else
		{
			return 0;
		}
		
	}

	function Connect($mailCon,$mdpCon) /*Fonction qui contient la requete : SELECT * FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon", elle retourne le nombre de ligne validant les conditions de la requete*/
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');

			$cle = $this->get_cle_mdp($mailCon);
		
		


		$this->db->where('mail',$mailCon);

		$query = $this->db->get('membre');
		
		if (password_verify($mdpCon,$cle)) {
			return $query->num_rows();
		}
		else
		{
			return 0;
		}

		



	}




	function get_Name($mailCon) /*Fonction qui contient la requetes : SELECT prenom FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon" retourn le prenom*/
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');

		$result['prenom']=array();
		$this->db->select('prenom');
		$this->db->where('mail',$mailCon);

		$query = $this->db->get('membre');
		$recup = $query->row();
		return $recup->prenom;
		


	}


	function get_ID($mailCon) /*Fonction qui contient la requetes : SELECT ID FROM membre WHERE MDP="$mdpCon" AND mail="$mailCon" retourn l'id*/
	{
		$mailCon = htmlspecialchars($this->input->post('mailCon')); 
		$mdpCon =$this->input->post('mdpCon');

		$result['ID']=array();

		$this->db->select('ID');
		$this->db->where('mail',$mailCon);

		$query = $this->db->get('membre');

		$recup = $query->row();
		return $recup->ID;


	}

}


?>


