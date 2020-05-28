<?php
			
class RequetesInscr extends CI_Model{

function insc()
{


	if(isset($_POST['subInsciption'])) 
 {
         $name = htmlspecialchars($_POST['Prenom']);
         $addr_mail = htmlspecialchars($_POST['mail']);
         $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

         $taille_prenom = strlen($name);

     if (!empty($_POST['Prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) ) {
         
         if ($taille_prenom <= 35) {
             
          
				$this->db->set('MDP',$mdp);
                $this->db->set('mail',$addr_mail);
                $this->db->set('prenom',$name);
                $this->db->insert('membre');
                 
         }
         else
         {
             $msg_erreur = "Votre prenom est tros grand ! Changer le ! ";
         }

         
     }

     else
     
     {
         $msg_erreur = " Veuillez remplir tous les champs ! ";
     }
 }

if (isset($msg_erreur)) {

echo $msg_erreur;

}
				

}

}

?>