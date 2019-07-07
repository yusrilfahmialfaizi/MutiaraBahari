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
	 	}
	 	public function index()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/dashboard');
			$this->load->view('_partial/footer');
		}
	 } 
?>