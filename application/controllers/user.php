<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class User extends CI_Controller {

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

 	public function index(){

 		if($this->input->post('simpan')){

 			if($this->input->post('password')==""){
 				$userprofile = array(
 				'nama_pengguna' => $this->input->post('nama_pengguna'),
 				'username' => $this->input->post('username'),
 				'email' => $this->input->post('email'),
 				'deskripsi' => $this->input->post('deskripsi'));

 				$check = $this->global_model->find_by('user', array('username' => $this->session->userdata('username')));

 				$getid = $check['id'];

 				$this->global_model->update('user', $userprofile, array('id' => $getid));

 				/*hapus session lama
 				$this->session->sess_destroy();*/

 				//buat session baru berdasarkan data update
 				$sql = $this->global_model->find_by('user', array('id' => $getid));

 				$sessiondata = array(
 								'username' => $sql['username'],
 								'namapengguna' => $sql['nama_pengguna'],
 								'email' => $sql['email'],
 								'status' => $sql['status'],
 								'deskripsi' => $sql['deskripsi']);

 				$this->session->set_userdata($sessiondata);

 			}else{

 				$userprofile = array(
 				'nama_pengguna' => $this->input->post('nama_pengguna'),
 				'username' => $this->input->post('username'),
 				'password' => md5($this->input->post('password')),
 				'email' => $this->input->post('email'),
 				'deskripsi' => $this->input->post('deskripsi'));

 				$check = $this->global_model->find_by('user', array('username' => $this->session->userdata('username')));

 				$getid = $check['id'];

 				$this->global_model->update('user', $userprofile, array('id' => $getid));

 				/*hapus session lama
 				$this->session->sess_destroy();*/

 				//buat session baru berdasarkan data update
 				$sql = $this->global_model->find_by('user', array('id' => $getid));

 				$sessiondata = array(
 								'username' => $sql['username'],
 								'namapengguna' => $sql['nama_pengguna'],
 								'email' => $sql['email'],
 								'status' => $sql['status'],
 								'deskripsi' => $sql['deskripsi']);

 				$this->session->set_userdata($sessiondata);

 			}

 			redirect(site_url('user'));


 		}


 		$data['profile'] = $this->global_model->find_by('user', array('username' => $this->session->userdata('username')));
 		$this->load->view('head');
 		$this->load->view('profile',$data); //Contains
 		$this->load->view('footer');
 	}


}