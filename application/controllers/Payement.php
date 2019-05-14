<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payement extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('dossier_model','dossier');
   $this->load->model('payement_model','payement');
 }

 public function index()
 {
   $this->load->helper('url');
   $this->load->view('payement/payement_view');
 }

 public function open()
 {
   $this->load->helper('url');
   $this->load->view('payement/new');
 }


 public function ajax_list()
 {
   $list = $this->payement->get_datatables();
   $data = array();
   $no = $_POST['start'];
   foreach ($list as $payement) {

     $no++;
     $row = array();
     $row[] = $payement->status_dossier;
     $row[] = $payement->type_payement_libelle;
     $row[] = $payement->libelle_payement;
     $row[] = $payement->montant_payement;
     $row[] = $payement->date;
     $row[] = $payement->commentaire_payement;

     //add html for action
     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_payement('."'".$payement->id."'".')">  Edit</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_payement('."'".$payement->id."'".')">  Delete</a>';


     $data[] = $row;
   }

   $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->payement->count_all(),
           "recordsFiltered" => $this->payement->count_filtered(),
           "data" => $data,
       );
   //output to json format
   echo json_encode($output);
 }

 public function ajax_edit($id)
 {
   $data = $this->payement->get_by_id($id);
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
  $this->load->view('payement/success');
}
 public function ajax_add()
 {
   $data = array(
       'id_dossier' => $this->input->post('id_dossier'),
       'id_type_payement' => $this->input->post('id_type_payement'),
//       'numero_dossier' => $this->generate_num_dossier($this->input->post('id_client')),
       'libelle_payement' => $this->input->post('libelle_payement'),
       'montant_payement' => $this->input->post('montant_payement'),
       'date' => date("Y-m-d H:i:s"),
       'commentaire_payement' => $this->input->post('commentaire_payement')
     );
  $insert = $this->payement->save($data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_update()
 {
   $data = array(
       'id_dossier' => $this->input->post('id_dossier'),
       'id_type_payement' => $this->input->post('id_type_payement'),
//       'numero_dossier' => $this->generate_num_dossier($this->input->post('id_client')),
       'libelle_payement' => $this->input->post('libelle_payement'),
       'montant_payement' => $this->input->post('montant_payement'),
       'date' => date("Y-m-d H:i:s"),
       'commentaire_payement' => $this->input->post('commentaire_payement')
     );
   $this->payement->update(array('id' => $this->input->post('id')), $data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_delete($id)
 {
   $this->payement->delete_by_id($id);
   echo json_encode(array("status" => TRUE));
 }

}
