<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Barang extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$data['barang'] = $this->global_model->find_all('barang','tgl_beli DESC');
 		$this->load->view('head');
 		$this->load->view('daftarbarang',$data);
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$data['dataunit'] = $this->global_model->find_all('unit');
 		$this->load->view('head');
 		$this->load->view('inputbarang',$data); //Contains
 		$this->load->view('footer');		
 	}

 	
 }
