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

 			$data = $this->input->post();
	 		unset($data['savekategori']);

	 		$this->global_model->create('kategori',$data);

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

 			$data = $this->input->post();
	 		unset($data['savekategori']);

 			if($data['kode_kategori'] != $id){
 				$url = 'kategori/ubah/'.$data['kode_kategori'];
 			}else{
 				$url = 'kategori/ubah/'.$id;
 			}

	 		$this->global_model->update('kategori',$data, array('kode_kategori' => $id));

	 		redirect(site_url($url));
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
 		redirect(site_url('kategori'));	
 	}




}
