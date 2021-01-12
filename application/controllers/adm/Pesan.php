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
		$data['user']	= $this->db->query("SELECT * FROM pegawai a 
												LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok 
												LEFT JOIN divisi c   on b.id_divisi=c.id_divisi 
												where npp='$npp'")->row_array();      
        // var_dump($data);die();                            
        $this->page('adm/pesan/view',$data);
	}
	
	public function inbox(){
		$npp 			= $this->session->userdata('smailling_npp');
        $data['pesan'] 	= $this->db->query("SELECT * FROM surat a
                                            LEFT JOIN pegawai b on a.npp_pemilik=b.npp")->result_array();
		$data['unread'] = $this->db->query("SELECT COUNT(*)'unread' from surat where npp_tujuan='$npp' and terbaca='0'")->row_array();
        $data['total'] 	= $this->db->query("SELECT COUNT(*)'total' from surat where npp_tujuan='$npp'")->row_array(); 
		$this->load->view('adm/pesan/inbox',$data);
	}
}



