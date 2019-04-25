<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		
		public function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('Usermodel');
			$this->load->model('Barangmodel');
			$this->load->library('form_validation');
			$this->load->helper('url');
		}
		public function index()
		{
			//load view index
			$this->load->view('_partial/header');
			$this->load->view('menu/dashboard');
			$this->load->view('_partial/footer');
		}
		public function dashboard()
		{
			$this->load->view('_partial/header');
			$this->load->view('menu/dashboard');
			$this->load->view('_partial/footer');
		}
		public function user()
		{
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/user', $user);
			$this->load->view('_partial/footertable');
		}
		public function barang()
		{
			$barang['kode'] = $this->Barangmodel->id_barang();
			$barang['barang'] = $this->Barangmodel->getBarang();
			$barang['detail_barang'] = $this->Barangmodel->getDetailBarang();
			$this->load->view('_partial/header');
			$this->load->view('menu/barang',$barang);
			// $this->load->view('_partial/footertable');
		}
		public function add()
		{
			$product = $this->Barangmodel;
			$product->tambahBarang();
			redirect('admin/barang');
		}
		public function riwayat_trans()
		{	
			$view_transaksi['view_transaksi'] = $this->Barangmodel->riwayat();
			$this->load->view('_partial/header');
			$this->load->view('menu/riwayat',$view_transaksi);
			$this->load->view('_partial/footertable');
		}
		public function editModal()
		{
			$id_barang=$this->input->post('id_barang');
			$nama_barang=$this->input->post('nama_barang');
			$stok=$this->input->post('stok');
			$harga=$this->input->post('harga');
			$this->Barangmodel->edit_barang($id_barang,$nama_barang,$stok,$harga);
			redirect('admin/barang');
    
		}
	}
?>