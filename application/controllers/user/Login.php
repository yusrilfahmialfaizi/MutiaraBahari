<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Usermodel");
		}
		function index()
		{
			$this->load->view('login_user/header');
			$this->load->view('login_user/body');
			$this->load->view('login_user/footer');
		}
		function aksilogin()
		{
			$username = $this->input->post("username");
			$pass = $this->input->post("password");
			$where = array(
					'username' => $username);
			$cek = $this->Usermodel->cek_login("user",$where)->num_rows();
			if ($cek > 0) {
				# code...
				$data = $this->Usermodel->cek_data("user", $where);
				foreach ($data->result() as $key) {
					if (password_verify($pass, $key->password) && $key->status == 'agen') {
						# code...
						$data_session = array(
							'id_user' => $key->id_user,
							'nama' => $key->nama,
							'alamat' => $key->alamat,
							'no_telepon' => $key->no_telepon,
							'username' => $key->username,
							'status' => $key->status,
							'stat' => "login"
						);
						$this->session->set_userdata($data_session);

						redirect(base_url("user/agen/dashboard"));
					}else if (password_verify($pass, $key->password) && $key->status == 'pelanggan biasa') {
						$data_session = array(
							'id_user' => $key->id_user,
							'nama' => $key->nama,
							'alamat' => $key->alamat,
							'no_telepon' => $key->no_telepon,
							'username' => $key->username,
							'status' => $key->status,
							'stat' => "login"
						);
						$this->session->set_userdata($data_session);
						redirect(base_url("user/pelanggan/dashboard"));
					}else{
						redirect('user/login');
					}
				}
			}else{
				redirect('user/login');
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
?>