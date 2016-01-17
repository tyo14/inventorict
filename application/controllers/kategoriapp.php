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

 	public function simpan()
 	{
 		$kodekategoriapp = strtoupper($this->input->post('kode_kategoriapp'));
 		$namakategoriapp = $this->input->post('nama_kategoriapp');

 		$checkkode = count($this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $kodekategoriapp)));

 		$checknama = count($this->global_model->find_by('kategoriapp', array('nama_kategoriapp' => $namakategoriapp)));

 		if($kodekategoriapp == "" || $namakategoriapp == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
	 		if($checknama > 0 && $checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode dan Nama kategori app sudah ada";
	            echo "</div>";
	 		}else if($checknama > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Nama kategori app sudah ada";
	            echo "</div>";
	 		}else if($checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode kategori app sudah ada";
	            echo "</div>";
	 		}else{
		 		$data = $this->input->post();
		 		$data['kode_kategoriapp'] = strtoupper($data['kode_kategoriapp']);

			 	$this->global_model->create('kategoriapp',$data);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi ! </label> Data berhasil ditambahkan";
	            echo "</div>";
	 		}
 		}
 	}

 	public function ubah($id)
 	{ 		
 		$data['kategoriapp'] = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahkategoriapp',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpanubah($id)
 	{
 		$kodekategoriapp = strtoupper($this->input->post('kode_kategoriapp'));
 		$namakategoriapp = $this->input->post('nama_kategoriapp');

 		$checkkode = count($this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $kodekategoriapp)));

 		$checknama = count($this->global_model->find_by('kategoriapp', array('nama_kategoriapp' => $namakategoriapp)));

 		//validasi
 		$sql = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $id));

 		if($kodekategoriapp == $sql['kode_kategoriapp'] && $namakategoriapp == $sql['nama_kategoriapp']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodekategoriapp != $sql['kode_kategoriapp'] && $namakategoriapp != $sql['nama_kategoriapp']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode dan Nama kategori app sudah ada";
		            echo "</div>";
	 			}else if($checkkode > 0 && $kodekategoriapp != $sql['kode_kategoriapp']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode kategori app sudah ada";
		            echo "</div>";	
 				}else if($checknama > 0 && $namakategoriapp != $sql['nama_kategoriapp']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Nama kategori app sudah ada";
		            echo "</div>";	
 				}else{
 					//selain itu
	 				$data = $this->input->post();
		 			$data['kode_kategoriapp'] = strtoupper($data['kode_kategoriapp']);
		 			$get = $data['kode_kategoriapp'];

		 			$this->global_model->update('kategoriapp',$data, array('kode_kategoriapp' => $id));

		 			if($data['kode_kategoriapp'] != $id){

		 				foreach ($this->global_model->search('app',array('kode_app' => $id),null,null,null,0) as $row) {
		 					list($kodes,$digits) = explode('-', $row['kode_app']);
		 					$ubah = array(
		 						'kode_app' => $get.'-'.$digits,
		 						'kode_kategoriapp' => $get);

		 					$sip = $row['kode_app'];

		 					$this->global_model->update('app',$ubah,array('kode_app' => $sip));
		 				}

		 			}

	 				echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label> Data berhasil di ubah";
		            echo "</div>";

 				}

 			}

 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('kategoriapp', array('kode_kategoriapp' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "<label>Informasi !</label> Data berhasil di hapus";
        echo "</div>";
 	}

 	public function ajaxkategoriapp($id){
 		/*generate kode kategori*/

 		//get kode kategoriapp
 		$data = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $id));

 		$kodekategoriapp = $data['kode_kategoriapp'];

 		//check kode unit di table kategori
 		$checkkategoriapp = $this->global_model->query("select kode_app from app where kode_app LIKE '$kodekategoriapp%' order by kode_app desc");

 		if ($checkkategoriapp != null){
 			//jika kode unit ada maka check kode barang terakhir
 			//ambil sample kode barang terakhir
 			//pisahkan kodeunit dan number 			
 			$pisah = explode('-', $checkkategoriapp[0]['kode_app']);
 			
 			$number =  (int) $pisah[1];

 			$digit = intval($number) + 1;

 			if ($digit >= 1 and $digit <= 9){

				echo $kodekategoriapp."-00".$digit; 				

 			}else if($digit >= 10 and $digit <= 99){

 				echo $kodekategoriapp."-0".$digit;

 			}else{

 				echo $kodekategoriapp."-".$digit; 				
 			}


 		}else{
 			//jika kode unit tidak ada maka buat kode barang default
 			$kodedefault = "001";

 			echo $kodekategoriapp."-".$kodedefault;

 		}
 	}

}
