<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Rakitanset extends CI_Controller {

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
 		if($this->input->post('saverakitanset')){
 			$data = $this->input->post();
 			unset($data['saverakitanset']);

 			$this->global_model->update('rakitan_setting', $data, array('id' => '1'));

 			$this->message('success','Data berhasil diubah','ubahrakitanset');

 			redirect(site_url('rakitanset'));
 		}
 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$data['setting'] = $this->global_model->find_by('rakitan_setting', array('id' => '1'));
 		$this->load->view('head');
 		$this->load->view('rakitanset',$data);
 		$this->load->view('footer');
 	}

 }