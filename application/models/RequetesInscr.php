<?php
			
class RequetesInscr extends CI_Model{ /*Fonction qui contient la requete : INSERT INTO membre(prenom,mail,MDP) VALUES("$name","$addr_mail","$mdp")*/

function insc()
{

 $name = htmlspecialchars($_POST['Prenom']);
         $addr_mail = htmlspecialchars($_POST['mail']);
         $mdp = $_POST['mdp']; // pas de hashage pour le moment parce que y'a un souci 

     

          
				$this->db->set('MDP',$mdp);
                $this->db->set('mail',$addr_mail);
                $this->db->set('prenom',$name);
                $this->db->insert('membre');
                 

				

}



function Verif($mailVerif)/*Fonction qui contient la requetes : SELECT * FROM membre WHERE mail="$mailVerif" retourn le nombre de ligne validant la requete*/
	{
		$mailVerif = htmlspecialchars($this->input->post('mail')); 
		



		$this->db->select('*');
		$this->db->where('mail',$mailVerif);
		

		$query = $this->db->get('membre');
		return $query->num_rows();




	}

}

?>