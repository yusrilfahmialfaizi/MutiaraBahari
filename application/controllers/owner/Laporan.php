<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Laporan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('Laporanmodel');
		}
		function laporanharian()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$date = $this->input->post('tanggal');
			if ($date == null) {
				$data['all'] = $this->Laporanmodel->getTransaksiAll();
			}else{
				$data['all'] = $this->Laporanmodel->getTransaksi($date);
			}
			$this->load->view('_partial/header');
			$this->load->view('menu/laporanharian',$data);
		}
		function laporanbulanan()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$year = $this->input->post('tahun');
			$month = $this->input->post('bulan');
			if ($year == null && $month == null) {
				# code...
				$data['all'] = $this->Laporanmodel->getTransaksiAll();
			}else{
				$data['all'] = $this->Laporanmodel->getTransaksiMonth($year,$month);
			}
			$data['year'] = $this->Laporanmodel->getYear();
			$this->load->view('_partial/header');
			$this->load->view('menu/laporanbulanan',$data);
		}
		function laporanhutang()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$data['all'] = $this->Laporanmodel->getHutang();
			$this->load->view('_partial/header');
			$this->load->view('menu/laporanhutang',$data);
		}
	}
 ?>