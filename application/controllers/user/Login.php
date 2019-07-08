<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Usermodel");
		}
		function index()
		{
			$this->load->view('login_user/header');
			$this->load->view('login_user/body');
			$this->load->view('login_user/footer');
		}
		function register()
		{
			$this->load->view('login_user/header');
			$this->load->view('login_user/Register');
			$this->load->view('login_user/footer');
		}
		function lupapass()
		{
			$this->load->view('login_user/header');
			$this->load->view('login_user/lupapass');
			$this->load->view('login_user/footer');
		}
		function terkirim()
		{
			$this->load->view('login_user/header');
			$this->load->view('login_user/emailterkirim');
			$this->load->view('login_user/footer');
		}
		function newpass($id)
		{
			$data['id'] = $id;
			$this->load->view('login_user/header');
			$this->load->view('login_user/newpass',$data);
			$this->load->view('login_user/footer');
		}
		function updatepass()
		{
			$id_user = $this->input->post("id_user");
			$password = $this->input->post("password");

			$this->Usermodel->updatepass($id_user,$password);
			redirect('user/login');
		}
		function sendEmail()
		{
			$email = $this->input->post("username");
			$config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'mutiarabahari412@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'mutiara123',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

	        // Load library email dan konfigurasinya
	        $this->load->library('email', $config);

	        // Email dan nama pengirim
	        $this->email->from('no-reply@mutiarabahari.com', 'Mutiara Bahari');

	        // Email penerima
	        $this->email->to($email); // Ganti dengan email tujuan kamu

	        // Lampiran email, isi dengan url/path file
	        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

	        // Subject email
	        $this->email->subject('Link untuk memperbarui password');
	        $data = $this->Usermodel->getget($email);
	        foreach ($data as $key) {
	    		$id =  $key->id_user;
	    		# code...
	        // Isi email
	        $this->email->message("Klik '<a href='http://localhost/mutiarabahari/user/login/newpass/$id'>Disini</a> untuk reset password");
	    	}

	        // Tampilkan pesan sukses atau error
	        if ($this->email->send()) {
	            // echo 'Sukses! email berhasil dikirim.';
	            redirect("user/login/terkirim");
	        } else {
	            echo 'Error! email tidak dapat dikirim.';
	        }
		}
		function daftar()
		{
			$id_user = $this->Usermodel->id_user();
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$data = array(
				'id_user' => $id_user,
				'nama' => $nama,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'username' => $email,
				'password' => $password,
				'status' => 'pelanggan biasa'
			);
			$this->Usermodel->register($data);
			redirect('user/login');
		}
		function daftarandroid()
		{
			$id_user = $this->Usermodel->id_user();
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$no_telepon = $this->input->post('no_telepon');
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			$password = password_hash($pass, PASSWORD_DEFAULT);
			$data = array(
				'id_user' => $id_user,
				'nama' => $nama,
				'alamat' => $alamat,
				'no_telepon' => $no_telepon,
				'username' => $email,
				'password' => $password,
				'status' => 'pelanggan biasa'
			);
			$helo = array('username' => $email);
			$reg = $this->Usermodel->cek($helo);
			if (sizeof($reg)>0) {
				# code...
				$this->response(['status' => 0, 'pesan'=> 'Email sudah pernah dipakai']);
			}else{
				$daftar = $this->Usermodel->register($data);
				if (!$daftar) {
					$this->response(['status' => 1, 'pesan'=> 'Registrasi gagal']);
					# code...
				}else{
					$this->response(['status' => 2, 'pesan'=> 'Registrasi berhasil']);

				}
			}
		}
		function aksilogin()
		{
			$username = $this->input->post("username");
			$pass = $this->input->post("password");
			$where = array(
					'username' => $username);
			$cek = $this->Usermodel->cek_login("user",$where)->num_rows();
			if ($cek > 0) {
				# code...
				$data = $this->Usermodel->cek_data("user", $where);
				foreach ($data->result() as $key) {
					if (password_verify($pass, $key->password) && $key->status == 'agen') {
						# code...
						$data_session = array(
							'id_user' => $key->id_user,
							'nama' => $key->nama,
							'alamat' => $key->alamat,
							'no_telepon' => $key->no_telepon,
							'username' => $key->username,
							'status' => $key->status,
							'stat' => "login"
						);
						$this->session->set_userdata($data_session);

						redirect(base_url("user/agen/dashboard"));
					}else if (password_verify($pass, $key->password) && $key->status == 'pelanggan biasa') {
						$data_session = array(
							'id_user' => $key->id_user,
							'nama' => $key->nama,
							'alamat' => $key->alamat,
							'no_telepon' => $key->no_telepon,
							'username' => $key->username,
							'status' => $key->status,
							'stat' => "login"
						);
						$this->session->set_userdata($data_session);
						redirect(base_url("user/pelanggan/dashboard"));
					}else{
						redirect('user/login');
					}
				}
			}else{
				redirect('user/login');
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
?>