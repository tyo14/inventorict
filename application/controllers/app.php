<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class App extends CI_Controller {

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
 		$data['app'] = $this->global_model->find_all('app');
 		$this->load->view('head');
 		$this->load->view('daftarapp',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('saveapp')){
	 		$kodeapp = $this->input->post('kode_app');
	 		$namaapp = $this->input->post('nama_app');
	 		$bitapp = $this->input->post('bit');
	 		$kategoriapp = $this->input->post('kode_kategoriapp');

	 		$checkkode = count($this->global_model->find_by('app', array('kode_app' => $kodeapp)));

	 		$checknama = count($this->global_model->find_by('app', array('nama_app' => $namaapp)));

	 		if($kodeapp == "" || $namaapp == "" || $bitapp == "" || $kategoriapp == ""){
	 			$this->message('danger','Data tidak boleh kosong','tambahapp');
	 		}else{
	 			if($checkkode > 0 && $kodeapp != $sql['kode_app']){
	 				$this->message('danger','Kode app sudah ada','tambahapp');
	 			}else{

			 		$data = $this->input->post();
		 			unset($data['saveapp']);

		 			$this->global_model->create('app', $data);

		 			$this->message('success','Data berhasil ditambahkan','tambahapp');
		        }
	 		}

	 		redirect(site_url('app/tambah'));
 		}

 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('inputapp',$data); //Contains
 		$this->load->view('footer');

 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('app', array('kode_app' => $id));

 		$this->message('success','Data berhasil di hapus','indexapp');
 		
 		redirect(site_url('app'));
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('saveapp'))
 		{
 			$kodeapp = $this->input->post('kode_app');
	 		$namaapp = $this->input->post('nama_app');
	 		$bitapp = $this->input->post('bit');
	 		$deskripsiapp = $this->input->post('deskripsi');
	 		$kategoriapp = $this->input->post('kode_kategoriapp');

	 		$checkkode = count($this->global_model->find_by('app', array('kode_app' => $kodeapp)));

	 		$checknama = count($this->global_model->find_by('app', array('nama_app' => $namaapp)));

	 		//validasi
	 		$sql = $this->global_model->find_by('app', array('kode_app' => $id));

	 		if($kodeapp == $sql['kode_app'] && $namaapp == $sql['nama_app'] && $bitapp == $sql['bit'] && $deskripsiapp == $sql['deskripsi'] && $kategoriapp == $sql['kode_kategoriapp']){
 				$this->message('info','Tidak ada perubahan','ubahapp');
 				redirect(site_url('app/ubah/'.$id));
 			}else{

 				if($checkkode > 0 && $kodeapp != $sql['kode_app']){
 					$this->message('danger','Kode app sudah ada','ubahapp');
 					redirect(site_url('app/ubah/'.$id));
 				}else if($kodeapp == "" || $namaapp == "" || $bitapp == "" || $kategoriapp == ""){
 					$this->message('danger','Data tidak boleh kosong','ubahapp');
 					redirect(site_url('app/ubah/'.$id));
 				}else{ 					
 					$getid = $id;
		 			$data = $this->input->post();
		 			$get = $data['kode_app'];
		 			unset($data['saveapp']);

		 			$this->global_model->update('app',$data,array('kode_app' => $id));

		 			$this->message('success','Data berhasil di ubah','ubahapp');
 					redirect(site_url('app/ubah/'.$get));
 				}

 			}

 		}

 		$data['app'] = $this->global_model->find_by('app', array('kode_app' => $id));
 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('ubahapp',$data); //Contains
 		$this->load->view('footer');

 	}
}