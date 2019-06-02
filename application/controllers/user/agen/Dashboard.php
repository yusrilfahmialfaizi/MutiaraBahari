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
	 		$this->load->library("cart");
	 	}
	 	public function index()
 		{
 			if($this->session->userdata('stat') != "login"){
				redirect(base_url("user/login"));
			}
 			$data['merek'] = $this->Barangmodel->getMerek();
			$data['barang'] = $this->Barangmodel->getBarang();
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/frontdashboard',$data);
			// $this->load->view('_partial/footer');
		}
		function produk()
		{
			if($this->session->userdata('stat') != "login"){
				redirect(base_url("user/login"));
			}

			if(!$this->uri->segment(5)){
					$data['barang'] = $this->Barangmodel->getBarang();
			} else {
				$data['barang'] = $this->Barangmodel->get_barangagen($this->uri->segment(5));

			}
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/produk',$data);
			// $this->load->view('_partial/footer');
		}
		
	 } 
 ?>