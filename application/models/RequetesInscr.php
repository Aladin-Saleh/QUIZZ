<?php
			
class RequetesInscr extends CI_Model{

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

}

?>