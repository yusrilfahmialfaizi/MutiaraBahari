<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Laporanmodel extends CI_Model
	{
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function getTransaksiAll()
		{
			return $this->db->get('laporan_transaksi_all')->result();
		}
		function getTransaksi($date)
		{
			// return $date;
			
			$this->db->like('tanggal',$date);
			// $this->db->or_like('harga',$keyword);
			return $this->db->get('laporan_transaksi_all')->result();
			// return $this->db->query("SELECT * FROM `laporan_transaksi_all` WHERE tanggal LIKE $date")->result();
		}
		function getTransaksiMonth($year,$month)
		{
			$this->db->where('YEAR(tanggal)',$year);
			$this->db->where('MONTH(tanggal)',$month);
			return $this->db->get('laporan_transaksi_all')->result();

		}
		function getYear()
		{
			return $this->db->query("Select DISTINCT YEAR(tanggal) as year From laporan_transaksi_all")->result();
		}
	}
?>