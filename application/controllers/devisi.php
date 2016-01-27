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

 	public function message($mode,$text,$active)
 	{
 		//generate message
 		$messagesession = array(
 			'messagemode' => $mode,
 			'messagetext' => $text,
 			'messageactive' => $active);

 		$this->session->set_flashdata($messagesession);
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
 		if($this->input->post('savedivisi')){
	 		$kodedivisi = strtoupper($this->input->post('kode_divisi'));
	 		$namadivisi = $this->input->post('nama_divisi');

	 		$checkkode = count($this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi)));

	 		$checknama = count($this->global_model->find_by('divisi', array('nama_divisi' => $namadivisi)));

	 		if($kodedivisi == "" || $namadivisi == ""){

	 			$this->message('danger','Data tidak boleh kosong','tambahdevisi');
	 		}else{
		 		if($checknama > 0 && $checkkode > 0){
		 			$this->message('danger','Kode dan Nama divisi sudah ada','tambahdevisi');
		 		}else if($checknama > 0){
		 			$this->message('danger','Nama divisi sudah ada','tambahdevisi');
		 		}else if($checkkode > 0){
		 			$this->message('danger','Kode divisi sudah ada','tambahdevisi');
		 		}else{
			 		$data = $this->input->post();
			 		$data['kode_divisi'] = strtoupper($data['kode_divisi']);
			 		unset($data['savedivisi']);

				 	$this->global_model->create('divisi',$data);
				 	
				 	$this->message('success','Data berhasil ditambahkan','tambahdevisi');
		 		}
	 		}

	 		redirect(site_url('devisi/tambah'));
 		}
 		$this->load->view('head');
 		$this->load->view('inputdevisi'); //Contains
 		$this->load->view('footer');	
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('divisi', array('kode_divisi' => $id));

 		$this->message('success','Data berhasil di hapus','indexdevisi');

 		redirect(site_url('devisi'));
 	}

 	public function ubah($id){
 		if($this->input->post('savedivisi')){
 			$kodedivisi = strtoupper($this->input->post('kode_divisi'));
	 		$namadivisi = $this->input->post('nama_divisi');

	 		$checkkode = count($this->global_model->find_by('divisi', array('kode_divisi' => $kodedivisi)));
	 		$checknama = count($this->global_model->find_by('divisi', array('nama_divisi' => $namadivisi)));

 			//validasi
 			$sql = $this->global_model->find_by('divisi', array('kode_divisi' => $id));

 			if($kodedivisi == $sql['kode_divisi'] && $namadivisi == $sql['nama_divisi']){
 				$this->message('info','Tidak ada perubahan','ubahdevisi');
 				redirect(site_url('devisi/ubah/'.$id));
 			}else{

 				if($checknama > 0 && $checkkode > 0 && $kodedivisi != $sql['kode_divisi'] && $namadivisi != $sql['nama_divisi']){
 					$this->message('danger','Kode dan Nama divisi sudah ada','ubahdevisi');

 					redirect(site_url('devisi/ubah/'.$id));
	 			}else if($checkkode > 0 && $kodedivisi != $sql['kode_divisi']){
	 				$this->message('danger','Kode divisi sudah ada','ubahdevisi');
	 				redirect(site_url('devisi/ubah/'.$id));
 				}else if($checknama > 0 && $namadivisi != $sql['nama_divisi']){
 					$this->message('danger','Nama divisi sudah ada','ubahdevisi');
 					redirect(site_url('devisi/ubah/'.$id));
 				}else{
 					//selain itu
	 				$data = $this->input->post();
		 			$data['kode_divisi'] = strtoupper($data['kode_divisi']);
		 			unset($data['savedivisi']);
		 			$get = $data['kode_divisi'];

		 			$this->global_model->update('divisi',$data, array('kode_divisi' => $id));

		 			if($data['kode_divisi'] != $id){

		 				foreach ($this->global_model->search('kategori',array('kode_kategori' => $id),null,null,null,0) as $row) {
		 					list($kodes,$digits) = explode('-', $row['kode_kategori']);
		 					$ubah = array(
		 						'kode_kategori' => $get.'-'.$digits,
		 						'kode_divisi' => $get);

		 					$sip = $row['kode_kategori'];

		 					$this->global_model->update('kategori',$ubah,array('kode_kategori' => $sip));
		 				}

		 			}

		 			$this->message('success','Data berhasil di ubah','ubahdevisi');
		 			redirect(site_url('devisi/ubah/'.$get));

 				}

 			}

 		}
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
