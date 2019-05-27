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
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$barang['kode'] = $this->Barangmodel->id_merek();
			$barang['merek'] = $this->Barangmodel->getmerek();
			$barang['barang'] = $this->Barangmodel->getBarang();
			$barang['detail_barang'] = $this->Barangmodel->getDetailBarang();
			$this->load->view('_partial/header');
			$this->load->view('menu/barang',$barang);
			// $this->load->view('_partial/footertable');
		}
		public function merek()
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$barang['kode'] = $this->Barangmodel->id_merek();
			$barang['merek'] = $this->Barangmodel->getmerek();
			$barang['barang'] = $this->Barangmodel->getBarang();
			$barang['detail_barang'] = $this->Barangmodel->getDetailBarang();
			$this->load->view('_partial/header');
			$this->load->view('menu/merek',$barang);	
		}
		public function add()
		{
			$product = $this->Barangmodel;
			$product->tambahBarang();
			redirect('admin/barang');
		}
		public function hoho(){
			echo(APPPATH.'../upload/');
		}
		public function addmerek()
		{
			$product = $this->Barangmodel;
			$product->tambahmerek();
			redirect('admin/barang/merek');
		}
		public function editModalMerek()
		{
			$product = $this->Barangmodel;
			$product->updateMerek();
			redirect('admin/barang/merek');
		}
		public function editModal()
		{
			$product = $this->Barangmodel;
			$product->edit_barang();
			// $id_barang=$this->input->post('id_barang');
			// $nama_barang=$this->input->post('nama_barang');
			// $stok=$this->input->post('stok');
			// $harga=$this->input->post('harga');
			// $harga1=$this->input->post('grosir1');
			// $harga2=$this->input->post('grosir2');
			// $harga3=$this->input->post('grosir3');
			// $this->Barangmodel->edit_barang($id_barang,$nama_barang,$stok,$harga,$harga1,$harga2,$harga3);
			redirect('admin/barang');
    
		}
		public function hapusBarang($id)
		{
			if ($this->Barangmodel->deleteBarang($id)) {
				# code...
				redirect(site_url("admin/barang"));
			}
		}
		public function hapusMerek($id)
		{
			if ($this->Barangmodel->deleteMerek($id)) {
				# code...
				redirect(site_url("admin/barang/merek"));
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
			// echo "<script>window.alert('$kode')</script>";
			$data = $this->Barangmodel->id_barang($kode);
			// return $data;
			echo json_encode($data);
			// print_r($data);
		// echo $data;
		}

		function haha(){
			echo $this->input->post('id_merek');
		}
		}
?>