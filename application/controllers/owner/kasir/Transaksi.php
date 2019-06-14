<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Transaksi extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('Usermodel');
			$this->load->model('Barangmodel');
			$this->load->library('form_validation');
			$this->load->helper('url');
		}

		public function riwayat_trans()
		{	
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$view_transaksi['view_transaksi'] = $this->Barangmodel->riwayat();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/kasir/riwayat',$view_transaksi);
			$this->load->view('_partial/footertable');
		}
	}
?>