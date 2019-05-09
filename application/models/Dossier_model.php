<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dossier_model extends CI_Model {

 var $table = 'dossiers';
 var $column_order = array('cli.nom_client','ca.libelle_categorie','d.numero_dossier','d.libelle_dossier','d.montant_traitement','d.date','d.description_dossier'); //set column field database for datatable orderable
 var $column_search = array('nom_client','libelle_dossier'); //set column field database for datatable searchable just firstname , lastname , address are searchable
 var $order = array('d.id' => 'desc'); // default order

 public function __construct()
 {
   parent::__construct();
   $this->load->database();
 }

 private function _get_datatables_query()
 {

   $this->db->from('dossiers as d');
   $this->db->join('clients as cli', 'cli.id = d.id_client','left');
   $this->db->join('categories as ca', 'ca.id = d.id_categorie','left');

   $i = 0;

   foreach ($this->column_search as $item) // loop column
   {
     if($_POST['search']['value']) // if datatable send POST for search
     {

       if($i===0) // first loop
       {
         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
         $this->db->like($item, $_POST['search']['value']);
       }
       else
       {
         $this->db->or_like($item, $_POST['search']['value']);
       }

       if(count($this->column_search) - 1 == $i) //last loop
         $this->db->group_end(); //close bracket
     }
     $i++;
   }

   if(isset($_POST['order'])) // here order processing
   {
     $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
   }
   else if(isset($this->order))
   {
     $order = $this->order;
     $this->db->order_by(key($order), $order[key($order)]);
   }
 }
 public function get_all()
 {
   $this->db->from($this->table);
   $query = $this->db->get();

   return $query->result();
 }
 function get_datatables()
 {
   $this->_get_datatables_query();
   if($_POST['length'] != -1)
   $this->db->limit($_POST['length'], $_POST['start']);
   $query = $this->db->get();
   return $query->result();
 }

 function count_filtered()
 {
   $this->_get_datatables_query();
   $query = $this->db->get();
   return $query->num_rows();
 }

 public function count_all()
 {
   $this->db->from($this->table);
   return $this->db->count_all_results();
 }

 public function get_by_id($id)
 {
   $this->db->from($this->table);
   $this->db->where('id',$id);
   $query = $this->db->get();

   return $query->row();
 }

 public function save($data)
 {
   $this->db->insert($this->table, $data);
   return $this->db->insert_id();
 }

 public function update($where, $data)
 {
   $this->db->update($this->table, $data, $where);
   return $this->db->affected_rows();
 }

 public function delete_by_id($id)
 {
   $this->db->where('id', $id);
   $this->db->delete($this->table);
 }


}