<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Dashboard extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');


 		if(!$this->session->userdata(
 			'username','namapengguna','email','status','deskripsi'))
        {
            redirect(site_url('/'));
        }
        
 	}

 	public function index()
 	{
 		$this->load->view('head');
 		$this->load->view('dash'); //Contains
 		$this->load->view('footer');
 	}


}
