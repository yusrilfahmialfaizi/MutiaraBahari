<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Usermodel extends CI_Model
	{
		// user get All
		public function getUser()
		{
			return $this->db->get('user')->result();
		}
		public function getPegawaiLogin($where)
		{
			$this->db->select("*");
			$this->db->from("pegawai");
			$this->db->where($where);
		}
		function cek_login($table,$where){		
			return $this->db->get_where($table,$where);
		}
		function cek_data($table,$where){		
			return $this->db->get_where($table,$where);
		}
		public function getPelanggan($nama)
		{
			$hasil=$this->db->query("SELECT * FROM user WHERE nama='$nama'");
	        if($hasil->num_rows()>0){
	            foreach ($hasil->result() as $data) {
	                $hasil=array(
	                    'id_user' => $data->id_user,
	                    'nama' => $data->nama,
	                    'alamat' => $data->alamat,
	                    'no_telepon' => $data->no_telepon,
	                    );
	            }
	        }
	        return $hasil;
			}
	}
?>