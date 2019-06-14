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
			if($this->session->userdata('status') != "login"){
				redirect(base_url("owner"));
			}
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/dashboard');
			$this->load->view('_partial/footer');
		}
	 } 
?>