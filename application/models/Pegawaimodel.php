<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Pegawaimodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function getPegawai()
		{
			return $this->db->get('pegawai')->result();
		}
		function getWhere()
		{

		}
		function addPegawai($data)
		{
			$this->db->insert('pegawai',$data);
		}
		function editPegawai($id_pegawai,$data)
		{
			$this->db->where('id_pegawai',$id_pegawai);
			$this->db->update('pegawai',$data);
		}
		function editPassword($id_pegawai,$data)
		{
			$this->db->where('id_pegawai',$id_pegawai);
			$this->db->update('pegawai',$data);
		}
		function id_pegawai()
		{
			$this->db->select('MAX(RIGHT(pegawai.id_pegawai,2)) AS id_pegawai', FALSE);
			$this->db->order_by('id_pegawai','Desc');
			$this->db->limit(1);
			$query = $this->db->get('pegawai');
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_pegawai) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 2,"0", STR_PAD_LEFT);
			$id_barang_tampil =$batas;
			return $id_barang_tampil;
		}
	}
?>