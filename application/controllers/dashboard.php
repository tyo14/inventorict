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
 		$data['kodeunit'] = $this->global_model->find_all('unit');
 		$this->load->view('head');
 		$this->load->view('daftarbarang',$data); //Contains
 		$this->load->view('footdash');
 	}

	public function dataunit()
 	{
 		$this->load->view('head');
 		$this->load->view('dataunit'); //Contains
 		$this->load->view('footdash');
 	}

 	public function datadivisi()
 	{
 		$this->load->view('head');
 		$this->load->view('datadivisi'); //Contains
 		$this->load->view('footdash');
 	}

 	public function datarakitan()
 	{
 		$this->load->view('head');
 		$this->load->view('datarakitan'); //Contains
 		$this->load->view('footdash');
 	}

 	public function insertapply(){
		if($this->input->post('simpan'))
		{
			//get untuk table barang
			$data1 = array(
				'Kode_Barang'=>$this->input->post('Kode_Barang'),
				'Tgl_Beli'=>$this->input->post('Tgl_Beli'),
				'Nama_Barang'=>$this->input->post('Nama_Barang'),
				'Deskripsi'=>$this->input->post('Deskripsi')
				);

			//untuk table barang
			$this->global_model->create('barang', $data1);

			redirect(site_url('dashboard/daftarbarang'));


		}
	}

	public function insertunit(){
		if($this->input->post('simpan'))
		{
			//get untuk table barang
			$data1 = array(
				'Kode_Unit'=>$this->input->post('Kode_Unit'),
				'Nama_Unit'=>$this->input->post('Nama_Unit')
				);

			//untuk table barang
			$this->global_model->create('unit', $data1);

			redirect(site_url('dashboard/dataunit'));


		}
	}

}
