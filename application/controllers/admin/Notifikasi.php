<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Notifikasi extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Notifikasimodel");
			$this->load->model("Usermodel");
		}

		function index()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/admin/notifikasi',$data);
		}
		function tambahNotif()
		{
			date_default_timezone_set('Asia/Jakarta');
			$tanggal 	= date('Y-m-d H:i:s');
			$id_user 	= $this->input->post('subject');
			$judul 		= $this->input->post('judul');
			$isi 		= $this->input->post("notif");
			$status 	= "Belum dibaca";
			$data 		= array(
				'id_pegawai'	=> $this->session->userdata('id_pegawai'),
				'id_user' 		=> $id_user,
				'judul' 			=> $judul,
				'isi' 			=> $isi,
				'waktu'			=> $tanggal,
				'status'		=> $status);
			$this->Notifikasimodel->tambah($data);
			redirect(base_url("admin/notifikasi"));
		}
		function getPelanggan()
		{
			$nama = $this->input->post("nama");
			$data = $this->Usermodel->getPelanggan($nama);
			echo json_encode($data);
		}
	}
?>