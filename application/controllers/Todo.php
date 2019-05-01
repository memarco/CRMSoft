 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('todo_model','todo');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('todo/todo_view');
	}

	public function ajax_list()
	{
		$list = $this->todo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $todo) {
			$no++;
			$row = array();
			$row[] = $todo->libelle_todo;
			$row[] = $todo->deadline_todo;
			$row[] = $todo->date;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_todo('."'".$todo->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_todo('."'".$todo->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->todo->count_all(),
						"recordsFiltered" => $this->todo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->todo->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'libelle_todo' => $this->input->post('libelle_todo'),
				'deadline_todo' => $this->input->post('deadline_todo'),
				'date' => $this->input->post('date'),
			);
		$insert = $this->todo->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'libelle_todo' => $this->input->post('libelle_todo'),
				'deadline_todo' => $this->input->post('deadline_todo'),
				'date' => $this->input->post('date')
			);
		$this->todo->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->todo->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
