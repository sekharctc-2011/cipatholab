<?php
/**
* @dashboard controller for default application dashboard content
*/
class dashboard extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		
	}

	public function index($page = 'dashboard'){
		if ( ! file_exists(APPPATH.'views/'.$page.'.php')) {
			//ohh we do not have this page
			show_404();
		}

		$data['title'] = ucfirst($page);
		$this->load->view('templates/header', $data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer', $data);
	}
}
?>