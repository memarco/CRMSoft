<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_suivi extends CI_Controller {

public function __construct()
 {
   parent::__construct();
   
   $this->load->model('detail_suivi_model');
 }
 
 
 public function index()
 {
    
  $this->load->helper('url');
  $this->load->view('detail_suivi/detail_suivi_view');
 }
 
 
 public function userDetails(){
  // POST data
  $postData = $this->input->post();

  //load model
  $this->load->model('detail_suivi_model');

  // get data
  $data = $this->detail_suivi_model->getUserDetails($postData);

  echo json_encode($data);
 }

 
 
 
// public function index()
// {
//   $data['groups'] = $this->detail_suivi_model->getUserDetails();
//   $this->load->helper('url');
//   $this->load->view('detail_suivi/detail_suivi_view');
// }


 
 

}  
