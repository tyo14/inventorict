<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Unitdiv extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$data['unit'] = $this->global_model->find_all('unit');
 		$this->load->view('head');
 		$this->load->view('daftarunit', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$this->load->view('head');
 		$this->load->view('inputunit'); //Contains
 		$this->load->view('footer');	
 	}


}
