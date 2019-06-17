<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Notifikasimodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function tambah($data)
		{
			return $this->db->insert('notifikasi', $data);
		}
		function jumlah()
		{
			return $this->db->query('CALL count_notif("001")')->result();
		}
	}
?>