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
	function get_levels()
	{
		$query = $this->db->get('levels');
		return $query->result_array();
	}
	function get_level_data($level)
	{
		$this->db->where('level', $level); 
		$query = $this->db->get('levels');
		return $query->row_array();
	}
	function edit_level($level,$array)
	{
		$this->db->where('level', $level);
		$this->db->update('levels', $array); 
	}
	
}