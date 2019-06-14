<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Barang extends CI_Controller
	{
		
		function __construct()
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
			if($this->session->userdata('jabatan') != "Kasir" || $this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$barang['kode'] = $this->Barangmodel->id_merek();
			$barang['merek'] = $this->Barangmodel->getmerek();
			$barang['barang'] = $this->Barangmodel->getBarang();
			$barang['detail_barang'] = $this->Barangmodel->getDetailBarang();
			$this->load->view('_partial/headerkasir');
			$this->load->view('menu/kasir/barang',$barang);
			// $this->load->view('_partial/footertable');
		}
		public function merek()
		{
			if($this->session->userdata('jabatan') != "Kasir" || $this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$barang['kode'] = $this->Barangmodel->id_merek();
			$barang['merek'] = $this->Barangmodel->getmerek();
			$barang['barang'] = $this->Barangmodel->getBarang();
			$barang['detail_barang'] = $this->Barangmodel->getDetailBarang();
			$this->load->view('_partial/headerkasir');
			$this->load->view('menu/kasir/merek',$barang);	
		}
		public function add()
		{
			$product = $this->Barangmodel;
			$product->tambahBarang();
			redirect('kasir/barang');
		}
		public function hoho(){
			echo(APPPATH.'../upload/');
		}
		public function addmerek()
		{
			$product = $this->Barangmodel;
			$product->tambahmerek();
			redirect('kasir/barang/merek');
		}
		public function editModalMerek()
		{
			$product = $this->Barangmodel;
			$product->updateMerek();
			redirect('kasir/barang/merek');
		}
		public function editModal()
		{
			$product = $this->Barangmodel;
			$product->edit_barang();
			redirect('kasir/barang');
    
		}
		public function hapusBarang($id)
		{
			if ($this->Barangmodel->deleteBarang($id)) {
				# code...
				redirect(site_url("kasir/barang"));
			}
		}
		public function hapusMerek($id)
		{
			if ($this->Barangmodel->deleteMerek($id)) {
				# code...
				redirect(site_url("kasir/barang/merek"));
			}
		}
		function load()
		{
			$this->load->view('menu/untiled');
		}
		function buatkode()
		{
			// $id_merek = $this->input->post('ab');
			$kode = $this->input->post('merek');
			$data = $this->Barangmodel->get_data_barang_bynama($kode);
			echo json_encode($data);
			// echo "<script>window.alert('$data')</script>";
		}
		function get_merek()
		{
			$kode=$this->input->post('merek');
			$data = $this->Barangmodel->id_barang($kode);
			echo json_encode($data);
		}
		function get_barang()
		{
			$kode=$this->input->post('nama_barang');
			$data = $this->Barangmodel->get_barang($kode);
			echo json_encode($data);
		}
		function tambahdetail(){
			$id_barang =  $this->input->post('id_barang');
			$id_pegawai =  $this->input->post('id_pegawai');
			$tanggal = date('Y-m-d');
			$stok = $this->input->post('stk');
			$keterangan = 'Tambah';
			$data = array(
				'id_barang' => $id_barang,
				'id_pegawai' => $id_pegawai,
				'tanggal' => $tanggal,
				'stok' => $stok,
				'keterangan' => $keterangan);
			if ($this->Barangmodel->tambahdetail($data)) {
			 	# code...
				redirect('kasir/barang');
			 } 
		}
	}
?>