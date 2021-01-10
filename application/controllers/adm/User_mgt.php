<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_mgt extends MY_Controller		
{
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom_library');
		// if($this->session->userdata('status') != "login"){
		// 	$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
		// 	redirect(base_url('administrator/welcome'));
		// }
	}

	public function index()
	{
		$data['pegawai']=$this->db->query("SELECT * FROM pegawai a
											LEFT JOIN kelompok b on a.id_kelompok=b.id_kelompok
											LEFT JOIN jabatan c on a.id_jabatan=c.id_jabatan")->result_array();
		$this->page('adm/user/view',$data);
	}
	
    public function openupdate($id)
    {
		$data['detail']=$this->db->query("SELECT * FROM pegawai where id_pegawai='$id'")->row_array();
		$this->load->view('adm/user/view_update',$data); 
	}

    public function opennew()
    {
		$this->load->view('adm/user/view_add'); 
	}
	
    public function updateget($id,$npp,$nama_re,$no_wa_re,$kelompok,$jabatan)
    {
		$awalanwa = substr($no_wa_re,0,1);
			if($awalanwa=='0'){$no_wa = "62".substr($no_wa_re,1,20);}
			else if($awalanwa=='6'){$no_wa = $no_wa_re;}
			else{$no_wa = $no_wa_re;}
		$nama = str_replace("%20"," ",$nama_re);
		$data=[
			'npp' 	=> strtoupper($npp),
			'nama'	=> $nama,
			'no_wa'	=> $no_wa,
			'id_kelompok' => $kelompok,
			'id_jabatan'  => $jabatan
		];
		$this->db->where('id_pegawai',$id);
		$this->db->update('pegawai',$data);
		$this->session->set_flashdata('message','<span class="alert alert-success pull-rigth alert-ku">Perubahan Berhasil !</span>');
		redirect('adm/User_mgt');
	}
	
	

	
	// TAMBAH DATA 
	

	public function deleteget($id)
	{
		$this->db->delete('pegawai',['id_pegawai'=>$id]);
		$this->session->set_flashdata('message','<span class="alert alert-danger pull-rigth alert-ku">Akun Berhasil Dihapus !</span>');
		redirect('adm/User_mgt');
	}



	Public function tes()
	{
		$data=$this->db->get_Where('menu_access',['id_grup'=>$this->session->userdata('data')['auth_level']])->result_array();
		foreach($data as $data1){
			 $data2[]=$data1['id_menu'];
		}
		// var_dump($data2);
		
		
		$this->db->where_in('id',$data2);
		$query = $this->db->get('menu')->result_array();
		die();


		$data=[
			3,4,5
		];var_dump($data);die();
		$this->db->where_in('id',$data);
		$qry=$this->db->get('menu')->result_array();
		var_dump($qry);


die();
	}
}



