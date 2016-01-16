<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
 class Barang extends CI_Controller {

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
 		$data['barang'] = $this->global_model->query('select * from barang inner join status_barang on barang.kode_barang = status_barang.kode_barang');
 		$this->load->view('head');
 		$this->load->view('daftarbarang',$data);
 		$this->load->view('footer');
 	}

 	public function tambah()
 	{
 		$data['divisi'] = $this->global_model->find_all('divisi');
 		$this->load->view('head');
 		$this->load->view('inputbarang',$data); //Contains
 		$this->load->view('footer');		

 	}

 	public function simpan()
 	{
 		$kodebarang = $this->input->post('kode_barang');
 		$checkkode = count($this->global_model->find_by('barang', array('kode_barang' => $kodebarang)));

 		$check = $this->input->post();

 		if($check == ""){
 			echo "<div class='alert alert-danger alert-dismissable'>";
	           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	           echo "<label>Peringatan ! </label> Data tidak boleh kosong";
            echo "</div>";
 		}else{
 			if($checkkode > 0){
	 			echo "<div class='alert alert-danger alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Peringatan ! </label> Kode barang sudah ada";
	            echo "</div>";
	 		}else{
		 		$inputbarang = array('kode_barang' => $this->input->post('kode_barang'),
 								 'tgl_beli' => $this->input->post('tgl_beli'),
 								 'nama_barang' => $this->input->post('nama_barang'),
 								 'deskripsi' => $this->input->post('deskripsi'),
 								 'kode_unit' => $this->input->post('kode_unit'));


	 			$inputstatus = array('kondisi_barang' => $this->input->post('kondisi_barang'),
	 								 'status_stok' => $this->input->post('status_stok'),
	 								 'kode_barang' => $this->input->post('kode_barang'));

	 			//unset($data['simpan']);

	 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tgl_beli'));

	 			$inputbarang['tgl_beli'] = $tahun."-".$bulan."-".$tanggal;

		 		$this->global_model->create('barang',$inputbarang);
		 		$this->global_model->create('status_barang',$inputstatus);

			 	echo "<div class='alert alert-success alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
		           echo "<label>Informasi !</label> Data berhasil ditambahkan";
	            echo "</div>";
	 		}
 		}

 	}

 	public function ajaxbarang($id)
 	{
 		/*generate kode barang*/

 		//get kode unit
 		$data = $this->global_model->find_by('unit', array('kode_unit' => $id));

 		$kodeunit = $data['kode_unit'];

 		//check kode unit di table barang
 		$checkbarang = $this->global_model->query("select kode_barang from barang where kode_barang LIKE '$kodeunit%' order by kode_barang desc");

 		if ($checkbarang != null){
 			//jika kode unit ada maka check kode barang terakhir
 			//ambil sample kode barang terakhir
 			//pisahkan kodeunit dan number 			
 			$pisah = explode('-', $checkbarang[0]['kode_barang']);

 			
 			$number =  (int) $pisah[1];

 			$digit = intval($number) + 1;

 			if ($digit >= 1 and $digit <= 9){

				echo $kodeunit."-00".$digit; 				

 			}else if($digit >= 10 and $digit <= 99){

 				echo $kodeunit."-0".$digit;

 			}else{

 				echo $kodeunit."-".$digit; 				
 			}


 		}else{
 			//jika kode unit tidak ada maka buat kode barang default
 			$kodedefault = "001";

 			echo $kodeunit."-".$kodedefault;

 		}

 	}

 	public function hapus($id){
 		$this->global_model->delete('barang', array('kode_barang' => $id));
 		echo "<div class='alert alert-success alert-dismissable'>";
	        echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
	        echo "<label>Informasi !</label> Data berhasil di hapus";
        echo "</div>";
 	}

 	public function ubah($id){

 		$sql = "select *from barang inner join status_barang on barang.kode_barang = status_barang.kode_barang 
 		inner join unit on barang.kode_unit = unit.kode_unit inner join kategori on unit.kode_kategori = kategori.kode_kategori
 		 inner join divisi on kategori.kode_divisi = divisi.kode_divisi where barang.kode_barang='".$id."'";

 		$query = $this->db->query($sql);

 		$row = $query->row(); 

 		$data['all'] = array('kode_divisi' => $row->kode_divisi,
 			'kode_unit' => $row->kode_unit,
 			'kode_barang' => $row->kode_barang,
 			'tgl_beli' => $row->tgl_beli,
 			'nama_barang' => $row->nama_barang,
 			'deskripsi' => $row->deskripsi,
 			'kondisi_barang' => $row->kondisi_barang,
 			'status_stok' => $row->status_stok);

 		$data['dataunit'] = $this->global_model->find_all('unit');
 		$data['divisi'] = $this->global_model->find_all('divisi');

 		$this->load->view('head');
 		$this->load->view('ubahbarang',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function simpanubah($id){
 			//barang
 			$kodeunit = $this->input->post('kode_unit');
 			$kodebarang = $this->input->post('kode_barang');
 			list($bulan,$tanggal,$tahun) = explode('/', $this->input->post('tgl_beli'));
 			$tanggalbeli = $tahun."-".$bulan."-".$tanggal;
 			$namabarang = $this->input->post('nama_barang');
 			$deskripsi = $this->input->post('deskripsi');

 			//status barang
 			$kondisibarang = $this->input->post('kondisi_barang');
 			$status_stok = $this->input->post('status_stok');

 			//validasi
 			$sql = $this->global_model->find_by('barang', array('kode_barang' => $id));
 			$sql2 = $this->global_model->find_by('status_barang', array('kode_barang' => $id));

 			$checkkode = count($this->global_model->find_by('barang', array('kode_barang' => $kodebarang)));

 			if($kodeunit==$sql['kode_unit']&&$kodebarang==$sql['kode_barang']&&$tanggalbeli==$sql['tgl_beli']
 				&&$tanggalbeli==$sql['tgl_beli']&&$namabarang==$sql['nama_barang']&&$deskripsi==$sql['deskripsi']
 				&&$kondisibarang==$sql2['kondisi_barang']&&$status_stok==$sql2['status_stok']){
 				
 				echo "<div class='alert alert-info alert-dismissable'>";
		           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
		           echo "<label>Informasi !</label> Tidak ada perubahan";
	            echo "</div>";

 			}else{

 				if($checkkode > 0 && $kodebarang != $sql['kode_barang']){
		 			echo "<div class='alert alert-danger alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Peringatan ! </label> Kode barang sudah ada";
		            echo "</div>";
		 		}else{

		 			$inputbarang = array('kode_barang' => $kodebarang,
		 								 'tgl_beli' => $tanggalbeli,
		 								 'nama_barang' => $namabarang,
		 								 'deskripsi' => $deskripsi,
		 								 'kode_unit' => $kodeunit);


		 			$inputstatus = array('kondisi_barang' => $kondisibarang,
		 								 'status_stok' => $status_stok,
		 								 'kode_barang' => $kodebarang);

			 		$this->global_model->update('barang',$inputbarang, array('kode_barang' => $id));
			 		$this->global_model->update('status_barang',$inputstatus, array('kode_barang' => $id));

				 	echo "<div class='alert alert-success alert-dismissable'>";
			           echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";	           
			           echo "<label>Informasi !</label> Data berhasil diubah";
		            echo "</div>";
		 		}

 			}
 	}

 	
 }
