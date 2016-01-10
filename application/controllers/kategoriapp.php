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

 	public function ubah($id)
 	{
 		$getid = $id;

 		if($this->input->post('savekategori')){

 			$data = $this->input->post();
 			$data['kode_kategoriapp'] = strtoupper($data['kode_kategoriapp']);
 			unset($data['savekategori']);
 			$get = $data['kode_kategoriapp'];

 			$this->global_model->update('kategoriapp',$data, array('kode_kategoriapp' => $id));

 			if($data['kode_kategoriapp'] != $getid){
 				$url = 'kategoriapp/ubah/'.$data['kode_kategoriapp'];

 				foreach ($this->global_model->search('app',array('kode_app' => $id),null,null,null,0) as $row) {
 					list($kodes,$digits) = explode('-', $row['kode_app']);
 					$ubah = array(
 						'kode_app' => $get.'-'.$digits,
 						'nama_app' => $row['nama_app'],
 						'deskripsi' => $row['deskripsi'],
 						'bit' => $row['bit'],
 						'kode_kategoriapp' => $row['kode_kategoriapp']);

 					$this->global_model->update('app',$ubah,array('kode_app' => $row['kode_app']));
 				}

 			}else{
 				$url = 'kategoriapp/ubah/'.$id;
 			}

 			redirect(site_url($url));

 		}


 		$data['kategoriapp'] = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $id));
 		$this->load->view('head');
 		$this->load->view('ubahkategoriapp',$data); //Contains
 		$this->load->view('footer');
 	}

 	public function hapus($id)
 	{
 		$this->global_model->delete('kategoriapp', array('kode_kategoriapp' => $id));
 		redirect(site_url('kategoriapp'));
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
