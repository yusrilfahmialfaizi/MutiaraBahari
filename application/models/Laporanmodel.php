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
			$this->db->select('*');
			$this->db->from('laporan_transaksi_all');
			$this->db->like('tanggal',$date);
			// $this->db->or_like('harga',$keyword);
			return $this->db->get()->result();
			// return $this->db->query("SELECT * FROM `laporan_transaksi_all` WHERE tanggal LIKE $date")->result();
		}

	}
?>