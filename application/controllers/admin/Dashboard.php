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
	 		$this->load->model("Dashboardmodel");
	 	}
	 	public function index()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['user'] = $this->Dashboardmodel->count_user();
			$data['agen'] = $this->Dashboardmodel->count_agen();
			$data['pelanggan'] = $this->Dashboardmodel->count_pelanggan();
			$data['pegawai'] = $this->Dashboardmodel->count_pegawai();
			$data['pendapatan_perhari'] = $this->Dashboardmodel->pendapatan_perhari();
			$data['pendapatan_perbulan'] = $this->Dashboardmodel->pendapatan_perbulan();
			$data['allpegawai'] = $this->Dashboardmodel->count_allpegawai();
			$this->load->view('_partial/header');
			$this->load->view('menu/dashboard',$data);
			$this->load->view('_partial/footer');
		}
		function load()
		{
			$data = $this->Dashboardmodel->count_user();
			foreach ($data as $key) {
				# code...
			echo $key->jumlah;
			}
			echo "string";
		}
	 } 
 ?>