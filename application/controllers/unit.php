<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Unit extends CI_Controller {

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
 		$data['unit'] = $this->global_model->find_all('unit');
 		$this->load->view('head');
 		$this->load->view('daftarunit', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$this->load->view('head');
 		$this->load->view('inputunit',$data); //Contains
 		$this->load->view('footer');	
 	}

 	public function simpan(){
 		$kodekategori = $this->input->post('kode_kategori');
 		$kodeunit = $this->input->post('kode_unit');
 		$namaunit = $this->input->post('nama_unit');

 		$checkkode = count($this->global_model->find_by('unit', array('kode_unit' => $kodeunit)));

 		$checknama = count($this->global_model->find_by('unit', array('nama_unit' => $namaunit)));

 		if($kodekategori == "" || $kodeunit == "" || $namaunit == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
 			if($checknama > 0 && $checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode dan Nama unit sudah ada";
	            echo "</div>";
	 		}else if($checknama > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Nama unit sudah ada";
	            echo "</div>";
	 		}else if($checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode unit sudah ada";
	            echo "</div>";
	 		}else{
	 			$data = $this->input->post();
	 			$data['kode_unit'] = strtoupper($data['kode_unit']);
		 		//unset($data['saveunit']);

		 		$this->global_model->create('unit',$data);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "Data berhasil ditambahkan";
	            echo "</div>";
	 		}
 		}
 	}

 	public function ubah($id)
 	{
 		$data['unit'] = $this->global_model->find_by('unit', array('kode_unit' => $id));
 		$data['kategori'] = $this->global_model->find_all('kategori');
 		$this->load->view('head');
 		$this->load->view('ubahunit', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpanubah($id){
 		$kodekategori = $this->input->post('kode_kategori');
 		$kodeunit = strtoupper($this->input->post('kode_unit'));
 		$namaunit = $this->input->post('nama_unit');

 		$checkkode = count($this->global_model->find_by('unit', array('kode_unit' => $kodeunit)));

 		$checknama = count($this->global_model->find_by('unit', array('nama_unit' => $namaunit)));

 		$sql = $this->global_model->find_by('unit', array('kode_unit' => $id));
 			if($kodeunit == $sql['kode_unit'] && $namaunit == $sql['nama_unit']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodeunit != $sql['kode_unit'] && $namaunit != $sql['nama_unit']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode dan Nama unit sudah ada";
		            echo "</div>";
	 			}else if($checkkode > 0 && $kodeunit != $sql['kode_unit']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode unit sudah ada";
		            echo "</div>";	
 				}else if($checknama > 0 && $namaunit != $sql['nama_unit']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Nama unit sudah ada";
		            echo "</div>";	
 				}else{
 					$data = $this->input->post();
		 			$data['kode_unit'] = strtoupper($data['kode_unit']);
		 			$get = $data['kode_unit'];

		 			$this->global_model->update('unit',$data, array('kode_unit' => $id));

		 			if($data['kode_unit'] != $sql['kode_unit']){

		 				foreach ($this->global_model->search('barang',array('kode_barang' => $sql['kode_unit']),null,null,null,0) as $row) {
		 					list($kodes,$digits) = explode('-', $row['kode_barang']);
		 					$ubah = array(
		 						'kode_barang' => $get.'-'.$digits,
		 						'kode_unit' => $get);

		 					$sip = $row['kode_barang'];

		 					$this->global_model->update('barang',$ubah,array('kode_barang' => $sip));
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
 		$this->global_model->delete('unit', array('kode_unit' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "Data berhasil di hapus";
        echo "</div>";
 	}


}
