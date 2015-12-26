<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Rakitan extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$this->load->view('head');
 		$this->load->view('inputrakitan');
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$data['datadivisi'] = $this->global_model->find_all('divisi');
 		$data['databarang'] = $this->global_model->find_all('barang');
 		$this->load->view('head');
 		$this->load->view('inputrakitan', $data);
 		$this->load->view('footer');	
 	}

 	public function ajaxrakitan($id)
 	{
 		/*generate kode barang*/

 		//get kode unit
 		$data = $this->global_model->find_by('divisi', array('nama_divisi' => $id));

 		$kodedivisi = $data['kode_divisi'];

 		//check kode unit di table barang
 		$checkrakitan = $this->global_model->query("select kode_rakit from rakitan_header where kode_rakit LIKE '$kodedivisi%' order by kode_rakit desc");

 		if ($checkrakitan != null){
 			//jika kode unit ada maka check kode barang terakhir
 			//ambil sample kode barang terakhir
 			//pisahkan kodeunit dan number 			
 			$pisah = explode('-', $checkrakitan[0]['kode_rakit']);

 			
 			$number =  (int) $pisah[1];

 			$digit = intval($number) + 1;

 			if ($digit >= 1 and $digit <= 9){

				echo $kodedivisi."-00".$digit; 				

 			}else if($digit >= 10 and $digit <= 99){

 				echo $kodedivisi."-0".$digit;

 			}else{

 				echo $kodedivisi."-".$digit; 				
 			}


 		}else{
 			//jika kode unit tidak ada maka buat kode barang default
 			$kodedefault = "001";

 			echo $kodedivisi."-".$kodedefault;

 		}

 	}

 }