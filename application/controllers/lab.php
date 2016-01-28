<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Lab extends CI_Controller {

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
 		$data['lab'] = $this->global_model->find_all('laboratorium');
 		$this->load->view('head');
 		$this->load->view('daftarlab',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('savelab')){
	 		$kodelab = 'Lab-'.$this->input->post('kode_lab');
	 		$namalab = $this->input->post('nama_lab');

	 		$checkkode = count($this->global_model->find_by('laboratorium', array('kode_lab' => $kodelab)));

	 		$checknama = count($this->global_model->find_by('laboratorium', array('nama_lab' => $namalab)));

	 		if($kodelab == "" || $namalab == ""){
	 			$this->message('danger','Data tidak boleh kosong','tambahlab');
	 		}else{
		 		if($checknama > 0 && $checkkode > 0){
		 			$this->message('danger','Kode dan Nama workgroup sudah ada','tambahlab');
		 		}else if($checknama > 0){
		 			$this->message('danger','Nama workgroup sudah ada','tambahlab');
		 		}else if($checkkode > 0){
		 			$this->message('danger','Kode workgroup sudah ada','tambahlab');
		 		}else{
			 		$data = $this->input->post();
		 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
		 			unset($data['savelab']);

		 			$this->global_model->create('laboratorium', $data);

		 			$this->message('success','Data berhasil ditambahkan','tambahlab');
		 		}
	 		}

	 		redirect(site_url('lab/tambah'));
 		}

 		$this->load->view('head');
 		$this->load->view('inputlab'); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('laboratorium', array('kode_lab' => $id));

 		$this->message('success','Data berhasil di hapus','indexlab');

 		redirect(site_url('lab'));
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('savelab')){
	 		$getid = $id;
	 		$kodelab = 'Lab-'.$this->input->post('kode_lab');
	 		$namalab = $this->input->post('nama_lab');

	 		$checkkode = count($this->global_model->find_by('laboratorium', array('kode_lab' => $kodelab)));

	 		$checknama = count($this->global_model->find_by('laboratorium', array('nama_lab' => $namalab)));

	 		//validasi
	 		$sql = $this->global_model->find_by('laboratorium', array('kode_lab' => $id));

	 		if($kodelab == $sql['kode_lab'] && $namalab == $sql['nama_lab']){
 				$this->message('info','Tidak ada perubahan','ubahlab');
 				redirect(site_url('lab/ubah/'.$id));
 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodelab != $sql['kode_lab'] && $namalab != $sql['nama_lab']){
 					$this->message('danger','Kode dan Nama workgroup sudah ada','ubahlab');
 					redirect(site_url('lab/ubah/'.$id));
	 			}else if($checkkode > 0 && $kodelab != $sql['kode_lab']){
	 				$this->message('danger','Kode workgroup sudah ada','ubahlab');
 					redirect(site_url('lab/ubah/'.$id));
 				}else if($checknama > 0 && $namalab != $sql['nama_lab']){
 					$this->message('danger','Nama workgroup sudah ada','ubahlab');
 					redirect(site_url('lab/ubah/'.$id));
 				}else{

 					$data = $this->input->post();
		 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
		 			unset($data['savelab']);
		 			$get = $data['kode_lab'];

		 			$this->global_model->update('laboratorium',$data,array('kode_lab' => $getid));

		 			$this->message('success','Data berhasil di ubah','ubahlab');
 					redirect(site_url('lab/ubah/'.$get));

 				}

 			}
 		}

 		$data['lab'] = $this->global_model->find_by('laboratorium', array('kode_lab' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahlab',$data); //Contains
 		$this->load->view('footer');
 	}

}
