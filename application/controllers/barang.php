<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Barang extends CI_Controller {

 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('global_model');
 		$this->load->helper('url');
 		$this->load->library('session');
 	}

 	public function index()
 	{
 		$data['barang'] = $this->global_model->find_all('barang','tgl_beli DESC');
 		$this->load->view('head');
 		$this->load->view('daftarbarang',$data);
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$data['dataunit'] = $this->global_model->find_all('unit');
 		$this->load->view('head');
 		$this->load->view('inputbarang',$data); //Contains
 		$this->load->view('footer');		

 	}

 	public function simpan()
 	{
 		if($this->input->post('simpan')){

 			$inputbarang = array('kode_barang' => $this->input->post('kode_barang'),
 								 'tgl_beli' => $this->input->post('tgl_beli'),
 								 'nama_barang' => $this->input->post('nama_barang'),
 								 'deskripsi' => $this->input->post('deskripsi'));


 			$inputstatus = array('kondisi_barang' => $this->input->post('kondisi_barang'),
 								 'status_stok' => $this->input->post('status_stok'),
 								 'kode_barang' => $this->input->post('kode_barang'));
 		}
 	}

 	public function ajaxbarang($id)
 	{
 		/*generate kode barang*/

 		//get kode unit
 		$data = $this->global_model->find_by('unit', array('nama_unit' => $id));

 		$kodeunit = $data['kode_unit'];

 		//check kode unit di table barang
 		$checkbarang = $this->global_model->query("select kode_barang from barang where kode_barang LIKE '$kodeunit%' order by kode_barang desc");

 		if ($checkbarang != null){
 			//jika kode unit ada maka check kode barang terakhir
 			//ambil sample kode barang terakhir
 			$kodebrg = $checkbarang['kode_barang'];
 			//pisahkan kodeunit dan number
 			$pisah = explode("-", $kodebrg);
 			$number = (int)$pisah[1];

 			$number = $number+1;

 			if ($number >= 1 and $number <= 9){

				echo $kodeunit."-00".$number; 				

 			}else if($number >= 10 and $number <= 99){

 				echo $kodeunit."-0".$number;

 			}else{

 				echo $kodeunit."-".$number; 				
 			}

 		}else{
 			//jika kode unit tidak ada maka buat kode barang default
 			$kodedefault = "001";

 			echo $kodeunit."-".$kodedefault;

 		}




 		/*algoritma generate kode

		//string yang akan dipecah
		$teks = "MTR-001";
		//pecah string berdasarkan string ","
		$pecah = explode("-", $teks);
		//mencari element array 0
		$hasil = $pecah[0];
		$hasil2 = (int)$pecah[1];


		//tampilkan hasil pemecahan
		echo $hasil;
		echo $hasil2;

		end algoritma generate kode*/
 	}

 	
 }
