 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categorie_model','categorie');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('categorie_view');
	}

	public function ajax_list()
	{
		$list = $this->categorie->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $categorie) {
			$no++;
			$row = array();
			$row[] = $categorie->libelle_categories;
		
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_categorie('."'".$categorie->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_categorie('."'".$categorie->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->categorie->count_all(),
						"recordsFiltered" => $this->categorie->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($Id_categorie)
	{
		$data = $this->categorie->get_by_id($Id_categorie);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'libelle_categorie' => $this->input->post('libelle_categorie')
				
			);
		$insert = $this->categorie->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'libelle_categorie' => $this->input->post('libelle_categorie')
			);
		$this->categorie->update(array('Id_categorie' => $this->input->post('Id_categorie')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($Id_categorie)
	{
		$this->categorie->delete_by_id($Id_categorie);
		echo json_encode(array("status" => TRUE));
	}

}
