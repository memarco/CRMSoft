<?php
class Type_depenses extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Type_depenseModel');
	}
	function index(){
		$this->load->view('type_depenses/index');
	}
	function show(){
		$data=$this->Type_depenseModel->listType_depense();
		echo json_encode($data);
	}
	function save(){
		$data=$this->Type_depenseModel->saveType_depense();
		echo json_encode($data);
	}
	function update(){
		$data=$this->Type_depenseModel->updateType_depense();
		echo json_encode($data);
	}
	function delete(){
		$data=$this->Type_depenseModel->deleteType_depense();
		echo json_encode($data);
	}
}
