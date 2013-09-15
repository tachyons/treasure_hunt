<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treasure extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('form_builder');
		$this->load->model('treasure_model');
	}

	public function index()
	{

		$data['title'] = 'Adwaita 2013 Treasure hunt';
		//$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_logged_in())
		{									// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} 
		elseif ($this->tank_auth->is_logged_in(FALSE)) 
		{						// logged in, not activated
			redirect('/auth/send_again/');

		} 
		else 
		{
			$data['is_logged_in']=FALSE;
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('treasure');
		$this->load->view('templates/footer');

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
