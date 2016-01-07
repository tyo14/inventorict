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
 		if($this->input->post('saveunit')){

 			$data = $this->input->post();
 			$data['kode_unit'] = strtoupper($data['kode_unit']);
	 		unset($data['saveunit']);

	 		$this->global_model->create('unit',$data);

	 		redirect(site_url('unit/tambah'));
 		}

 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$this->load->view('head');
 		$this->load->view('inputunit',$data); //Contains
 		$this->load->view('footer');	
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('saveunit')){

 			$data = $this->input->post();
 			$data['kode_unit'] = strtoupper($data['kode_unit']);
 			$get = $data['kode_unit'];
 			unset($data['saveunit']);

 			$this->global_model->update('unit',$data, array('kode_unit' => $id));

 			if($data['kode_unit'] != $id){
 				$url = 'unit/ubah/'.$data['kode_unit'];

 				foreach ($this->global_model->search('barang',array('kode_barang' => $id),null,null,null,0) as $row) {
 					list($kodes,$digits) = explode('-', $row['kode_barang']);
 					$ubah = array(
 						'kode_barang' => $get.'-'.$digits,
 						'tgl_beli' => $row['tgl_beli'],
 						'nama_barang' => $row['nama_barang'],
 						'deskripsi' => $row['deskripsi'],
 						'kode_unit' => $row['kode_unit']);

 					$this->global_model->update('barang',$ubah,array('kode_unit' => $row['kode_unit']));
 				}

 			}else{
 				$url = 'unit/ubah/'.$id;
 			}

 			redirect(site_url($url));

 		}

 		$data['unit'] = $this->global_model->find_by('unit', array('kode_unit' => $id));
 		$data['kategori'] = $this->global_model->find_all('kategori');
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
