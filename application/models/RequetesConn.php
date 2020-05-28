<?php 

class RequetesConn extends CI_Model{



function Connect()
{
if (isset($_POST['subConn'])) {

$mailCon = htmlspecialchars($_POST['mailCon']);
$mdpCon = password_hash($_POST['mdpCon'], PASSWORD_DEFAULT);
if (!empty($mailCon) && !empty($mdpCon)) {


		$this->db->select('*')
				->from('membre')
				->where('mail',$mailCon);
				
				$query = $this->db->get();
				

	
}
else
{

$msg_error = "Tous les champs doivent être remplis ! ";
}





}




if(isset($msg_erreur)) {

	echo $msg_erreur;
}
}


}


 ?>