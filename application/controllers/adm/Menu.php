<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends MY_Controller		
{
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->library('custom_library');
		if($this->session->userdata('verivikasi') != "verivied"){
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center" role="alert">Anda Harus Login!</div>');
			redirect(base_url('adm/welcome'));
		}
	}

	public function index()
	{
        $data['menu']=$this->db->query("Select * from menu order by sort asc")->result_array();
        
		$this->page('adm/menu/list',$data);
	}
	public function add()
	{
		$data=[
			'nama'=>$this->input->post('_nama',true),
			'link'=>$this->input->post('_link',true),
			'icon'=>$this->input->post('_icon',true),
			'sort'=>1,
			'level'=>1,
			'access'=>1
		];
		$this->db->insert('menu',$data);
		redirect(base_url('adm/menu'));
	}
	
    public function delete_menu($id)
    {
        $this->db->query("DELETE from menu where id='$id'");
        redirect('adm/menu');
    }
	public function opennewmenu()
	{
		$this->load->view('adm/menu/new_menu');
	}
	public function editmenu($id)
	{
		$data['menu']=$this->db->query("Select * from Menu where id='$id'")->row_array();
		$this->load->view('adm/menu/edit_menu',$data);
	}
	public function editmenugo()
	{	
		$id		= $_POST['id'];
		$nama	= $_POST['nama'];
		$link	= $_POST['link'];
		$icon	= $_POST['icon'];
		$sort	= $_POST['sort'];
		$level	= $_POST['level'];
		$access	= $_POST['access'];
		
		$this->db->query("UPDATE menu set
							nama='$nama',
							link='$link',
							icon='$icon',
							sort='$sort',
							level='$level',
							access='$access' WHERE id='$id'");
							
		redirect('adm/menu');
	}
    
}



