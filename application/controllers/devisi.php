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
 		$data['devisi'] = $this->global_model->find_all('divisi');
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

 			$kodedivisi = $this->input->post('kode_divisi');
 			$namadivisi = $this->input->post('nama_divisi');

 			$sql = $this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi, 'nama_divisi' => $namadivisi));

 			if($sql != null){

 				//alert message

 				redirect(site_url('devisi/tambah'));

 			}else{

 				$data = $this->input->post();
 				$data['kode_divisi'] = strtoupper($data['kode_divisi']);
	 			unset($data['savedevisi']);

	 			$this->global_model->create('divisi',$data);

	 			redirect(site_url('devisi/tambah'));

 			}

 		}
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('divisi', array('kode_divisi' => $id));
 		redirect(site_url('devisi'));
 	}

 	public function ubah($id){

 		if($this->input->post('savedevisi')){

 			$data = $this->input->post();
 			$data['kode_divisi'] = strtoupper($data['kode_divisi']);
 			unset($data['savedevisi']);

 			$this->global_model->update('divisi',$data, array('kode_divisi' => $id));

 			redirect(site_url('devisi'));

 		}	
 		$data['devisi'] = $this->global_model->find_by('divisi', array('kode_divisi' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahdivisi', $data); //Contains
 		$this->load->view('footer');
 	}


}
