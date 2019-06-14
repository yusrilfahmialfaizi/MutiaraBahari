<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('Usermodel');
			$this->load->model('Pegawaimodel');
			$this->load->library('form_validation');
			$this->load->helper('url');
		}
		public function index()
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$user['id'] = $this->Usermodel->id_user();
			// $user['pegawai'] = $this->Pegawaimodel->getPegawai();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/user', $user);
			// $this->load->view('_partial/footertable');
		}
		public function pegawai()
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$user['id'] = $this->Pegawaimodel->id_pegawai();
			$user['pegawai'] = $this->Pegawaimodel->getPegawai();
			// $user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/pegawai', $user);
			// $this->load->view('_partial/footertable');
		}
		function lihatusername()
		{
			$username = $this->input->post('username');
			$pegawai = $this->Pegawaimodel->getPegawai();
			foreach ($pegawai as $key) {
				# code...
				if ($key->username == $username) {
					# code...
					$data = array('gagal' => "gagal");
					echo json_encode($data);
				}else{
					$data = array('berhasil' => "berhasil" );
					echo json_encode($data);
				}
			}
			
		}
		function tambahPegawai()
		{
			$id_pegawai = $this->input->post('id_pegawai');
			$nama 		= $this->input->post('nama_pegawai');
			$jabatan 	= $this->input->post('jabatan');
			$alamat 	= $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$username 	= $this->input->post('username');
			$pass 		= $this->input->post('password');
			$password 	= password_hash($pass, PASSWORD_DEFAULT);
			$data 		= array(
							'id_pegawai'	=> $id_pegawai,
							'nama'			=> $nama,
							'jabatan'		=> $jabatan,
							'alamat'		=> $alamat,
							'no_telepon'	=> $no_telepon,
							'username'		=> $username,
							'password'		=> $password);
			$this->Pegawaimodel->addPegawai($data);
			redirect('owner/user/pegawai');
		}
		function editPegawai()
		{
			$id_pegawai = $this->input->post('id_pegawai');
			$nama 		= $this->input->post('nama_pegawai');
			$jabatan 	= $this->input->post('jabatan');
			$alamat 	= $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$username 	= $this->input->post('username');
			$data 		= array(
							'id_pegawai'	=> $id_pegawai,
							'nama'			=> $nama,
							'jabatan'		=> $jabatan,
							'alamat'		=> $alamat,
							'no_telepon'	=> $no_telepon,
							'username'		=> $username);
			$this->Pegawaimodel->editPegawai($id_pegawai,$data);
			redirect('owner/user/pegawai');
		}
		function editPassPegawai()
		{
			$id_pegawai = $this->input->post('pegawaiid');
			$pass		= $this->input->post('pass');
			$password 	= password_hash($pass, PASSWORD_DEFAULT);
			$data = array('password'	=> $password);
			$this->Pegawaimodel->editPassword($id_pegawai,$data);
			redirect('owner/user/pegawai');
		}
		function hapusPegawai($id)
		{
			$this->Pegawaimodel->hapusPegawai($id);
			redirect('owner/user/pegawai');
		}
		function tambahAgen()
		{
			$this->Usermodel->addAgen();
			redirect('owner/user');
		}
		function editAgen()
		{
			$this->Usermodel->editAgen();
			redirect('owner/user');
		}
		function editPass()
		{
			$this->Usermodel->editPassword();
			redirect('owner/user');
		}
		function hapusAgen($id)
		{
			$this->Usermodel->hapusAgen($id);
			redirect('owner/user');
		}
	}
?>