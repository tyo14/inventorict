<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Kategori extends CI_Controller {

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
 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$this->load->view('head');
 		$this->load->view('daftarkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('savekategori')){
	 		$kodedivisi = $this->input->post('kode_divisi');
	 		$kodekategori = $this->input->post('kode_kategori');
	 		$namakategori = $this->input->post('nama_kategori');

	 		$checkkode = count($this->global_model->find_by('kategori', array('kode_kategori' => $kodekategori)));

	 		$checknama = count($this->global_model->find_by('kategori', array('nama_kategori' => $namakategori)));

	 		if($kodedivisi == "" || $kodekategori == "" || $namakategori == ""){
	 			$this->message('danger','Data tidak boleh kosong','tambahkategori');
	 		}else{
	 			if($checknama > 0 && $checkkode > 0){
	 				$this->message('danger','Kode dan Nama kategori sudah ada','tambahkategori');
		 		}else if($checknama > 0){
		 			$this->message('danger','Nama kategori sudah ada','tambahkategori');
		 		}else if($checkkode > 0){
		 			$this->message('danger','Kode kategori sudah ada','tambahkategori');
		 		}else{

		 			$data = $this->input->post();
		 			unset($data['savekategori']);

				 	$this->global_model->create('kategori',$data);

				 	$this->message('success','Data berhasil ditambahkan','tambahkategori');
		 		}
	 		}

	 		redirect(site_url('kategori/tambah'));
 		}
 		$data['devisi'] = $this->global_model->find_all('divisi');
 		$this->load->view('head');
 		$this->load->view('inputkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('savekategori')){
	 		$kodedivisi = $this->input->post('kode_divisi');
	 		$kodekategori = $this->input->post('kode_kategori');
	 		$namakategori = $this->input->post('nama_kategori');

	 		$checkkode = count($this->global_model->find_by('kategori', array('kode_kategori' => $kodekategori)));

	 		$checknama = count($this->global_model->find_by('kategori', array('nama_kategori' => $namakategori)));

	 		$sql = $this->global_model->find_by('kategori', array('kode_kategori' => $id));
 			if($kodekategori == $sql['kode_kategori'] && $namakategori == $sql['nama_kategori']){
 				$this->message('info','Tidak ada perubahan','ubahkategori');
 				redirect(site_url('kategori/ubah/'.$id));
 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodekategori != $sql['kode_kategori'] && $namakategori != $sql['nama_kategori']){
		 			$this->message('danger','Kode dan Nama kategori sudah ada','ubahkategori');
		 			redirect(site_url('kategori/ubah/'.$id));
	 			}else if($checkkode > 0 && $kodekategori != $sql['kode_kategori']){
	 				$this->message('danger','Kode kategori sudah ada','ubahkategori');
	 				redirect(site_url('kategori/ubah/'.$id));
 				}else if($checknama > 0 && $namakategori != $sql['nama_kategori']){
 					$this->message('danger','Nama kategori sudah ada','ubahkategori');
 					redirect(site_url('kategori/ubah/'.$id));
 				}else{
 					$data = $this->input->post();
 					unset($data['savekategori']);
			 		$this->global_model->update('kategori',$data, array('kode_kategori' => $id));

			 		$this->message('success','Data berhasil di ubah','ubahkategori');
			 		redirect(site_url('kategori/ubah/'.$kodekategori));
 				}

 			}
 		}

 		$data['devisi'] = $this->global_model->find_all('divisi');
 		$check = $this->global_model->find_by('kategori', array('kode_kategori' => $id));
 		list($kodekategori,$digit) = explode('-', $check['kode_kategori']);
 		$data['kategoridivisi'] = $kodekategori;
 		$data['kategori'] = $this->global_model->find_by('kategori', array('kode_kategori' => $id));

 		$this->load->view('head');
 		$this->load->view('ubahkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id){
 		$this->global_model->delete('kategori',array('kode_kategori' => $id));
 		$this->message('success','Data berhasil di hapus','indexkategori');

 		redirect(site_url('kategori'));
 	}




}
