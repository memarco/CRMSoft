<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail_suivi_model extends CI_Model {
    
public function __construct()
{
    parent::__construct();
}

//function getUserDetails()
//{
//    $query = $this->db->query('SELECT username FROM users');
//    return $query->row_array();
//}

   function getUserDetails($postData){
 
    $response = array();
 
    if($postData['numero_dossier'] ){
 
      // Select record
      $this->db->select('*');
      $this->db->where('numero_dossier', $postData['numero_dossier']);
      
      $q = $this->db->get('dossiers');
      $response = $q->result_array();
 
    }
 
    return $response;
  }

}


 