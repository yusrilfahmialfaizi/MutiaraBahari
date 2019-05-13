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
			$this->load->library('form_validation');
			$this->load->helper('url');
		}
		public function index()
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/user', $user);
			$this->load->view('_partial/footertable');
		}
}
?>