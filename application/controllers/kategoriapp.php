<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class kategoriapp extends CI_Controller {

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
 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('daftarkategoriapp',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('savekategori')){

 			$data = $this->input->post();
 			$data['kode_kategoriapp'] = strtoupper($data['kode_kategoriapp']);
 			unset($data['savekategori']);

 			$this->global_model->create('kategoriapp',$data);

 		}

 		$this->load->view('head');
 		$this->load->view('inputkategoriapp'); //Contains
 		$this->load->view('footer');
 	}

 	public function ubah($id)
 	{
 		$getid = $id;

 		if($this->input->post('savekategori')){

 			$data = $this->input->post();
 			$data['kode_kategoriapp'] = strtoupper($data['kode_kategoriapp']);
 			unset($data['savekategori']);

 			$this->global_model->update('kategoriapp',$data, array('kode_kategoriapp' => $id));

 			if($data['kode_kategoriapp'] != $getid){
 				$url = 'kategoriapp/ubah/'.$data['kode_kategoriapp'];
 			}else{
 				$url = 'kategoriapp/ubah/'.$id;
 			}

 			redirect(site_url($url));

 		}


 		$data['kategoriapp'] = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahkategoriapp',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('kategoriapp', array('kode_kategoriapp' => $id));
 		redirect(site_url('kategoriapp'));
 	}

}
