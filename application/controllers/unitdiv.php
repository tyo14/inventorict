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

 	public function simpanunit()
 	{
 		if($this->input->post('saveunit')){

 			$data = $this->input->post();
 			unset($data['saveunit']);

 			$this->global_model->create('unit',$data);

 			redirect(site_url('unitdiv/tambah'));

 		}
 	}
 	public function simpandevisi()
 	{
 		if($this->input->post('savedevisi')){

 			$data = $this->input->post();
 			unset($data['savedevisi']);

 			$this->global_model->create('devisi',$data);

 			redirect(site_url('unitdiv/tambah'));

 		}
 	}


}
