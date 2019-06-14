<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Dashboard extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Kasirmodel");
		}
		function index()
		{
			if($this->session->userdata('jabatan') != "Kasir" || $this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			// $user['id'] = $this->Usermodel->id_user();
			// $user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/headerkasir');
			$this->load->view('menu/kasir/dashboard');
		}
	}
?>