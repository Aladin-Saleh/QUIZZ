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

}


?>


 	