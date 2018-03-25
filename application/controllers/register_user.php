<?php
/**
* Register user controller
*/
class register_user extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// load form helper to work
		$this->load->helper('form');
		$this->load->helper('email');
		$this->load->library('form_validation');
		$this->load->model('common_model');
	}

	public function index(){
		$this->load->view('register_user_view');
	}

	public function create(){
		// Create user code
		$this->form_validation->set_rules('InputName', 'User first Name', 'required');
		$this->form_validation->set_rules('InputLastName', 'Last Name', 'required');
	 	$this->form_validation->set_rules('InputPassword1', 'Password', 'required');
	 	$this->form_validation->set_rules('ConfirmPassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('InputEmail1', 'Email', 'valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$data = array(
				'name' => $_POST['InputName']." ". $_POST['InputLastName'],
				'user_email' => $_POST['InputEmail1'],
				'user_pwd' => password_hash( $_POST['InputPassword1'], PASSWORD_DEFAULT ),
			);
			$this->common_model->add_user($data);
			echo "success";
		}
		
	}
}

?>