<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// /* public function __construct()
		// {
			// parent::__construct();
			// $this->load->database();
			// $this->load->library(['ion_auth', 'form_validation']);
			// $this->load->helper(['url', 'language']);
			// $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			// $this->lang->load('auth');
		// }
	// /**
	 // * Index Page for this controller.
	 // *
	 // * Maps to the following URL
	 // * 		http://example.com/index.php/welcome
	 // *	- or -
	 // * 		http://example.com/index.php/welcome/index
	 // *	- or -
	 // * Since this controller is set as the default controller in
	 // * config/routes.php, it's displayed at http://example.com/
	 // *
	 // * So any other public methods not prefixed with an underscore will
	 // * map to /index.php/welcome/<method_name>
	 // * @see https://codeigniter.com/user_guide/general/urls.html
	 // */
	// public function index()
	// {
		// if (!$this->ion_auth->logged_in())
		// {
			//redirect them to the login page
			// redirect('auth/login', 'refresh');
		// }
		// else
		// {
			// $this->load->view('index');
		// }
	// } */
	public function index()
	{
		$this->load->view('index');
	}
}
