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

 			$data = $this->input->post();
 			unset($data['saveapp']);

 			$this->global_model->create('app', $data);

 		}

 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('inputapp',$data); //Contains
 		$this->load->view('footer');

 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('app', array('kode_app' => $id));
 		redirect(site_url('app'));
 	}

 	public function ubah($id)
 	{
 		if($this->input->post('saveapp'))
 		{
 			$getid = $id;
 			$data = $this->input->post();

 			unset($data['saveapp']);

 			$this->global_model->update('app',$data,array('kode_app' => $id));

 			if($data['kode_app'] != $id){
 				$url = 'app/ubah/'.$data['kode_app'];
 			}else{
 				$url = 'app/ubah/'.$id;
 			}

 			redirect(site_url($url));

 		}

 		$data['app'] = $this->global_model->find_by('app', array('kode_app' => $id));
 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('ubahapp',$data); //Contains
 		$this->load->view('footer');

 	}

}