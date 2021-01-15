<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pesan extends MY_Controller		
{
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('custom_library');
		$this->load->library('malasngoding');
		if($this->session->userdata('verivikasi') != "verivied"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
			redirect(base_url('adm/welcome'));
		}
	}

	public function index(){
        $npp 			= $this->session->userdata('smailling_npp');       
		     
        // var_dump($data);die();                            
        $this->page('adm/pesan/view');
	}
	
	public function inbox(){
		$npp 			= $this->session->userdata('smailling_npp');
		$user			= $this->db->query("SELECT * FROM pegawai where npp='$npp'")->row_array();
        $data['pesan'] 	= $this->db->query("SELECT * FROM surat a
                                            LEFT JOIN pegawai b on a.npp_pembuat=b.npp WHERE a.id_kelompok_pembuat='$user[id_kelompok]'")->result_array();
		$data['unread'] = $this->db->query("SELECT COUNT(*)'unread' from surat where npp_approver='$npp' and terbaca='0'")->row_array();
        $data['total'] 	= $this->db->query("SELECT COUNT(*)'total' from surat where npp_approver='$npp'")->row_array(); 
		$this->load->view('adm/pesan/inbox',$data);
	}
	public function notin(){
		$npp 			= $this->session->userdata('smailling_npp');
		$data['user']	= $this->db->query("SELECT * FROM pegawai a 
												LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok 
												LEFT JOIN divisi c   on b.id_divisi=c.id_divisi 
												where npp='$npp'")->row_array();
		$id_kel = $data['user']['id_kelompok'];
		$data['mykelompok'] = $this->db->query("SELECT * FROM pegawai a 
													LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok 
													LEFT JOIN jabatan c on a.id_jabatan=c.id_jabatan 
													where a.id_kelompok='$id_kel'")->result_array();
		$data['approver']	= $this->db->query("SELECT * FROM pegawai a 
													LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok 
													LEFT JOIN jabatan c   on a.id_jabatan=c.id_jabatan  where a.id_kelompok='$id_kel' and a.id_jabatan='4'")->result_array();
		$this->load->view('adm/pesan/notin',$data);
	}
	public function memo(){
		$npp 			= $this->session->userdata('smailling_npp');
		$data['user']	= $this->db->query("SELECT * FROM pegawai a 
												LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok 
												LEFT JOIN divisi c   on b.id_divisi=c.id_divisi 
												where npp='$npp'")->row_array(); 
		$this->load->view('adm/pesan/memo',$data);
	}

	public function insertpesan(){
		// var_dump($_FILES['_surat']);
		$namafile 		= $_FILES['_surat']['name'];
		$explode		= explode(".",$namafile);
		$extensifile	= $explode[1];
		// var_dump($explode[1]);
		$date 		= date("ymdhis");
		$tglbuat 	= date("Y-m-d H:i:s");
		// var_dump($_POST['_npp_pembuat'].$date);
		// die();
		$filenamedb = $_POST['_npp_pembuat'].'_'.$date.'.'.$extensifile;
		$data=[
			'jenis_surat' 				=> $_POST['_jenissurat'],  //jenis surat
			'nomor_surat'				=> $_POST['_nomor'],    //nomor surat
			'id_kelompok_pembuat'		=> $_POST['_darikelompok'], //dari
			'id_kelompok_tujuan'		=> $_POST['_kepada'], //kepada
			'perihal_surat'				=> $_POST['_perihal'], //perihal
			'isi_surat'					=> $_POST['_pesan'], //isi pesan
			'file_surat'				=> $filenamedb, //surat file
			'npp_pembuat'				=> $_POST['_npp_pembuat'], //surat file
			'terbaca'					=> '0', //lampiran file
			'npp_validator'				=> $_POST['_validator'], //validator
			'npp_approver'				=> $_POST['_approver'], //approver
			'tgl_buat'					=> $tglbuat //approver
		];
		$this->db->insert('surat',$data);
		$this->uploadfile($filenamedb);
	}

	public function uploadfile($filenamedb){
		var_dump($_POST);echo"<br><br>";
		var_dump($_FILES);


				$config['upload_path']          = './surat/';
                $config['allowed_types']        = 'pdf';
                $config['file_name']       		= $filenamedb;
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('_surat'))
                {
                        $error = array('error' => $this->upload->display_errors());

						var_dump($error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
						var_dump($data);
                        // $this->load->view('upload_success', $data);
                }
	}


	public function lihat_pesan($id_pesan){
		// echo $id_pesan;
		$data['surat']	= $this->db->query("SELECT a.*,b.nama_kelompok 'kelpembuat',c.nama_kelompok 'keltujuan' FROM surat a 
											LEFT JOIN (SELECT id_kelompok,nama_kelompok FROM kelompok) b ON a.id_kelompok_pembuat=b.id_kelompok
											LEFT JOIN (SELECT id_kelompok,nama_kelompok FROM kelompok) c ON a.id_kelompok_tujuan=c.id_kelompok
												 where a.id_surat='$id_pesan'")->row_array();
		$this->load->view('adm/pesan/lihat_pesan',$data);
	} 


}



