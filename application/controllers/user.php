<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class User extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index(){
 		$data['profile'] = $this->global_model->find_by('user', array('username' => $this->session->userdata('username')));
 		$this->load->view('head');
 		$this->load->view('profile',$data); //Contains
 		$this->load->view('footer');
 	}


}