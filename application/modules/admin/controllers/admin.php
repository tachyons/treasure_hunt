<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->lang->load('tank_auth');
		$this->load->library('form_builder');
		$this->load->model('admin_model');
		$this->load->library('table');
	}

	public function index()
	{

		$data['title'] = 'Admin panel';
		//$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{									// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		}
		elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else
		{
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('admin');
		$this->load->view('templates/footer');

	}
	public function addlevels()
	{
		$data['title'] = 'Add levels ';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{									// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		}
		else if ($this->tank_auth->is_logged_in(FALSE))
		{						// logged in, not activated
			redirect('/auth/send_again/');

		}
		else
		{
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		if($_POST)
		{
		    $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
		    //$this->form_validation->set_rules('javascript', 'Title', 'trim|required|xss_clean');
		    //$this->form_validation->set_rules('cookie', 'Cookie', 'trim|required|xss_clean');
		    $this->form_validation->set_error_delimiters('<div class="alert alert-error"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
			if($this->form_validation->run() == FALSE)
		   	{
		     	//Field validation failed.  
		     	$this->load->view('templates/header', $data);
				$this->load->view('templates/mainnav', $data);
		     	$this->load->view('admin/addlevels');
		     	$this->load->view('templates/footer');
		   	}
		   	else
			{
				$title= $this->input->post('title');
				$level=$this->input->post('level');
				$name=$this->input->post('name');
				$description= $this->input->post('description');
				$answer= sha1($this->input->post('answer'));
				$javascript= $this->input->post('javascript');
				$cookie=$this->input->post('cookie');
				$photo= $_FILES["photo"]["name"];
				$array = array(
					"title" => "$title",
					"level" => "$level",
					"name" => "$name",
					"description" => "$description",
					"answer" => "$answer",
					"javascript" => "$javascript",
					"description" => "$description",
					"cookie" => "$cookie",
					"photo" => "$photo",
				);
				$result = $this->admin_model->add_level($array);
				$config['upload_path'] = 'assets/images/';
				$config['allowed_types'] = 'gif|jpg|png';
				/*$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';*/
				$this->load->library('upload', $config);
								
				if ( ! $this->upload->do_upload('photo'))
				{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					redirect('admin/addlevels');
					//$this->load->view('admin/add', $error);
				}
				else
				{
					redirect('admin/addlevels');
				}
			}
		
		}
		else
		{
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/mainnav', $data);
			$this->load->view('addlevels');
			$this->load->view('templates/footer');
		}

	}
	public function forum()
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{								// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('forum');
		$this->load->view('templates/footer');

	}
	public function rules()
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_logged_in()) {									// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('rules');
		$this->load->view('templates/footer');

	}
	public function leaderboard()
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{								// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('leader_board');
		$this->load->view('templates/footer');

	}
	public function halloffame()
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{									// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('hall_of_fame');
		$this->load->view('templates/footer');

	}
	public function managelevels()
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{								// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		$data['levels']=$this->admin_model->get_levels();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/mainnav', $data);
		$this->load->view('manage_levels');
		$this->load->view('templates/footer');

	}
	public function editlevel($level=50)
	{

		$data['title'] = 'Admin panel';
		$data['page'] = 'home';
		$this->lang->load('tank_auth');
		$this->load->library('tank_auth_groups','','tank_auth');
		if ($this->tank_auth->is_admin())
		{								// logged in
			$data['user_id']=$this->tank_auth->get_user_id();
			$data['user_name']=$this->tank_auth->get_username();
			$data['is_logged_in']=TRUE;

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			redirect('/auth/send_again/');

		} else {
			$data['is_logged_in']=FALSE;
			redirect('/home');
		}
		if($_POST)
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('level', 'Level', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('answer', 'Answer', 'trim|required|xss_clean');
		    $this->form_validation->set_error_delimiters('<div class="alert alert-error"> <button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
			if($this->form_validation->run() == FALSE)
		   	{
		     	//Field validation failed.  
		     	$this->load->view('templates/header', $data);
				$this->load->view('templates/mainnav', $data);
		     	$this->load->view('admin/edit_level'.$this->input->post('level'));
		     	$this->load->view('templates/footer');
		   	}
		   	else
			{
				$title= $this->input->post('title');
				$level=$this->input->post('level');
				$name=$this->input->post('name');
				$description= $this->input->post('description');
				$answer= sha1($this->input->post('answer'));
				$javascript= $this->input->post('javascript');
				$cookie=$this->input->post('cookie');
				$array = array(
					"title" => "$title",
					"level" => "$level",
					"name" => "$name",
					"description" => "$description",
					"answer" => "$answer",
					"javascript" => "$javascript",
					"description" => "$description",
					"cookie" => "$cookie",
				);
				if($_FILES["photo"]["name"]!='')
				{
					$photo= $_FILES["photo"]["name"];
					$array['photo']=$photo;
				}
				$result = $this->admin_model->edit_level($level,$array);
				$config['upload_path'] = 'assets/images/';
				$config['allowed_types'] = 'gif|jpg|png';
				/*$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';*/
				$this->load->library('upload', $config);
								
				if ( ! $this->upload->do_upload('photo'))
				{
					$error = array('error' => $this->upload->display_errors());
					//print_r($error);
					redirect('admin/managelevels');
					//$this->load->view('admin/add', $error);
				}
				else
				{
					redirect('admin/managelevels');
				}
			}
		}
		else
		{
			$data['level_data']=$this->admin_model->get_level_data($level);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/mainnav', $data);
			$this->load->view('edit_level',$data);
			$this->load->view('templates/footer');
		}
	}
	
	function login()
	 {
	   	$this->load->helper(array('form'));
	   	$this->load->view('auth/login');
	 }
	function logout()
	{
		$this->session->unset_userdata('admin_logged_in');
	   	session_destroy();
	   	redirect('home', 'refresh');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
