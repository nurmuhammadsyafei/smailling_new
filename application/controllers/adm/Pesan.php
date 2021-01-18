<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pesan extends MY_Controller		
{
	
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
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
	
	public function myhistory(){
		$npp 			= $this->session->userdata('smailling_npp');
		$user			= $this->db->query("SELECT * FROM pegawai where npp='$npp'")->row_array();
        $data['pesan'] 	= $this->db->query("SELECT * FROM surat a
                                            LEFT JOIN pegawai b on a.npp_pembuat=b.npp 
											WHERE a.id_kelompok_pembuat='$user[id_kelompok]'
											order by tgl_buat desc")->result_array();
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
		$data['id_surat']	= $this->db->query("SELECT id_surat+1 'id' FROM surat ORDER BY id_surat DESC LIMIT 1")->row_array();
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
		var_dump($_POST['_validator']);echo"<br><br>";
		
		// $vldt = $_POST['_validator'];
		
		// $data = [];
		// array_push($data,$vldt);
		// var_dump($data);

		$npp = $_POST['_validator'];
		foreach($npp as $data){
			$npp = $data['npp'];
		}
		die();
		//insert validator
		if($_POST['_validator'][0]==''){
			}else{
				foreach($_POST['_validator'] as $data){
					$vld=['id_surat'=>$_POST['_id_surat'],'npp'=>$data,'masukan'=>''];
					$this->db->insert("validator",$vld);
				}
			}
			die();
		//insert approver
		foreach($_POST['_approver'] as $data){
			$aprvr=['id_surat'=>$_POST['_id_surat'],'npp'=>$data,'masukan'=>''];
			$this->db->insert("approver",$aprvr);
		}

		//insert surat
		$namafile 		= $_FILES['_surat']['name'];
		$explode		= explode(".",$namafile);
		$extensifile	= $explode[1];
		$date 		= date("ymdhis");
		$tglbuat 	= date("Y-m-d H:i:s");
		$filenamedb = $_POST['_npp_pembuat'].'_'.$date.'.'.$extensifile;
		$data=[
			'id_surat'					=> $_POST['_id_surat'],
			'jenis_surat' 				=> $_POST['_jenissurat'],  //jenis surat
			'nomor_surat'				=> $_POST['_nomor'],    //nomor surat
			'id_kelompok_pembuat'		=> $_POST['_darikelompok'], //dari
			'id_kelompok_tujuan'		=> $_POST['_kepada'], //kepada
			'perihal_surat'				=> $_POST['_perihal'], //perihal
			'isi_surat'					=> $_POST['_pesan'], //isi pesan
			'file_surat'				=> $filenamedb, //surat file
			'npp_pembuat'				=> $_POST['_npp_pembuat'], //surat file
			'terbaca'					=> '0', //lampiran file
			// 'npp_validator'				=> $_POST['_validator'], //validator
			// 'npp_approver'				=> $_POST['_approver'], //approver
			'tgl_buat'					=> $tglbuat //approver
		];
		$this->db->insert('surat',$data);
		$this->uploadfile($filenamedb);  //upload file
		redirect("adm/pesan");
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

	public function detail(){
		$this->load->view('adm/pesan/detail');
	}

	public function myteam(){
		$npp 			= $this->session->userdata('smailling_npp');
		$user			= $this->db->query("SELECT * FROM pegawai where npp='$npp'")->row_array();
		$data['pesan']	= $this->db->query("SELECT * FROM surat a
											LEFT JOIN pegawai b on a.npp_pembuat=b.npp 
											where id_kelompok_pembuat='$user[id_kelompok]'")->result_array();
		$data['total'] 	= $this->db->query("SELECT COUNT(*)'total' from surat 
											where npp_approver='$npp' AND id_kelompok_pembuat='$user[id_kelompok]'")->row_array(); 
		$this->page('adm/pesan/myteam',$data);
	}
	

	// SURAT PENDINGAN ATAU USULAN
	public function us(){
		$this->page('adm/pesan/usulan/view');
	}
	public function us_vw(){
		$npp 			= $this->session->userdata('smailling_npp');
		$user			= $this->db->query("SELECT * FROM pegawai where npp='$npp'")->row_array();
		$data['usulan']	= $this->db->query("SELECT *,d.nama_kelompok 'keltujuan' FROM surat a
											LEFT JOIN pegawai b on a.npp_pembuat=b.npp 
											LEFT JOIN (SELECT id_kelompok,nama_kelompok FROM kelompok) d ON a.id_kelompok_tujuan=d.id_kelompok
											where id_kelompok_pembuat='$user[id_kelompok]' order by tgl_buat desc")->result_array();
		$this->load->view('adm/pesan/usulan/list',$data);
	}
	public function us_det($id){
		$data['surat']	= $this->db->query("SELECT a.*,b.*,c.nama_kelompok 'kelpembuat',d.nama_kelompok 'keltujuan' FROM surat a
											LEFT JOIN (SELECT id_kelompok,nama_kelompok FROM kelompok) c ON a.id_kelompok_pembuat=c.id_kelompok
											LEFT JOIN (SELECT id_kelompok,nama_kelompok FROM kelompok) d ON a.id_kelompok_tujuan=d.id_kelompok
											LEFT JOIN validator b on a.id_surat=b.id_surat	where a.id_surat='$id'")->row_array();
		// $npp	= $data
		$data['vldt']	= $this->db->query("SELECT * FROM validator a
											LEFT JOIN pegawai b on a.npp=b.npp where id_surat='$id'")->result_array();
		$data['apprv']	= $this->db->query("SELECT * FROM approver a
											LEFT JOIN pegawai b on a.npp=b.npp where id_surat='$id'")->result_array();
		// $data['vldt']	= $this->db->query("SELECT * FROM approver a
		// 									LEFT JOIN pegawai b on a.npp=b.npp where id_surat='$id'")->result_array();
		$this->load->view('adm/pesan/usulan/detail',$data);
	}
	// END SURAT PENDINGAN ATAU USULAN


}



