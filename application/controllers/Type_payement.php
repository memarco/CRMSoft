 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_payement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('type_payement_model','type_payement');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('type_payement/type_payement_view');
	}

	public function ajax_list()
	{
		$list = $this->type_payement->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $type_payement) {
			$no++;
			$row = array();
			$row[] = $type_payement->type_payement_libelle;
			 $row[] = $type_payement->date;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_type_payement('."'".$type_payement->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_type_payement('."'".$type_payement->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->type_payement->count_all(),
						"recordsFiltered" => $this->type_payement->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->type_payement->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'type_payement_libelle' => $this->input->post('type_payement_libelle'),
				 'date' => $this->input->post('date'),
			);
		$insert = $this->type_payement->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'type_payement_libelle' => $this->input->post('type_payement_libelle'),
				 'date' => $this->input->post('date')
			);
		$this->type_payement->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->type_payement->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
