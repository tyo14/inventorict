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

 	public function message($mode,$text,$active)
 	{
 		//generate message
 		$messagesession = array(
 			'messagemode' => $mode,
 			'messagetext' => $text,
 			'messageactive' => $active);

 		$this->session->set_flashdata($messagesession);
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
	 		$kodekategori = $this->input->post('kode_kategori');
	 		$kodeunit = strtoupper($this->input->post('kode_unit'));
	 		$namaunit = $this->input->post('nama_unit');

	 		$checkkode = count($this->global_model->find_by('unit', array('kode_unit' => $kodeunit)));

	 		$checknama = count($this->global_model->find_by('unit', array('nama_unit' => $namaunit)));

	 		if($kodekategori == "" || $kodeunit == "" || $namaunit == ""){
	 			$this->message('danger','Data tidak boleh kosong','tambahunit');
	 		}else{
	 			if($checknama > 0 && $checkkode > 0){
	 				$this->message('danger','Kode dan Nama unit sudah ada','tambahunit');
		 		}else if($checknama > 0){
		 			$this->message('danger','Nama unit sudah ada','tambahunit');
		 		}else if($checkkode > 0){
		 			$this->message('danger','Kode unit sudah ada','tambahunit');
		 		}else{
		 			$data = $this->input->post();
		 			$data['kode_unit'] = strtoupper($data['kode_unit']);
			 		unset($data['saveunit']);

			 		$this->global_model->create('unit',$data);

			 		$this->message('success','Data berhasil ditambahkan','tambahunit');
		 		}
	 		}	

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
	 		$kodekategori = $this->input->post('kode_kategori');
	 		$kodeunit = strtoupper($this->input->post('kode_unit'));
	 		$namaunit = $this->input->post('nama_unit');

	 		$checkkode = count($this->global_model->find_by('unit', array('kode_unit' => $kodeunit)));

	 		$checknama = count($this->global_model->find_by('unit', array('nama_unit' => $namaunit)));

	 		$sql = $this->global_model->find_by('unit', array('kode_unit' => $id));
 			if($kodeunit == $sql['kode_unit'] && $namaunit == $sql['nama_unit']){
 				$this->message('info','Tidak ada perubahan','ubahunit');
 				redirect(site_url('unit/ubah/'.$id));
 			}else{
 				if($checknama > 0 && $checkkode > 0 && $kodeunit != $sql['kode_unit'] && $namaunit != $sql['nama_unit']){
		 			$this->message('danger','Kode dan Nama unit sudah ada','ubahunit');
		 			redirect(site_url('unit/ubah/'.$id));
	 			}else if($checkkode > 0 && $kodeunit != $sql['kode_unit']){
	 				$this->message('danger','Kode unit sudah ada','ubahunit');
	 				redirect(site_url('unit/ubah/'.$id));
 				}else if($checknama > 0 && $namaunit != $sql['nama_unit']){
 					$this->message('danger','Nama unit sudah ada','ubahunit');
 					redirect(site_url('unit/ubah/'.$id));
 				}else{
 					$data = $this->input->post();
		 			$data['kode_unit'] = strtoupper($data['kode_unit']);
		 			$get = $data['kode_unit'];
		 			unset($data['saveunit']);

		 			$this->global_model->update('unit',$data, array('kode_unit' => $id));

		 			if($data['kode_unit'] != $sql['kode_unit']){

		 				foreach ($this->global_model->search('barang',array('kode_barang' => $sql['kode_unit']),null,null,null,0) as $row) {
		 					list($kodes,$digits) = explode('-', $row['kode_barang']);
		 					$ubah = array(
		 						'kode_barang' => $get.'-'.$digits,
		 						'kode_unit' => $get);

		 					$sip = $row['kode_barang'];

		 					$this->global_model->update('barang',$ubah,array('kode_barang' => $sip));
		 				}

		 			}

		 			$this->message('success','Data berhasil di ubah','ubahunit');
		 			redirect(site_url('unit/ubah/'.$get));
 				}

 			}	
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

 		$this->message('success','Data berhasil di hapus','indexunit');

 		redirect(site_url('unit'));
 	}


}
