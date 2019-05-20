<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dossier extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('client_model','client');
   $this->load->model('dossier_model','dossier');
 }

 public function index()
 {
   $this->load->helper('url');
   $this->load->view('dossier/dossier_view');
 }


  public function suivi()
  {
    $this->load->helper('url');
    $this->load->view('dossier/suivi');
  }

  public function detail_suivi()
  {
    $this->load->helper('url');
    $this->load->view('dossier/detail_suivi');
  }


 public function get_data()
  {
      echo json_encode($this->dossier->get_all());
  }

 public function open()
 {
   $this->load->helper('url');
   $this->load->view('dossier/new');
 }

 public function dep()
 {
   $this->load->helper('url');
   $this->load->view('dossier/edit_depense');
 }

 public function paye()
 {
   $this->load->helper('url');
   $this->load->view('dossier/edit_payement');
 }


 public function ajax_list()
 {
   $list = $this->dossier->get_datatables();
   $data = array();
   $no = $_POST['start'];
   foreach ($list as $dossier) {
     $no++;
     $row = array();
     $row[] = $dossier->nom_client.' '.$dossier->prenom_client;
     //$row[] = $dossier->libelle_categorie;
     $row[] = $dossier->numero_dossier;
     $row[] = $dossier->status_dossier;
     $row[] ='<div style="text-align:center; font-weight:bold; width:100%">'.$dossier->montant_traitement.'</div>';
     $row[] = $dossier->date_creation;
     $row[] = $dossier->description_dossier;

     //add html for action
     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_dossier('."'".$dossier->id."'".')">  Edit</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_dossier('."'".$dossier->id."'".')">  Delete</a>';

    //  $row[] = '<div style="text-align:center; font-weight:bold; width:100%"><a class="btn btn-info btn-sm editRecord"   title="Edit" href="'.base_url().'index.php/dossier/dep/ ">  <i class="fa fa-edit"></i></a>
      //   <a class="btn btn-danger btn-sm deleteRecord"   title="Hapus" href="'.base_url().'index.php/dossier/paye/ ">  <i class="fa fa-trash-o"></i></a></div>';


     $data[] = $row;
   }

   $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->dossier->count_all(),
           "recordsFiltered" => $this->dossier->count_filtered(),
           "data" => $data,
       );
   //output to json format
   echo json_encode($output);
 }

public function detail_client($id)
{
  $data = $this->dossier->get_by_id_client($id);
  echo json_encode($data);
}

 public function ajax_edit($id)
 {
   $data = $this->dossier->get_by_id($id);
   echo json_encode($data);
 }

public function generate_num_dossier($id){
  $time =  strtotime(date("Y-m-d H:i:s"));
  $client = $this->client->get_by_id($id);
  $nom = strtoupper($client->nom_client);
  $prenom =  strtoupper($client->prenom_client);
  return  substr($nom, 0, 1).substr($prenom,0,1).$time;
}
public function success(){
  $this->load->view('dossier/success');
}
 public function ajax_add()
 {
   $data = array(
       'id_client' => $this->input->post('id_client'),
       //'id_categorie' => $this->input->post('id_categorie'),
       'numero_dossier' => $this->generate_num_dossier($this->input->post('id_client')),
       'status_dossier' => $this->input->post('status_dossier'),
       'montant_traitement' => $this->input->post('montant_traitement'),
       'date_creation' => date("Y-m-d H:i:s"),
       'description_dossier' => $this->input->post('description_dossier')
     );
  $insert = $this->dossier->save($data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_update()
 {
   $data = array(
       'id_client' => $this->input->post('id_client'),
       //'id_categorie' => $this->input->post('id_categorie'),
       //'numero_dossier' => $this->generate_num_dossier($this->input->post('id_client')),
       'status_dossier' => $this->input->post('status_dossier'),
       'montant_traitement' => $this->input->post('montant_traitement'),
       'date_creation' => date("Y-m-d H:i:s"),
       'description_dossier' => $this->input->post('description_dossier')
     );
   $this->dossier->update(array('id' => $this->input->post('id')), $data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_delete($id)
 {
   $this->dossier->delete_by_id($id);
   echo json_encode(array("status" => TRUE));
 }

}
