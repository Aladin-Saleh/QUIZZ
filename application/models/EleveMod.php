<?php

class EleveMod extends CI_Model{


    public function readtable($table){

    /*Cette fonction permet de lire la db et de la retourner*/

        $res= $this->db->get($table);
        return $res->result_array();

    }
/*_______________________________________________________________________________________________________________________________________________________*/

    /*Elle permet de vérifier si la $cle existe bien*/
    
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

/*_______________________________________________________________________________________________________________________________________________________*/

    /*La fontion retourne l'id de l'utilisateur*/

    public function getID($cle){

        $leResultat['ID']=array();
        $this->db->select('ID');
        $this->db->where('Clé',$cle);
        

        $query = $this->db->get('Quizz');

        $recup = $query->row();
        return $recup->ID;
    }
/*_______________________________________________________________________________________________________________________________________________________*/

    /* La fonction retourne la clé du Quizz en fonction de l'id*/
    public function getKey($id){

        $result['Clé']=array();
        $this->db->select('Clé');
        $this->db->where('ID',$id);
        //$this->db->where('NOM',$nom);

        $query = $this->db->get('Quizz');

        $recup = $query->row();
        return $recup->Clé;
    }
/*_______________________________________________________________________________________________________________________________________________________*/

    /* La fonction retourne le nom du Quizz en fonction de la clé*/

    public function getName($cle){

        $result['NOM']=array();
        $this->db->select('NOM');
        $this->db->where('Clé',$cle);

        $query = $this->db->get('Quizz');

        $recup = $query->row();
        return $recup->NOM;
    }

/*_______________________________________________________________________________________________________________________________________________________*/

    /* Cette fonction permet d'ajouter le nom, la clé Personnel et la clé du Quizz dans la table Eleve*/

    public function set_Eleve($nom,$cleP,$cleQ){

        $this->db->set('Nom',$nom);
        $this->db->set('CléPerso',$cleP);
        $this->db->set('Clé', $cleQ);
        
        $this->db->insert('Eleve');
    }
/*_______________________________________________________________________________________________________________________________________________________*/

    /*Cette fonction permet d'ajouter la note à la table Eleve*/

    public function set_Resultat($res,$clePerso,$nom,$mauvaiseRep){

        $this->db->set('Note', $res);
        $this->db->set('MauvaiseReponse', $mauvaiseRep);
        $this->db->where('Nom',$nom);
        $this->db->where('CléPerso', $clePerso);


        $this->db->update('Eleve');
    }


/*_______________________________________________________________________________________________________________________________________________________*/

    /*Ici cela permet de vérifier si la clé personne existe bien dans la table*/
    
    public function Connexion($cle){

        $this->db->select('CléPerso');
        $this->db->from('Eleve');
        $this->db->where('CléPerso',$cle);

        $query = $this->db->get();

    if ($query->num_rows() > 0) {
 
      return $query->result();
      
    } else {
      
      return false;
    }

        
    }

}
?>