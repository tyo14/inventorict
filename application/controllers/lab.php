<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Lab extends CI_Controller {

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
 		$data['lab'] = $this->global_model->find_all('laboratorium');
 		$this->load->view('head');
 		$this->load->view('daftarlab',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		if($this->input->post('savelab')){


 			$data = $this->input->post();
 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
 			unset($data['savelab']);

 			$this->global_model->create('laboratorium', $data);
 		}
 		//$data['lab'] = $this->global_model->find_all('laboratorium');
 		$this->load->view('head');
 		$this->load->view('inputlab'); //Contains
 		$this->load->view('footer');
 	}

 	public function simpan(){
 		$kodelab = 'Lab-'.$this->input->post('kode_lab');
 		$namalab = $this->input->post('nama_lab');

 		$checkkode = count($this->global_model->find_by('laboratorium', array('kode_lab' => $kodelab)));

 		$checknama = count($this->global_model->find_by('laboratorium', array('nama_lab' => $namalab)));

 		if($kodelab == "" || $namalab == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
	 		if($checknama > 0 && $checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode dan Nama workgroup sudah ada";
	            echo "</div>";
	 		}else if($checknama > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Nama workgroup sudah ada";
	            echo "</div>";
	 		}else if($checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode workgroup sudah ada";
	            echo "</div>";
	 		}else{
		 		$data = $this->input->post();
	 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
	 			//unset($data['savelab']);

	 			$this->global_model->create('laboratorium', $data);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi ! </label> Data berhasil ditambahkan";
	            echo "</div>";
	 		}
 		}
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('laboratorium', array('kode_lab' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "<label>Informasi !</label> Data berhasil di hapus";
        echo "</div>";
 	}

 	public function ubah($id)
 	{
 		$getid = $id;
 		if($this->input->post('savelab')){
 			$data = $this->input->post();
 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
 			unset($data['savelab']);

 			$this->global_model->update('laboratorium',$data,array('kode_lab' => $getid));

 			if($data['kode_lab'] != $getid){
 				$url = $data['kode_lab'];
 			}else{
 				$url = $getid;
 			}

 			redirect(site_url('lab/ubah/'.$url));
 		}

 		$data['lab'] = $this->global_model->find_by('laboratorium', array('kode_lab' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahlab',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpanubah($id){
 		$getid = $id;
 		$kodelab = 'Lab-'.$this->input->post('kode_lab');
 		$namalab = $this->input->post('nama_lab');

 		$checkkode = count($this->global_model->find_by('laboratorium', array('kode_lab' => $kodelab)));

 		$checknama = count($this->global_model->find_by('laboratorium', array('nama_lab' => $namalab)));

 		//validasi
 		$sql = $this->global_model->find_by('laboratorium', array('kode_lab' => $id));

 		if($kodelab == $sql['kode_lab'] && $namalab == $sql['nama_lab']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodelab != $sql['kode_lab'] && $namalab != $sql['nama_lab']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode dan Nama workgroup sudah ada";
		            echo "</div>";
	 			}else if($checkkode > 0 && $kodelab != $sql['kode_lab']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode workgroup sudah ada";
		            echo "</div>";	
 				}else if($checknama > 0 && $namalab != $sql['nama_lab']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Nama workgroup sudah ada";
		            echo "</div>";	
 				}else{

 					$data = $this->input->post();
		 			$data['kode_lab'] = 'Lab-'.$this->input->post('kode_lab');
		 			//unset($data['savelab']);

		 			$this->global_model->update('laboratorium',$data,array('kode_lab' => $getid));

	 				echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label> Data berhasil di ubah";
		            echo "</div>";

 				}

 			}

 	}



}
