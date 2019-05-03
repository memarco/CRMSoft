 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_depense extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('type_depense_model','type_depense');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('type_depense/type_depense_view');
	}
        
        
        public function get_data()
  {
      echo json_encode($this->type_depense->get_all());
  }

	public function ajax_list()
	{
		$list = $this->type_depense->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $type_depense) {
			$no++;
			$row = array();
			$row[] = $type_depense->libelle_type_depense;
			 
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_type_depense('."'".$type_depense->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_type_depense('."'".$type_depense->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->type_depense->count_all(),
						"recordsFiltered" => $this->type_depense->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->type_depense->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'libelle_type_depense' => $this->input->post('libelle_type_depense'),
				 
			);
		$insert = $this->type_depense->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'libelle_type_depense' => $this->input->post('libelle_type_depense'),
				 
			);
		$this->type_depense->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->type_depense->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
