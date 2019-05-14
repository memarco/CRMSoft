<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suivi_dossier extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('dossier_model','dossier');
   $this->load->model('Suivi_dossier_model','suivi_dossier');
 }

 public function index()
 {
   $this->load->helper('url');
   $this->load->view('suivi_dossier/suivi');
 }


  public function detail_suivi()
  {
    $this->load->helper('url');
    $this->load->view('dossier/detail_suivi');
  }


 public function get_data()
  {
      echo json_encode($this->suivi_dossier->get_all());
  }

 public function open()
 {
   $this->load->helper('url');
   $this->load->view('dossier/new');
 }
 
  
 
 //fonction template métier
 public function ajax_list_suivi()
 {
   $list = $this->suivi_dossier->get_suivi_datatables();
   $data = array();
   $no = $_POST['start'];
   foreach ($list as $suivi_dossier) {
     $no++;
     $row = array();
     $row[] = $suivi_dossier->numero_dossier;
     $row[] = $suivi_dossier->libelle_categorie;
     $row[] = $suivi_dossier->nom_client.' '.$suivi_dossier->prenom_client;
     $row[] = $suivi_dossier->status_dossier;
     $row[] ='<div style="text-align:center; font-weight:bold; width:100%">'.$suivi_dossier->montant_traitement.'</div>';
     $row[] = $suivi_dossier->montant_depense;
     $row[] = $suivi_dossier->montant_payement;
     $row[] = $suivi_dossier->marge = $suivi_dossier->montant_payement - $suivi_dossier->montant_depense;

     //add html for action
//     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_dossier('."'".$dossier->id."'".')">  Paiment</a>
//        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_dossier('."'".$dossier->id."'".')">  Dépense</a>';

      $row[] = '<div style="text-align:center; font-weight:bold; width:100%"><a class="btn btn-info btn-sm editRecord"   title="Edit" href="'.base_url().'index.php/dossier/detail_suivi/ ">  <i class="fa fa-eye"></i></a></div>';
         

     $data[] = $row;
   }

   $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->suivi_dossier->count_all(),
           "recordsFiltered" => $this->suivi_dossier->count_filtered(),
           "data" => $data,
       );
   //output to json format
   echo json_encode($output);
 }
  
}
