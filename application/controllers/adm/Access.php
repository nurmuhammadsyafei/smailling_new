<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Access extends MY_Controller		
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
        
        $data['jabatan']=$this->db->query('SELECT * FROM jabatan')->result_array();
		$this->page('adm/access/view',$data);
    }
    public function add()
    {
        $data=
            [ 
            'nama_grup' 	=> htmlspecialchars($this->input->post('_nama',true)),
            'desc_grup'		=> htmlspecialchars($this->input->post('_desc',true)),
        ];
        $this->db->insert('kelompok',$data);
        $this->session->set_flashdata('message',
        '<span class="hideMe alert alert-success" role="alert">Penambahan Grup Berhasil !</span>');
        redirect('adm/grup');
    }
    public function view_detail($id)
    { 
        
        $data['jmlakses']   =$this->db->get_where('menu_access',['id_grup'=>$id])->num_rows();
        $data['menu']       =$this->db->get('menu')->result_array();
        $data['access']     =$this->db->get_where('menu_access',['id_grup'=>$id])->result_array();

        foreach($data['access'] as $dt){ $data['end']=json_encode($dt['id_menu']);}

        $data['grup']=$this->db->get_where('kelompok',['id_kelompok'=>$id])->row_array();
        $data['id']=$id;    
        $this->load->view('adm/access/view_detail',$data);
    }
    public function tambah_detail()
    {
        // var_dump($_POST);
        // die();
        // var_dump($this->input->post());die()
        $jmlperulangan = $this->db->get('menu')->num_rows();
            $this->db->delete('menu_access',['id_grup'=>$this->input->post('id')]);
        //echo $jmlperulangan.'<br><br>';
        for ($i = 1; $i < $jmlperulangan+1; $i++){
            // echo $i.$this->input->post('access'.$i);die();
            $data=[
                'id_grup'=>$this->input->post('id'),
                'id_menu'=>$this->input->post('access'.$i)
            ];
            $this->db->insert('menu_access',$data);
            $this->db->delete('menu_access',['id_grup'=>$this->input->post('id'),'id_menu'=>NULL]);
        }
        redirect(base_url('adm/access'));
    }
    public function keluarkan($data)
    {
        $dt['data']=$data;
        $this->load->view('adm/access/tes',$dt);
    }
    
    public function new_grup()
    {
        $this->load->view('adm/access/new_grup');
    }
    public function add_grup()
    {
        $data=
        [ 
        'nama_kelompok' 	=> htmlspecialchars($this->input->post('_nama',true)),
        'detail_kelompok' 	=> htmlspecialchars($this->input->post('_detail',true)),
        'id_divisi'		    => '1'
    ];
    // var_dump($_POST);
    // die();
    $this->db->insert('kelompok',$data);
    $this->session->set_flashdata('message',
    '<span class="hideMe alert alert-success" role="alert">Penambahan Kelompok Berhasil !</span>');
    redirect('adm/access');
        redirect('adm/Access');
    }

    public function delete_grup($id)
    {
        $this->db->query("DELETE from kelompok where id_grup='$id'");
        $this->session->set_flashdata('message',
        '<span class="hideMe alert alert-warning" role="alert">Penghapusan Grup Berhasil !</span>');
        redirect('adm/Access');
    }
}



