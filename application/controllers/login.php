<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Login extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$this->load->view('headlog');
 		$this->load->view('masuk'); //Contains
 		$this->load->view('footerlog');
 	}

 }