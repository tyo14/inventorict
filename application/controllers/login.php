<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Login extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		
 		//validasi login
 		if($this->input->post('masuk'))
 		{
 			$email 	= $this->input->post('email');
 			$pass	= $this->input->post('password');
 			$md5pass = md5($pass);

 			$sql = $this->global_model->find_by('user', array('email' => $email, 'password' => $md5pass));

 			if($sql!=null){
 				$sessiondata = array(
 								'username' => $sql['username'],
 								'namapengguna' => $sql['nama_pengguna'],
 								'email' => $sql['email'],
 								'status' => $sql['status']);

 				$this->session->set_userdata($sessiondata);
 				redirect(site_url('dashboard'));

 			}else {

 				redirect(site_url('/'));
 			}

 		}

 		$this->load->view('headlog');
 		$this->load->view('masuk'); //Contains
 		$this->load->view('footerlog');
 	}
 	public function logout()
 	{
 		$this->session->sess_destroy();
 		redirect(site_url('/'));
 	}

 }