<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class LoginAndroid extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("LoginAndroidmodel");
		}
		function login_agen()
		{
			if ($this->input->post('username') != null && $this->input->post('password') != null) {
				# code...
				// echo "berhasil";
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$query = $this->LoginAndroidmodel->getLogin($username);
				foreach ($query as $hasil) {
					# code...
					if (password_verify($password, $hasil->password) && $hasil->status == "agen") {
						# code...
						$response = array(
							'respon' 	=> 0,
							'status' 	=> "agen",
							'id_user' 	=> $hasil->id_user,
							'nama' 		=> $hasil->nama,
							'alamat' 	=> $hasil->alamat,
							'no_telepon' => $hasil->no_telepon);
						// echo json_encode($response);
					}else if (password_verify($password, $hasil->password) && $hasil->status == "pelanggan biasa") {
						# code...
						$response = array(
							'respon' 	=> 0,
							'status' 	=> "pelanggan biasa",
							'id_user' 	=> $hasil->id_user,
							'nama' 		=> $hasil->nama,
							'alamat' 	=> $hasil->alamat,
							'no_telepon' => $hasil->no_telepon);
						// echo json_encode($response);
					}
				}
			}else{
				echo "string";
			}
			echo json_encode($response);

		}
	}
?>