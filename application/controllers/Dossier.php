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

 public function open()
 {
   $this->load->helper('url');
   $this->load->view('dossier/new');
 }


 public function ajax_list()
 {
   $list = $this->client->get_datatables();
   $data = array();
   $no = $_POST['start'];
   foreach ($list as $client) {
     $no++;
     $row = array();
     $row[] = $client->nom_client;
     $row[] = $client->prenom_client;
     $row[] = $client->email_client;
                       $row[] = $client->tel_client;
                       $row[] = $client->addresse_client;
     $row[] = $client->autre_info_client;

     //add html for action
     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_client('."'".$client->id."'".')">  Edit</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_client('."'".$client->id."'".')">  Delete</a>';


     $data[] = $row;
   }

   $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->client->count_all(),
           "recordsFiltered" => $this->client->count_filtered(),
           "data" => $data,
       );
   //output to json format
   echo json_encode($output);
 }

 public function ajax_edit($id)
 {
   $data = $this->client->get_by_id($id);
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
       'id_categorie' => $this->input->post('id_categorie'),
       'numero_dossier' => $this->generate_num_dossier($this->input->post('id_client')),
       'libelle_dossier' => $this->input->post('libelle_dossier'),
       'montant_traitement' => $this->input->post('montant_traitement'),
       'date' => date("Y-m-d H:i:s"),
       'description_dossier' => $this->input->post('description_dossier')
     );
  $insert = $this->dossier->save($data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_update()
 {
   $data = array(
       'nom_client' => $this->input->post('nom_client'),
       'prenom_client' => $this->input->post('prenom_client'),
       'email_client' => $this->input->post('email_client'),
                                'tel_client' => $this->input->post('tel_client'),
     'addresse_client' => $this->input->post('addresse_client'),
       'autre_info_client' => $this->input->post('autre_info_client')
     );
   $this->client->update(array('id' => $this->input->post('id')), $data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_delete($id)
 {
   $this->client->delete_by_id($id);
   echo json_encode(array("status" => TRUE));
 }

}
