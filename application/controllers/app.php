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
 		$data['kategoriapp'] = $this->global_model->find_all('kategoriapp');
 		$this->load->view('head');
 		$this->load->view('inputapp',$data); //Contains
 		$this->load->view('footer');

 	}

 	public function simpan(){
 		$kodeapp = $this->input->post('kode_app');
 		$namaapp = $this->input->post('nama_app');
 		$bitapp = $this->input->post('bit');
 		$kategoriapp = $this->input->post('kode_kategoriapp');

 		$checkkode = count($this->global_model->find_by('app', array('kode_app' => $kodeapp)));

 		$checknama = count($this->global_model->find_by('app', array('nama_app' => $namaapp)));

 		if($kodeapp == "" || $namaapp == "" || $bitapp == "" || $kategoriapp == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
 			if($checkkode > 0 && $kodeapp != $sql['kode_app']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode app sudah ada";
		            echo "</div>";	
 			}else{

		 		$data = $this->input->post();
	 			//unset($data['saveapp']);

	 			$this->global_model->create('app', $data);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi ! </label> Data berhasil ditambahkan";
	            echo "</div>";	 		
	        }
 		}
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('app', array('kode_app' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "<label>Informasi !</label> Data berhasil di hapus";
        echo "</div>";
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

 	public function simpanubah($id){
 		$kodeapp = $this->input->post('kode_app');
 		$namaapp = $this->input->post('nama_app');
 		$bitapp = $this->input->post('bit');
 		$deskripsiapp = $this->input->post('deskripsi');
 		$kategoriapp = $this->input->post('kode_kategoriapp');

 		$checkkode = count($this->global_model->find_by('app', array('kode_app' => $kodeapp)));

 		$checknama = count($this->global_model->find_by('app', array('nama_app' => $namaapp)));

 		//validasi
 		$sql = $this->global_model->find_by('app', array('kode_app' => $id));

 		if($kodeapp == $sql['kode_app'] && $namaapp == $sql['nama_app'] && $bitapp == $sql['bit'] && $deskripsiapp == $sql['deskripsi'] && $kategoriapp == $sql['kode_kategoriapp']){
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checkkode > 0 && $kodeapp != $sql['kode_app']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode app sudah ada";
		            echo "</div>";	
 				}else if($kodeapp == "" || $namaapp == "" || $bitapp == "" || $kategoriapp == ""){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
		            echo "</div>";
 				}else{ 					
 					$getid = $id;
		 			$data = $this->input->post();

		 			$this->global_model->update('app',$data,array('kode_app' => $id));

	 				echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label> Data berhasil di ubah";
		            echo "</div>";

 				}

 			}

 	}

}