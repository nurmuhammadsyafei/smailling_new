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
        $data['pesan'] 	= $this->db->query("SELECT * FROM surat a
                                            LEFT JOIN pegawai b on a.npp_pemilik=b.npp")->result_array();
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
		var_dump($_POST);echo"<br><br>";
		var_dump($_FILES);


				$config['upload_path']          = './surat/';
                $config['allowed_types']        = 'pdf';
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







	// CONTOH
	public function contoh(){
		$this->load->view('adm/pesan/contoh');
	} 
	public function upload(){
		if ($_FILES)
{
    $tmp = $_FILES['file_input']['tmp_name'];
    $type = $_FILES['file_input']['type'];
    $size = $_FILES['file_input']['size'];
    $filename = $_FILES['file_input']['name'];
    $path = pathinfo($_SERVER['PHP_SELF']);
    $destination = $path['dirname'] . '/' . $filename;
    if (move_uploaded_file($tmp, $_SERVER['DOCUMENT_ROOT'] . $destination))
        $status = 1;
    else
        $status = 2;
 
    $hasil = array(
        'status' => $status,
        'filename' => $filename,
        'type' => $type,
        'size' => $size,
    );
    echo json_encode($hasil);
}
	}
}



