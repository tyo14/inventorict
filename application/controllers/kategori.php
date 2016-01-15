<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Kategori extends CI_Controller {

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
 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$this->load->view('head');
 		$this->load->view('daftarkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('savekategori')){

 			$data = $this->input->post();
	 		unset($data['savekategori']);

	 		$this->global_model->create('kategori',$data);

	 		redirect(site_url('kategori/tambah'));
 		}

 		$data['devisi'] = $this->global_model->find_all('divisi');
 		$this->load->view('head');
 		$this->load->view('inputkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpan(){
 		$kodedivisi = $this->input->post('kode_divisi');
 		$kodekategori = $this->input->post('kode_kategori');
 		$namakategori = $this->input->post('nama_kategori');

 		$checkkode = count($this->global_model->find_by('kategori', array('kode_kategori' => $kodekategori)));

 		$checknama = count($this->global_model->find_by('kategori', array('nama_kategori' => $namakategori)));

 		if($kodedivisi == "" || $kodekategori == "" || $namakategori == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
 			if($checknama > 1 && $checkkode > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode dan Nama kategori sudah ada";
	            echo "</div>";
	 		}else if($checknama > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Nama kategori sudah ada";
	            echo "</div>";
	 		}else if($checkkode > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode kategori sudah ada";
	            echo "</div>";
	 		}else{
	 			$data = $this->input->post();
			 	//unset($data['savekategori']);

			 	$this->global_model->create('kategori',$data);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "Data berhasil ditambahkan";
	            echo "</div>";
	 		}
 		}
 	}

 	public function ubah($id)
 	{

 		$data['devisi'] = $this->global_model->find_all('divisi');
 		$check = $this->global_model->find_by('kategori', array('kode_kategori' => $id));
 		list($kodekategori,$digit) = explode('-', $check['kode_kategori']);
 		$data['kategoridivisi'] = $kodekategori;
 		$data['kategori'] = $this->global_model->find_by('kategori', array('kode_kategori' => $id));

 		$this->load->view('head');
 		$this->load->view('ubahkategori',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpanubah($id){
 		$kodedivisi = $this->input->post('kode_divisi');
 		$kodekategori = $this->input->post('kode_kategori');
 		$namakategori = $this->input->post('nama_kategori');

 		$checkkode = count($this->global_model->find_by('kategori', array('kode_kategori' => $kodekategori)));

 		$checknama = count($this->global_model->find_by('kategori', array('nama_kategori' => $namakategori)));

 		$sql = $this->global_model->find_by('kategori', array('kode_kategori' => $id));
 			if($kodekategori == $sql['kode_kategori'] && $namakategori == $sql['nama_kategori']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checknama > 1 && $checkkode > 1 && $kodekategori != $sql['kode_kategori'] && $namakategori != $sql['nama_kategori']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode dan Nama kategori sudah ada";
		            echo "</div>";
	 			}else if($checkkode > 1 && $kodekategori != $sql['kode_kategori']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode kategori sudah ada";
		            echo "</div>";	
 				}else if($checknama > 1 && $namakategori != $sql['nama_kategori']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Nama kategori sudah ada";
		            echo "</div>";	
 				}else{
 					$data = $this->input->post();
			 		//unset($data['savekategori']);

			 		$this->global_model->update('kategori',$data, array('kode_kategori' => $id));

	 				echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label> Data berhasil di ubah";
		            echo "</div>";

 				}

 			}

 	}

 	public function hapus($id){
 		$this->global_model->delete('kategori',array('kode_kategori' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "Data berhasil di hapus";
        echo "</div>";
 	}




}
