<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_suivi extends CI_Controller {

public function __construct()
 {
   parent::__construct();
   
   $this->load->model('detail_suivi_model','detail_suivi');
 }
 
 
 public function index()
 {
  //$data['groups'] = $this->detail_suivi->getUserDetails($postData);
  $this->load->helper('url');
  $this->load->view('detail_suivi/detail_suivi_view');
 }
 
// public function get_data()
//  {
//      echo json_encode($this->detail_suivi->get_all());
//  }
  
  
 public function userDetails(){
  // POST data
  $postData = $this->input->post();

  //load model
  $this->load->model('detail_suivi_model');

  // get data
  $data = $this->detail_suivi_model->getUserDetails($postData);

  echo json_encode($data);
 }
 
  public function ajax_getkotas() {
    //$kotas = $this->detail_suivi_model->get_kota($id_dossier);
    $postData = $this->input->post(); 
    
    $list = $this->detail_suivi->get_kota($postData);
    
    //$data = array();
    foreach ($list as $detail_suivi) {
       echo '<tr>\n';
           echo '<td>' . $detail_suivi->date . '</td><td>' . $detail_suivi->montant_payement . '</td><td>' . $detail_suivi->commentaire_payement . '</td>\n';
       echo '</tr>\n';
       
       //$data[] = $row;
  }
  
    }
 
//public function ajax_list_suivi()
// {
//   $list = $this->detail_suivi->get_detail_suivi_datatables();
//   $data = array();
//   $no = $_POST['start'];
//   foreach ($list as $detail_suivi) {
//     $no++;
//     $row = array();
//     $row[] = $detail_suivi->date;
//     $row[] ='<div style="text-align:center; font-weight:bold; width:100%">'.$detail_suivi->montant_payement.'</div>';
//     $row[] = $detail_suivi->commentaire_payement;
//      
//   $data[] = $row;
//   }
//
//   $output = array(
//           "draw" => $_POST['draw'],
//           "recordsTotal" => $this->detail_suivi->count_all(),
//           "recordsFiltered" => $this->detail_suivi->count_filtered(),
//           "data" => $data,
//       );
//   //output to json format
//   echo json_encode($output);
// }
//  
}
 

 
 
 