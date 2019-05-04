 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depense extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
   $this->load->model('type_depense_model','type_depense');
   $this->load->model('depense_model','depense');
 }

 public function index()
 {
   $this->load->helper('url');
   $this->load->view('depense/depense_view');
 }
 
 
 public function get_data()
  {
      echo json_encode($this->depense->get_all());
  }

 public function open()
 {
   $this->load->helper('url');
   $this->load->view('depense/new');
 }


 public function ajax_list()
 {
   $list = $this->depense->get_datatables();
   $data = array();
   $no = $_POST['start'];
   foreach ($list as $depense) {
     $no++;
     $row = array();
     $row[] = $depense->libelle_type_depense;
     $row[] = $depense->libelle_dossier;
//     $row[] = $depense->num_depense;
     $row[] = $depense->libelle_depense;
     $row[] = $depense->montant_depense;
     $row[] = $depense->date;
     $row[] = $depense->commentaire_depense;

     //add html for action
     $row[] = '<a href="javascript:void(0);" class="btn btn-info btn-sm editRecord"   title="Edit" onclick="edit_depense('."'".$depense->id."'".')">  Edit</a>
        <a href="javascript:void(0);" class="btn btn-danger btn-sm deleteRecord"   title="Hapus" onclick="delete_depense('."'".$depense->id."'".')">  Delete</a>';


     $data[] = $row;
   }

   $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->depense->count_all(),
           "recordsFiltered" => $this->depense->count_filtered(),
           "data" => $data,
       );
   //output to json format
   echo json_encode($output);
 }

 public function ajax_edit($id)
 {
   $data = $this->depense->get_by_id($id);
   echo json_encode($data);
 }

//public function generate_num_dossier($id){
//  $time =  strtotime(date("Y-m-d H:i:s"));
//  $client = $this->client->get_by_id($id);
//  $nom = strtoupper($client->nom_client);
//  $prenom =  strtoupper($client->prenom_client);
//  return  substr($nom, 0, 1).substr($prenom,0,1).$time;
//}
public function success(){
  $this->load->view('depense/success');
}
 public function ajax_add()
 {
   $data = array(
       'id_type_depense' => $this->input->post('id_type_depense'),
       'id_dossier' => $this->input->post('id_dossier'),
//       'num_depense' => $this->generate_num_dossier($this->input->post('id_client')),
       'libelle_depense' => $this->input->post('libelle_depense'),
       'montant_depense' => $this->input->post('montant_depense'),
       'date' => date("Y-m-d H:i:s"),
       'commentaire_depense' => $this->input->post('commentaire_depense')
     );
  $insert = $this->depense->save($data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_update()
 {
   $data = array(
       'id_type_depense' => $this->input->post('id_type_depense'),
       'id_dossier' => $this->input->post('id_dossier'),
//       'num_depense' => $this->generate_num_dossier($this->input->post('id_client')),
       'libelle_depense' => $this->input->post('libelle_depense'),
       'montant_depense' => $this->input->post('montant_depense'),
       'date' => date("Y-m-d H:i:s"),
       'commentaire_depense' => $this->input->post('commentaire_depense')
     );
   $this->depense->update(array('id' => $this->input->post('id')), $data);
   echo json_encode(array("status" => TRUE));
 }

 public function ajax_delete($id)
 {
   $this->depense->delete_by_id($id);
   echo json_encode(array("status" => TRUE));
 }

}
