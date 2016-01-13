<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Devisi extends CI_Controller {

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
 		$data['devisi'] = $this->global_model->find_all('divisi');
 		$this->load->view('head');
 		$this->load->view('daftardivisi', $data); //Contains
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$this->load->view('head');
 		$this->load->view('inputdevisi'); //Contains
 		$this->load->view('footer');	
 	}

 	public function simpan()
 	{
 		$kodedivisi = $this->input->post('kode_divisi');
 		$namadivisi = $this->input->post('nama_divisi');

 		$checkkode = count($this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi)));

 		$checknama = count($this->global_model->find_by('divisi', array('nama_divisi' => $namadivisi)));

 		if($checknama > 1 && $checkkode > 1){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Kode dan Nama divisi sudah ada";
            echo "</div>";
 		}else if($checknama > 1){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Nama divisi sudah ada";
            echo "</div>";
 		}else if($checkkode > 1){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Kode divisi sudah ada";
            echo "</div>";
 		}else{
	 		$data = $this->input->post();
	 		$data['kode_divisi'] = strtoupper($data['kode_divisi']);
		 	//unset($data['savedevisi']);

		 	$this->global_model->create('divisi',$data);

		 	echo "<div class='alert alert-success alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "Data berhasil ditambahkan";
            echo "</div>";
 		}
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('divisi', array('kode_divisi' => $id));
 		redirect(site_url('devisi'));
 	}

 	public function simpanubah($id){
 			$kodedivisi = $this->input->post('kode_divisi');
	 		$namadivisi = $this->input->post('nama_divisi');

	 		$checkkode = count($this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi)));
	 		$checknama = count($this->global_model->find_by('divisi', array('nama_divisi' => $namadivisi)));

 			//validasi
 			$sql = $this->global_model->find_by('divisi', array('kode_divisi' => $id));

 			if($kodedivisi == $sql['kode_divisi'] && $namadivisi == $sql['nama_divisi']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checknama > 1 && $checkkode > 1 && $kodedivisi != $sql['kode_divisi'] && $namadivisi != $sql['nama_divisi']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode dan Nama divisi sudah ada";
		            echo "</div>";
	 			}else if($checkkode > 1 && $kodedivisi != $sql['kode_divisi']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode divisi sudah ada";
		            echo "</div>";	
 				}else if($checknama > 1 && $namadivisi != $sql['nama_divisi']){
	 				echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Nama divisi sudah ada";
		            echo "</div>";	
 				}else{
 					//selain itu
	 				$data = $this->input->post();
		 			$data['kode_divisi'] = strtoupper($data['kode_divisi']);
		 			$get = $data['kode_divisi'];

		 			$this->global_model->update('divisi',$data, array('kode_divisi' => $id));

		 			if($data['kode_divisi'] != $id){

		 				foreach ($this->global_model->search('kategori',array('kode_kategori' => $id),null,null,null,0) as $row) {
		 					list($kodes,$digits) = explode('-', $row['kode_kategori']);
		 					$ubah = array(
		 						'kode_kategori' => $get.'-'.$digits,
		 						'nama_kategori' => $row['nama_kategori']);

		 					$sip = $row['kode_kategori'];

		 					$this->global_model->update('kategori',$ubah,array('kode_kategori' => $sip));
		 				}

		 			}

	 				echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label>Data berhasil di ubah";
		            echo "</div>";

 				}

 			}
	 		/*$checkkode = count($this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi)));

	 		$checknama = count($this->global_model->find_by('divisi', array('nama_divisi' => $namadivisi)));

	 		if($checknama > 1 && $checkkode > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode dan Nama divisi sudah ada";
	            echo "</div>";
	 		}else if($checknama > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Nama divisi sudah ada";
	            echo "</div>";
	 		}else if($checkkode > 1){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode divisi sudah ada";
	            echo "</div>";
	 		}else{

	 		}

 			$data = $this->input->post();
 			$data['kode_divisi'] = strtoupper($data['kode_divisi']);
 			$get = $data['kode_divisi'];
 			$idlama = $id;
 			unset($data['savedevisi']);

 			$this->global_model->update('divisi',$data, array('kode_divisi' => $id));

 			if($data['kode_divisi'] != $id){
 				$url = 'devisi/ubah/'.$data['kode_divisi'];

 				foreach ($this->global_model->search('kategori',array('kode_kategori' => $id),null,null,null,0) as $row) {
 					list($kodes,$digits) = explode('-', $row['kode_kategori']);
 					$ubah = array(
 						'kode_kategori' => $get.'-'.$digits,
 						'nama_kategori' => $row['nama_kategori']);

 					$this->global_model->update('kategori',$ubah,array('kode_kategori' => $row['kode_kategori']));
 				}

 			}else{
 				$url = 'devisi/ubah/'.$id;
 			}

 			redirect(site_url($url));*/

 	}

 	public function ubah($id){
 		$data['devisi'] = $this->global_model->find_by('divisi', array('kode_divisi' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahdivisi', $data); //Contains
 		$this->load->view('footer');
 	}


 	public function ajaxdevisi($id){

 		/*generate kode kategori*/

 		//get kode divisi
 		$data = $this->global_model->find_by('divisi', array('kode_divisi' => $id));

 		$kodedivisi = $data['kode_divisi'];

 		//check kode unit di table kategori
 		$checkdivisi = $this->global_model->query("select kode_kategori from kategori where kode_kategori LIKE '$kodedivisi%' order by kode_kategori desc");

 		if ($checkdivisi != null){
 			//jika kode unit ada maka check kode barang terakhir
 			//ambil sample kode barang terakhir
 			//pisahkan kodeunit dan number 			
 			$pisah = explode('-', $checkdivisi[0]['kode_kategori']);
 			
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

 	public function ajaxunit($id){

 		echo "<option></option>";
 		foreach ($this->global_model->search('unit',array('kode_kategori' => $id),null,null,null,0) as $row) {
 			echo "<option value='".$row['kode_unit']."'>".$row['nama_unit']."</option>";
 		}
 	}

}
