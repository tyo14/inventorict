<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Unit extends CI_Controller {

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

 	public function simpan()
 	{
 		if($this->input->post('saveunit')){

 			//validasi data yang sama
 			$kodeunit = $this->input->post('kode_unit');
 			$namaunit = $this->input->post('nama_unit');

 			$sql = $this->global_model->find_by('unit', array('kode_unit' => $kodeunit, 'nama_unit' => $namaunit));

 			if($sql != null)
 			{
 				//alert message

 				redirect(site_url('unit/tambah'));

 			}
 			else{

 				$data = $this->input->post();
 				$data['kode_unit'] = strtoupper($data['kode_unit']);
	 			unset($data['saveunit']);

	 			$this->global_model->create('unit',$data);

	 			redirect(site_url('unit/tambah'));
 			}

 		}
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('saveunit')){

 			$data = $this->input->post();
 			$data['kode_unit'] = strtoupper($data['kode_unit']);
 			unset($data['saveunit']);

 			$this->global_model->update('unit',$data, array('kode_unit' => $id));

 			redirect(site_url('unit'));


 		}

 		$data['unit'] = $this->global_model->find_by('unit', array('kode_unit' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahunit', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('unit', array('kode_unit' => $id));
 		redirect(site_url('unit'));
 	}


}
