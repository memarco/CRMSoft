<?php
class Clients extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ClientModel');
	}
	function index(){
		$this->load->view('clients/index');
	}
	function show(){
		$data=$this->ClientModel->listClient();
		echo json_encode($data);
	}
	function save(){
		$data=$this->ClientModel->saveClient();
		echo json_encode($data);
	}
	function update(){
		$data=$this->ClientModel->updateClient();
		echo json_encode($data);
	}
	function delete(){
		$data=$this->EmpModel->deleteEmp();
		echo json_encode($data);
	}
}
