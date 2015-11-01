<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Ict extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$this->load->view('headlogin');
 		$this->load->view('login'); //Contains
 		$this->load->view('footer');
 	}

 	public function dashboard()
	{
		$this->load->view('head');
		$this->load->view('dash'); //contains
		$this->load->view('footdash');
	}

	public function login(){

		if($this->input->post('login'))
		{
			$username = $this->input->post('userid');
			$pass = $this->input->post('password');
			//$md5pass = md5($pass);
			$sql = $this->global_model->find_by('registration', array('User_ID'=>$username, 'Password'=> $pass));
			if($sql!=null){
				 redirect(site_url('ict/dashboard'));
			}else
			{
				
				
				redirect(site_url('/'));
			}
		}
	}
 }