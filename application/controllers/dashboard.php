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
 		$this->load->view('headlogin');
 		$this->load->view('login'); //Contains
 		$this->load->view('footer');
 	}

 	public function daftarbarang()
 	{
 		$this->load->view('head');
 		$this->load->view('barang'); //Contains
 		$this->load->view('footdash');
 	}
	
 }