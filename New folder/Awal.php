<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	  * 
	  */
	 class Awal extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		# code...
	 		parent::__construct();
	 	}
	 	public function index()
	 		{
				$this->load->view('_partial/header2');
				$this->load->view('menuuser/dashboarduser');
				$this->load->view('_partial/footer');
			}
	 } 
 ?>