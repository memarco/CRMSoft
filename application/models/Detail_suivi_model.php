<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail_suivi_model extends CI_Model {
// var $table = 'dossiers';
// var $column_order = array('d.numero_dossier','cli.nom_client','ca.libelle_categorie','d.status_dossier','d.montant_traitement','dp.montant_depense'); //set column field database for datatable orderable
// var $column_search = array('nom_client','status_dossier'); //set column field database for datatable searchable just firstname , lastname , address are searchable
// var $order = array('d.id' => 'desc');
//
public function __construct()
{
    parent::__construct();
}

//function getUserDetails()
//{
//    $query = $this->db->query('SELECT username FROM users');
//    return $query->row_array();
//}

   function getDossierPayment($postData){

    //$response = array();

    if($postData['numero_dossier'] ){

      // Select record

        $this->db->select('*');
        $this->db->from('payements as p');
        $this->db->join('dossiers as d', 'p.id_dossier = d.id','left');
        $this->db->join('clients as cl', 'd.id_client = cl.id','left');

      $this->db->where('numero_dossier', $postData['numero_dossier']);
      //$q = $this->db->get('dossiers');
      $query = $this->db->get();
      return $query->result();
      //$response = $q->result_array();

    }

    //return $response;
  }


     function getDossierDepense($postData){

      //$response = array();

      if($postData['numero_dossier'] ){
        // Select record

          $this->db->select('*');
          $this->db->from('depenses as p');
          $this->db->join('dossiers as d', 'p.id_dossier = d.id','left');
          $this->db->join('clients as cl', 'd.id_client = cl.id','left');

        $this->db->where('numero_dossier', $postData['numero_dossier']);
        //$q = $this->db->get('dossiers');
        $query = $this->db->get();
        return $query->result();
        //$response = $q->result_array();

      }

      //return $response;
    }


 function get_kota($postData) {


     if($postData['numero_dossier'] ){

      $this->db->from('dossiers as d');
      $this->db->join('payements as pay','pay.id_dossier = d.id','left');

    $this->db->where('numero_dossier', $postData['numero_dossier']);
    $query = $this->db->get();
    return $query->result();
 }

}




// private function _get_detail_suivi_datatables()
// {
//
//   $this->db->from('dossiers as d');
//   //$this->db->join('depenses as dp', 'dp.id_dossier = d.id','left');
//   $this->db->join('payements as pay','pay.id_dossier = d.id','left');
//
//
//
//   $i = 0;
//
//   foreach ($this->column_search as $item) // loop column
//   {
//     if($_POST['search']['value']) // if datatable send POST for search
//     {
//
//       if($i===0) // first loop
//       {
//         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
//         $this->db->like($item, $_POST['search']['value']);
//       }
//       else
//       {
//         $this->db->or_like($item, $_POST['search']['value']);
//       }
//
//       if(count($this->column_search) - 1 == $i) //last loop
//         $this->db->group_end(); //close bracket
//     }
//     $i++;
//   }
//
//   if(isset($_POST['order'])) // here order processing
//   {
//     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
//   }
//   else if(isset($this->order))
//   {
//     $order = $this->order;
//     $this->db->order_by(key($order), $order[key($order)]);
//   }
// }
//
//
// public function get_all()
// {
//   if($_POST['length'] != -1)
//   $this->db->limit($_POST['length'], $_POST['start']);
//   $this->db->from($this->table);
//   $query = $this->db->get();
//
//   return $query->result();
// }
//
// function get_detail_suivi_datatables()
// {
//   $this->_get_detail_suivi_datatables();
//   $query = $this->db->get();
//   return $query->result();
// }
//
//function count_filtered()
// {
//   $this->_get_detail_suivi_datatables();
//   $query = $this->db->get();
//   return $query->num_rows();
// }
//
// public function count_all()
// {
//   $this->db->from($this->table);
//   return $this->db->count_all_results();
// }


}
