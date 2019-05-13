<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		public function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('Usermodel');
			$this->load->model('Barangmodel');
			$this->load->library('form_validation');
			$this->load->helper('url');
		}
		public function index()
		{
			//load view index
			$this->load->view('partialLogin/header');
			$this->load->view('partialLogin/body');
			$this->load->view('partialLogin/footer');
		}
		function aksilogin()
		{
			$username = $this->input->post("username");
			$pass = $this->input->post("pass");
			$where = array(
					'username' => $username,
					'password' => $pass);
			$cek = $this->Usermodel->cek_login("pegawai",$where)->num_rows();
			if ($cek > 0) {
				# code...
				$data = $this->Usermodel->cek_data("pegawai", $where);
				foreach ($data->result() as $key) {
					# code...
				$data_session = array(
					'nama' => $key->nama,
					'status' => "login"
				);
				}

				$this->session->set_userdata($data_session);

				redirect(base_url("admin/dashboard"));
			}else{
				redirect(base_url("admin/login/index"));
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/login'));
		}
		
		
	}
?>