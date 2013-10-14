<?php
class Treasure_model extends CI_Model {

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
		$this->db->select('level');
		$this->db->where('user_id', $user_id); 
		$query = $this->db->get('user_profiles');
		$result=$query->result_array();
		return $result[0]['level'];
	}
	function get_question($level)
	{
		$this->db->select('title,description,photo,level');
		$this->db->where('level', $level+1);
		$query = $this->db->get('levels');
		$result=$query->result_array(); 
		return $result;
	}
	function check_answer($answer,$level)
	{
		$this->db->select('answer');
		$this->db->where('level', $level+1);
		$query = $this->db->get('levels');
		$result=$query->result_array();
		//echo $result[0]['answer']."  ".$answer;
		if($result[0]['answer']==$answer)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function increment_level($user_id,$level)
	{
		$data = array(
               'level' => $level+1,
         );

		$this->db->where('user_id', $user_id);
		$this->db->update('user_profiles', $data); 
	}
	function setfame($array)
	{
		if($this->db->insert('fame', $array))
		{
			return TRUE;
		}
	}
	function changeanswer($user)
	{
		$data = array(
               'answer' => sha1($user),
            );

		$this->db->where('level', 25);
		$this->db->update('levels', $data);
	}
}
