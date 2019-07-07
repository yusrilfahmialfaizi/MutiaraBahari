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
			$this->db->like('tanggal',$date);
			return $this->db->get('laporan_transaksi_all')->result();
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
		function getHutang()
		{
			return $this->db->get('tampilhutang')->result();
		}
	}
?>