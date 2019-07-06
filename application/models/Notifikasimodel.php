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
			$data = $this->session->userdata("id_user");
			return $this->db->query("CALL count_notif($data)")->result();
		}
		function getnotif()
		{
			$this->db->order_by('waktu DESC, status ASC');
			$this->db->where('id_user',$this->session->userdata("id_user"));
			$this->db->limit(5);
			return $this->db->get("notifikasi")->result();
		}
		function getnotifall()
		{
			$this->db->order_by('waktu DESC, status ASC');
			$this->db->where('id_user',$this->session->userdata("id_user"));
			// $this->db->limit(5);
			return $this->db->get("notifikasi")->result();
		}
		function update()
		{
			return $this->db->update('notifikasi', array('status' => "Dibaca" ));
		}
	}
?>