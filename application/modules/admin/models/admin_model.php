<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	function add_level($array)
	{
		$this->db->insert('levels', $array);
	}
	function get_user_level($user_id)
	{
		
	}
}