<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dossier extends CI_Controller {

 public function __construct()
 {

   parent::__construct();
   $this->load->model('dossier_model','dossier');
   $this->load->model('client_model','client');
   /* $this->load->library(['ion_auth', 'form_validation']);
   $this->load->helper(['url', 'language']);
   $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
   $this->lang->load('auth');
   if (!$this->ion_auth->logged_in())
   {
     // redirect them to the login page
     redirect('auth/login', 'refresh');
   } */
 }

 public function index()
 {
   $this->load->helper('url');
   $this->load->view('dossier/dossier_view');
 }


//  public function suivi()
//  {
//    $this->load->helper('url');
//    $this->load->view('dossier/suivi');
//  }
//
  public function detail_suivi()
  {
    $this->load->helper('url');
    $this->load->view('dossier/detail_suivi');
  }


 public function get_data()
  {
      echo json_encode($this->dossier->getDossierall());
  }

// public function open()
// {
//   $this->load->helper('url');
//   $this->load->view('dossier/new');
// }
//
// public function dep()
// {
//   $this->load->helper('url');
//   $this->load->view('dossier/edit_depense');
// }
//
// public function paye()
// {
//   $this->load->helper('url');
//   $this->load->view('dossier/edit_payement');
// }


 public function ajax_list()
 {
   //$list = $this->dossier->getDossierdatatables();
   //$data = array();
   $output = array('data' => array());
   $data = $this->dossier->getDossierdatatables();
   //$no = $_POST['start'];
   foreach ($data as $key => $value) {
    $client_data = $this->client->getclientdatatables($value['client_id']);
     //$no++;
//     $row = array();
//      
//     $row[] = $value->id;
//     $row[] = $value->nom_client;
//     $row[] = $value->numero_dossier;
//     $row[] = $value->status_dossier;
//     $row[] ='<div style="text-align:center; font-weight:bold; width:100%">'.$value->montant_traitement.'</div>';
//     $row[] = $value->date_creation;
//     $row[] = $value->description_dossier;
//
//     //add html for action
//     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_dossier('."'".$dossier->id."'".')">  Edit</a>
//        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_dossier('."'".$dossier->id."'".')">  Delete</a>';

    //  $row[] = '<div style="text-align:center; font-weight:bold; width:100%"><a class="btn btn-info btn-sm editRecord"   title="Edit" href="'.base_url().'index.php/dossier/dep/ ">  <i class="fa fa-edit"></i></a>
      //   <a class="btn btn-danger btn-sm deleteRecord"   title="Hapus" href="'.base_url().'index.php/dossier/paye/ ">  <i class="fa fa-trash-o"></i></a></div>';

     //$data[] = $row;
   
$output['data'][$key] = array(
				
				//$value['id'],
                                $client_data[0]['nom_client']. ' ' .$client_data[0]['prenom_client'],
			        $value['numero_dossier'],
                                $value['status_dossier'],
                                $value['montant_traitement'],
                                $value['date_creation'],
                                $value['description_dossier'],
    '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_dossier('."'".$value['id']."'".')">  Edit</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_dossier('."'".$value['id']."'".')">  Delete</a>'
			);
   }
   
//   $output = array(
//           "draw" => $_POST['draw'],
////           "recordsTotal" => $this->dossier->count_all(),
////           "recordsFiltered" => $this->dossier->count_filtered(),
//           "data" => $data,
//       );
   //output to json format
   echo json_encode($output);
   
   
//var_dump($client_data);

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
  $client = $this->client->getclient_by_id($id);
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
       
       'numero_dossier' => $this->generate_num_dossier($this->input->post('client_id')),
       'status_dossier' => $this->input->post('status_dossier'),
       'client_id' => $this->input->post('client_id'),
       'montant_traitement' => $this->input->post('montant_traitement'),
       'date_creation' => date("Y-m-d H:i:s"),
       'description_dossier' => $this->input->post('description_dossier')
     );
  $insert = $this->dossier->save($data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_update()
 {

   $id = $this->input->post('id');
   $data = array(
       //'numero_dossier' => $this->generate_num_dossier($this->input->post('client_id')),
       'status_dossier' => $this->input->post('status_dossier'),
       'client_id' => $this->input->post('client_id'),
       'montant_traitement' => $this->input->post('montant_traitement'),
       'date_creation' => date("Y-m-d H:i:s"),
       'description_dossier' => $this->input->post('description_dossier')
     );
   $this->dossier->update($id, $data);
   echo json_encode(array("status" => TRUE));
 }




  public function ajax_delete($id)
	{
		$this->dossier->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
