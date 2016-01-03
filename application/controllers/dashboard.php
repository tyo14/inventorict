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
 		$data['barang'] = count($this->global_model->find_all('barang'));
 		$data['rakitan'] = count($this->global_model->find_all('rakitan_header'));
 		$data['unit'] = count($this->global_model->find_all('unit'));
 		$data['divisi'] = count($this->global_model->find_all('divisi'));

 		$this->load->view('head');
 		$this->load->view('dash', $data); //Contains
 		$this->load->view('footer');
 	}


}
