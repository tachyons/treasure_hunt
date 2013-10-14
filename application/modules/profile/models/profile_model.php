<?php
class Profile_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	function get_user_data($userid)
	{
		$this->db->where('user_id', $userid);
		$query = $this->db->get('user_profiles');
		return $query->row_array();
	}
	function get_level_data($user_id)
	{
		$this->db->where('level', $level); 
		$query = $this->db->get('levels');
		return $query->row_array();
	}	
}