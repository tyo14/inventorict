<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Devisi extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$data['devisi'] = $this->global_model->find_all('devisi');
 		$this->load->view('head');
 		$this->load->view('daftardivisi', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$this->load->view('head');
 		$this->load->view('inputdevisi'); //Contains
 		$this->load->view('footer');	
 	}

 	public function simpan()
 	{
 		if($this->input->post('savedevisi')){

 			$data = $this->input->post();
 			unset($data['savedevisi']);

 			$this->global_model->create('devisi',$data);

 			redirect(site_url('devisi/tambah'));

 		}
 	}


}
