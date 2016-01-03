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
 		$data['rakitan'] = $this->global_model->find_all('rakitan_header');
 		$this->load->view('head');
 		$this->load->view('daftarrakitan',$data);
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

 	public function simpan()
 	{
 		if($this->input->post('simpan')){
 			
 			//kumpulkan inputan
 			$data = $this->input->post();
 			unset($data['simpan']);

 			//untuk data header
 			$dataheader = array('kode_rakit' => $data['kode_rakit'],
 								'tanggal_rakit' => $data['tanggal_rakit'],
 								'pengguna' => $data['pengguna'],
 								'unit_health' => $data['unit_health']);

 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tanggal_rakit'));

 			$dataheader['tanggal_rakit'] = $tahun."-".$bulan."-".$tanggal;

 			$this->global_model->create('rakitan_header',$dataheader);

 			//untuk data detail

 			$validasi = $this->input->post('validasi');
 			$kdrakit = $this->input->post('kode_rakit');
 			$konf = $this->input->post('konfigurasi');
 			$kdbrg = $this->input->post('kode_barang');

 			if(is_array($validasi)){
				 for($i = 0; $i < count($validasi); $i++){
					$number[$i] = (int) $validasi[$i] - 1;
					
				 }
				 foreach($number as $nilai => $hasil){
				 	$datadetail = array('kode_rakit' => $kdrakit,
  									'kode_barang' => $kdbrg[$hasil],
  									'konfigurasi' => $konf[$hasil]);
					//echo $country[$hasil]."-".$txtbox[$hasil];
					//echo "<br />";  
					$this->global_model->create('rakitan_detail',$datadetail);
				 }

				 redirect(site_url('rakitan/tambah'));
					
			}else if(empty($validasi)){
				  redirect(site_url('rakitan/tambah'));
			}

 			
 		}
 	}

 	public function hapus($id){
 		$this->global_model->delete('rakitan_header', array('kode_rakit' => $id));
 		redirect(site_url('rakitan'));
 	}

 	public function ubah($id){
 		if($this->input->post('simpanrakitan')){
 			
 			//kumpulkan inputan
 			$data = $this->input->post();
 			unset($data['simpanrakitan']);

 			//untuk data header
 			$dataheader = array('kode_rakit' => $data['kode_rakit'],
 								'tanggal_rakit' => $data['tanggal_rakit'],
 								'pengguna' => $data['pengguna'],
 								'unit_health' => $data['unit_health']);

 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tanggal_rakit'));

 			$dataheader['tanggal_rakit'] = $tahun."-".$bulan."-".$tanggal;

 			$this->global_model->update('rakitan_header',$dataheader,array('kode_rakit'=>$id));

 			//untuk data detail

 			$validasi = $this->input->post('validasi');
 			$kdrakit = $this->input->post('kode_rakit');
 			$konf = $this->input->post('konfigurasi');
 			$kdbrg = $this->input->post('kode_barang');

 			if(is_array($validasi)){
				 for($i = 0; $i < count($validasi); $i++){
					$number[$i] = (int) $validasi[$i] - 1;
					
				 }
				 foreach($number as $nilai => $hasil){
				 	$datadetail = array('kode_rakit' => $kdrakit,
  									'kode_barang' => $kdbrg[$hasil],
  									'konfigurasi' => $konf[$hasil]);
					//echo $country[$hasil]."-".$txtbox[$hasil];
					//echo "<br />";  
					$this->global_model->create('rakitan_detail',$datadetail);
				 }

				 redirect(site_url('rakitan'));
					
			}else if(empty($validasi)){
				  redirect(site_url('rakitan'));
			}
 			
 		}

 		$data['rakitanheader'] = $this->global_model->find_by('rakitan_header', array('kode_rakit' => $id));

 		$data['rakitandetail'] = $this->global_model->query("select * from barang inner join rakitan_detail on barang.kode_barang = rakitan_detail.kode_barang where rakitan_detail.kode_rakit = '$id'");
 		$data['datadivisi'] = $this->global_model->find_all('divisi');
 		$data['databarang'] = $this->global_model->find_all('barang');

 		$this->load->view('head');
 		$this->load->view('ubahrakitan', $data);
 		$this->load->view('footer');

 	}

 	public function ubahsimpan($id){
 	if($this->input->post('simpanrakitan')){
 			
 			//kumpulkan inputan
 			$data = $this->input->post();
 			unset($data['simpanrakitan']);

 			//untuk data header
 			$dataheader = array('kode_rakit' => $data['kode_rakit'],
 								'tanggal_rakit' => $data['tanggal_rakit'],
 								'pengguna' => $data['pengguna'],
 								'unit_health' => $data['unit_health']);

 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tanggal_rakit'));

 			$dataheader['tanggal_rakit'] = $tahun."-".$bulan."-".$tanggal;

 			$this->global_model->update('rakitan_header',$dataheader,array('kode_rakit'=>$id));

 			//untuk data detail

 			$validasi = $this->input->post('validasi');
 			$kdrakit = $this->input->post('kode_rakit');
 			$konf = $this->input->post('konfigurasi');
 			$kdbrg = $this->input->post('kode_barang');

 			if(is_array($validasi)){
				 for($i = 0; $i < count($validasi); $i++){
					$number[$i] = (int) $validasi[$i] - 1;
					
				 }
				 foreach($number as $nilai => $hasil){
				 	$datadetail = array('kode_rakit' => $kdrakit,
  									'kode_barang' => $kdbrg[$hasil],
  									'konfigurasi' => $konf[$hasil]);
					//echo $country[$hasil]."-".$txtbox[$hasil];
					//echo "<br />";  
					$this->global_model->create('rakitan_detail',$datadetail);
				 }

				 redirect(site_url('rakitan'));
					
			}else if(empty($validasi)){
				  redirect(site_url('rakitan'));
			}

 			
 		}	
 	}

 	public function hapusbarang($id){
 		$sql = $this->global_model->find_by('rakitan_detail', array('id'=> $id));

 		$getid = $sql['kode_rakit'];
 		$this->global_model->delete('rakitan_detail', array('id' => $id));
 		redirect(site_url('rakitan/ubah/'.$getid));	
 	}

 }