<?php
/**
* Common Model for DB operation
*/
class common_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function add_user($data){
		return $this->db->insert('appuser', $data);

	}

}

?>