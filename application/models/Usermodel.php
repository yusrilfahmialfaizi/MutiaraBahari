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
		function cek_loginUser($username){	
			// $this->db->select('*');
			// $this->db->from('user');
			// $this->db->where('username',$username);
			// $query = $this->db->get();
			// return $query->result_array()
			return $this->db->get_where('user',array('username' => $username))->result();
		}
		function getget($email){
			return $this->db->query("SELECT id_user from user where username = '$email'")->result();
		}
		function cek_data($table,$where){		
			return $this->db->get_where($table,$where);
		}
		function updatepass($id_user,$password)
		{
			$this->db->where('id_user', $id_user);
			$this->db->update("user", array('password' => password_hash($password,PASSWORD_DEFAULT)));
		}
		function getPelanggan($nama)
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
		function id_user()
		{
			$this->db->select('MAX(RIGHT(user.id_user,3)) AS id_user', FALSE);
			$this->db->order_by('id_user','Desc');
			$this->db->limit(1);
			$query = $this->db->get('user');
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_user) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 3,"0", STR_PAD_LEFT);
			// foreach ($que as $key) {
			// 	# code...
			// 	$id_barang_tampil = $batas;
			// }
			$id_barang_tampil =$batas;
			return $id_barang_tampil;
		}
		function addAgen()
		{
			$id_user = $this->input->post('id_user');
			$nama = $this->input->post('nama_agen');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$status = "agen";
			$data = array(
				'id_user' => $id_user,
				'nama' => $nama,
				'alamat' =>$alamat,
				'no_telepon' => $no_telepon,
				'username' => $username,
				'password' => $password,
				'status' => $status);
			$this->db->insert('user',$data);
		}
		function editAgen()
		{
			$id_user = $this->input->post('id_user');
			$nama = $this->input->post('nama_agen');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$username = $this->input->post('username');
			$status = "agen";
			
			$hasil = $this->db->query("UPDATE user SET nama = '$nama', alamat = '$alamat', no_telepon = '$no_telepon', username = '$username' WHERE id_user =  '$id_user'");
			return $hasil;
		}
		function editPassword()
		{
			$pass = $this->input->post('pass');
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$userid = $this->input->post('userid');
			// $data = array(
			// 	'password' => $password,
			// );
			$hasilpass = $this->db->query("UPDATE user SET password = '$password' where id_user = '$userid'");
			return $hasilpass;
		}
		function hapusAgen($id)
		{
			return $this->db->delete("user", array("id_user" => $id));
		}
		function register($data)
		{
			$this->db->insert('user',$data);
		}
		function cek($helo)
		{
			$this->db->get_where('user',$helo)->result_array();
		}
	}
?>