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


 			$data = $this->input->post();
 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
 			unset($data['savelab']);

 			$this->global_model->create('laboratorium', $data);
 		}
 		//$data['lab'] = $this->global_model->find_all('laboratorium');
 		$this->load->view('head');
 		$this->load->view('inputlab'); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('laboratorium', array('kode_lab' => $id));
 		redirect(site_url('lab'));
 	}

 	public function ubah($id)
 	{
 		$getid = $id;
 		if($this->input->post('savelab')){
 			$data = $this->input->post();
 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
 			unset($data['savelab']);

 			$this->global_model->update('laboratorium',$data,array('kode_lab' => $getid));

 			if($data['kode_lab'] != $getid){
 				$url = $data['kode_lab'];
 			}else{
 				$url = $getid;
 			}

 			redirect(site_url('lab/ubah/'.$url));
 		}

 		$data['lab'] = $this->global_model->find_by('laboratorium', array('kode_lab' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahlab',$data); //Contains
 		$this->load->view('footer');
 	}



}
