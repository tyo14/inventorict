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

 	public function ajaxbarang($id)
 	{
 		$data = $this->global_model->find_by('unit', array('nama_unit' => $id));
 		echo $data['kode_unit'];

 		//algoritma generate kode

		//string yang akan dipecah
		$teks = "MTR-001";
		//pecah string berdasarkan string ","
		$pecah = explode("-", $teks);
		//mencari element array 0
		$hasil = $pecah[0];
		$hasil2 = (int)$pecah[1];


		//tampilkan hasil pemecahan
		echo $hasil;
		echo $hasil2;

		//end algoritma generate kode
 	}

 	
 }
