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
			$date = $this->input->post('tanggal');
			if ($date == null) {
				$data['all'] = $this->Laporanmodel->getTransaksiAll();
			}else{
				$data['all'] = $this->Laporanmodel->getTransaksi($date);
			}
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/laporanharian',$data);
		}
		function laporanbulanan()
		{
			$year = $this->input->post('tahun');
			$month = $this->input->post('bulan');
			if ($year == null && $month == null) {
				# code...
				$data['all'] = $this->Laporanmodel->getTransaksiAll();
			}else{
				$data['all'] = $this->Laporanmodel->getTransaksiMonth($year,$month);
			}
			$data['year'] = $this->Laporanmodel->getYear();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/laporanbulanan',$data);
		}
	}
 ?>