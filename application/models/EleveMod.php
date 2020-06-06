<?php

class EleveMod extends CI_Model{


	public function readtable($table){
/*Cette fonction permet de lire la db et de la retourner*/
		$res= $this->db->get($table);
		return $res->result_array();

	}
	
	public function Connex($cle){

		$this->db->select('Clé');
		$this->db->from('Quizz');
		$this->db->where('Clé',$cle);

		$query = $this->db->get();

	if ($query->num_rows() > 0) {
 
      return $query->result();
      
    } else {
      
      return false;
    }

		
	}


	public function getID($cle){

		$leResultat['ID']=array();
		$this->db->select('ID');
		$this->db->where('Clé',$cle);
		

		$query = $this->db->get('Quizz');

		$recup = $query->row();
		return $recup->ID;
	}

	public function getKey($id){

        $result['Clé']=array();
        $this->db->select('Clé');
        $this->db->where('ID',$id);
        //$this->db->where('NOM',$nom);

        $query = $this->db->get('Quizz');

        $recup = $query->row();
        return $recup->Clé;
    }

    public function getName($cle){

        $result['NOM']=array();
        $this->db->select('NOM');
        $this->db->where('Clé',$cle);

        $query = $this->db->get('Quizz');

        $recup = $query->row();
        return $recup->NOM;
    }


    public function set_Eleve($nom,$cleP,$cleQ){

    	$this->db->set('Nom',$nom);
		$this->db->set('CléPerso',$cleP);
        $this->db->set('Clé', $cleQ);

		//$this->db->set('Note',$note);

		$this->db->insert('Eleve');
    }


    public function get_Eleve(){

    	$this->db->set('Nom',$nom);
    	$this->db->insert('Eleve');
    }

}
?>