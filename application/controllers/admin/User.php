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
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$user['id'] = $this->Usermodel->id_user();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/user', $user);
			// $this->load->view('_partial/footertable');
		}
		public function owner()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("owner"));
			}
			$user['id'] = $this->Usermodel->id_user();
			$user['id'] = $this->Pegawaimodel->getPegawai();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/user', $user);
			// $this->load->view('_partial/footertable');
		}
		function tambahAgen()
		{
			$this->Usermodel->addAgen();
			redirect('admin/user');
		}
		function editAgen()
		{
			$this->Usermodel->editAgen();
			redirect('admin/user');
		}
		function editPass()
		{
			// $echo = $this->input->post('password');
			// $userid = $this->input->post('userid');			
			// $pass = password_hash($echo, PASSWORD_DEFAULT);
			// $password = array(
				// 'password' => $pass);
			$this->Usermodel->editPassword();
			redirect('admin/user');
		}
		function hapusAgen($id)
		{
			$this->Usermodel->hapusAgen($id);
			redirect('admin/user');
		}
}
?>