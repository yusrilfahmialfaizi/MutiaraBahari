<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Pemesanan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function index()
		{
			if($this->session->userdata('stat') != "login"){
					redirect(base_url("user/login"));
			}
			$this->load->view('_partial/headeruser');
			$this->load->view('menu/user/pemesanan_agen');
		}
	}
?>