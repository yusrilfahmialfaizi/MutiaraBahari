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
	 		$this->load->model("Barangmodel");
	 	}
	 	public function index()
	 		{
	 			$data['barang'] = $this->Barangmodel->getMerek();
				$this->load->view('_partial/headeruser');
				$this->load->view('menu/user/frontdashboard',$data);
				$this->load->view('_partial/footer');
			}
	 } 
 ?>