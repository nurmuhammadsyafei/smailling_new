<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller		
{
	// CONSTRUC-------------------- Welcome CONTROLLER
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	// CONSTRUC-------------------- Welcome CONTROLLER
	// STAR--PROSES--LOGIN
	public function index()
	{
		$this->form_validation->set_rules('_email','Email','trim|required');
		$this->form_validation->set_rules('_password','Password','trim|required');
		if ($this->form_validation->run() == false) {	
			$data['kel'] = $this->db->query("SELECT * FROM kelompok")->result_array();
			$data['jab'] = $this->db->query("SELECT * FROM jabatan")->result_array();
			$this->load->view('adm/login',$data);
		}
		else{
			$this->_login();
		}
		
	}
	private function _login()
	{/*ambil data dari form email dan password saat login*/
		$email   =$this->input->post('_email',true);
		$password=$this->input->post('_password',true);
		/*cek apakah ada data di database yang sesuai dengan email inputan login */
		$user = $this->db->get_where('auth_user',['npp'=>$email])->row_array();
		if($user){	
			//jika user aktif
			if (password_verify($password, $user['auth_password'])) {
				//cek password nya --
				if($user['auth_is_active']==1) {
					$data=[
						'data'=>$user,
						'status'=>'login'
					]; 
					$this->session->set_userdata($data);
					$log=[
						'nama'=>$_SESSION['data']['auth_username'],
						'tanggal'=>date("Y-m-d H:i:s")
					];
					$this->db->insert('data_login',$log);
					// var_dump($_SESSION);die();
					// $this->db->query("INSERT INTO ");
					redirect('adm/dashboard');	//Jika lolos smua , diarahkan ke link 
				}else{
					$this->session->set_flashdata('message','<span style="color:red;font-weight:bold" >User anda tidak aktif ! Hubungi Admin
						</span>');
					redirect('adm/welcome');
				}
			}else{
				$this->session->set_flashdata('message_password','<span style="color:red;font-weight:bold" >Password salah !
					</span>');
				redirect('adm/welcome');
			}
		}else{
			$this->session->set_flashdata('message','<span style="color:red;font-weight:bold">Email Tidak terdaftar !
						</span>');
			redirect('adm/welcome');

		}	
	}
// END--PROSES--LOGIN

	public function regist()
	{
		$awalanwa = substr($_POST['no_wa'],0,1);
			if($awalanwa=='0'){$no_wa = "62".substr($_POST['no_wa'],1,20);}
			else if($awalanwa=='6'){$no_wa = $_POST['no_wa'];}
			else{$no_wa = $_POST['no_wa'];}

		$data=
			[ 
			'npp'			=> strtoupper($_POST['npp']),
			'nama' 			=> $_POST['nama'],
			'no_wa'			=> $no_wa,
			'id_kelompok' 	=> $_POST['kelompok'],
			'id_jabatan'	=> $_POST['jabatan'],
			'password'		=> password_hash('bankbni',PASSWORD_DEFAULT),
			'active' 		=> '0',
			'created_date'	=> date("Y-m-d")
		];

		$this->db->insert('pegawai',$data);
		echo "Akun berhasil didaftarkan, Silhkan Login";
		// $this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">,<br> silahkan aktivasi!
		// 	</div>');
		// redirect('adm/welcome/index');
	}
	public function logout_dashboard()
	{
		$this->session->unset_userdata('data');
		$this->session->unset_userdata('status');
		redirect(base_url('adm/welcome')); 
	}
	//LUPA PASSWORD
	public function lupapasword()
	{
		$this->form_validation->set_rules('_email','trim|required');
		$this->form_validation->set_rules('_pasdef','PasswordDefault','trim|required');
		if($this->form_validation->run()==false){
			$this->load->view('adm/lupa_pasword');
		}else{
			$this->_go1();
		}
	}

	private function _go1()
	{/*ambil data dari form email dan password saat login*/
		$email   =$this->input->post('_email',true);
		$password=$this->input->post('_pasdef',true);
		/*cek apakah ada data di database yang sesuai dengan email inputan login */
		$user = $this->db->get_where('auth_user',['npp'=>$email])->row_array();
		if($user){	
			if (password_verify($password, $user['auth_default_password'])) {
					$data=[
						'data'=>$user,
						'status'=>'login'
					];
					$this->session->set_userdata($data); ?>
					<script>alert("Atur Ulang Kata Sandi Anda")</script>
			<?php	redirect('adm/welcome/go2');	//Jika lolos smua , diarahkan ke link 
			}else{
				$this->session->set_flashdata('message_password','<span style="color:red;font-weight:bold" >Password salah ! ( Tanya kelompok SPO )
					</span>');
				redirect('adm/welcome/lupapasword');
			}
		}else{
			$this->session->set_flashdata('message','<span style="color:red;font-weight:bold">User Tidak terdaftar !
						</span>');
			redirect('adm/welcome/lupapasword');
		}
	}

	public function go2()
	{
		// $this->load->view('adm/lupa_pasword_next');
		
		$this->form_validation->set_rules('_newpas', 'Password','required|trim|min_length[5]|matches[_newpas1]',[
			'matches'=>'Password harus sama!',	
			'min_length'=>'Password terlalu pendek, minimal 5 karakter!'
			]);//validasi nama harus ada
		$this->form_validation->set_rules('_newpas1', 'Password','matches[_newpas]');//validasi nama harus ada

		if($this->form_validation->run()==false){
			$this->load->view('adm/lupa_pasword_next');
		}else{
		$id = $this->input->post('_id',true);
		$data=['auth_password'=>password_hash($this->input->post('_newpas',true),PASSWORD_DEFAULT)];
		$this->db->where('auth_id',$id);
		$this->db->update('auth_user',$data);
		?>
		<script>
			alert("Perubahan Password Berhasil !");
			window.location.href = "<?= base_url() ?>";
		</script>
		<?php
		//redirect('adm/welcome');
		}
	}
	// private function _get_go2()
	// {
		
	// }

}



