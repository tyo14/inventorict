<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Dashboard extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$this->load->view('head');
 		$this->load->view('dash'); //Contains
 		$this->load->view('footer');
 	}

 	//input data
 	public function inputbarang()
 	{
 		$this->load->view('head');
 		$this->load->view('inputbarang'); //Contains
 		$this->load->view('footer');		
 	}

 	//load data
 	public function barang()
 	{
 		$data['barang'] = $this->global_model->find_all('barang','tgl_beli DESC');
 		$this->load->view('head');
 		$this->load->view('daftarbarang',$data);
 		$this->load->view('footer');
 	}



}
