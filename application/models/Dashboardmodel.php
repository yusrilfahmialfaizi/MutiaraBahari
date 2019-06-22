<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Dashboardmodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}

		function count_user()
		{
			return $this->db->query("SELECT count_user() AS jumlah")->result();
		}
		function count_agen()
		{
			return $this->db->query("SELECT count_agen() AS jumlah")->result();
		}
		function count_pelanggan()
		{
			return $this->db->query("SELECT count_pelanggan() AS jumlah")->result();
		}
		function count_allpegawai()
		{
			return $this->db->query("SELECT count_allpegawai() AS jumlah")->result();
		}
		function count_pegawai()
		{
			return $this->db->query("SELECT count_pegawai() AS jumlah")->result();
		}
		function pendapatan_perhari()
		{
			return $this->db->query("SELECT pendapatan_perhari() AS jumlah")->result();
		}
		function pendapatan_perbulan()
		{
			return $this->db->query("SELECT pendapatan_perbulan() AS jumlah")->result();
		}
	}
?>