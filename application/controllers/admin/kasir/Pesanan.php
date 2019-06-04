<?php
	
	/**
	 * 	
	 */
	class Pesanan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Pesananmodel");
			$this->load->model("Kasirmodel");
			$this->load->model("Usermodel");
		}
		function index()
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$data['pesanan']	= $this->Pesananmodel->pesananmenunggu();
			$data['proses']		= $this->Pesananmodel->pesananproses();
			$data['kemas'] 		= $this->Pesananmodel->pesanankemas();
			$data['kirim'] 		= $this->Pesananmodel->pesanankirim();
			$data['terima'] 	= $this->Pesananmodel->pesananterima();
			$data['selesai']	= $this->Pesananmodel->pesananselesai();
			$data['batal'] 		= $this->Pesananmodel->pesananbatal();
			$this->load->view('_partial/header');
			$this->load->view('menu/pesanan', $data);
		}
		function Pesanan($no_pesanan)
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/detail_pesanan', $data);
		}
		function Detail($no_pesanan)
		{
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/user/data_pesanan', $data);
		}
		function editdetail()
		{
			$id_detail_pesan = $this->input->post('id_detail_pesanan');
			$id_pesanan = $this->input->post('id_pesanan');
			$qty = $this->input->post('qty');
			$harga = $this->input->post('harga');
			$subtotal = $this->input->post('subtotal');
			$edit = array(
				'qty' 		=> $qty,
				'harga' 	=> $harga,
				'subtotal'	=> $subtotal);
			$data = $this->Pesananmodel->editDetail($id_detail_pesan, $edit, $id_pesanan);
			redirect("admin/kasir/pesanan/Pesanan/$id_pesanan");
		}
		function get_barang()
		{
			$kode=$this->input->post('nama_barang');
			$qty=$this->input->post('qty');
			$data=$this->Kasirmodel->get_data_barang_bynama($kode,$qty);
			echo json_encode($data);
		}
		function load()
		{
			$id = $this->Pesananmodel->pesanankemas();
			$id_user = $this->Pesananmodel->pesanankirim();
			print_r($id);
			print_r("  ");
			print_r($id_user);
		}
		function konfirmasi()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->konfirmasi($id);
			redirect("admin/kasir/pesanan/");
		}
		function proses()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->proses($id);
			redirect("admin/kasir/pesanan/");
		}
		function kemas()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->kemas($id);
			redirect("admin/kasir/pesanan/");
		}
		function kirim()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->kirim($id);
			redirect("admin/kasir/pesanan/");
		}
		function terima()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->terima($id);
			redirect("admin/kasir/pesanan/");
		}
		function batalkan()
		{
			$id = $this->input->post('id_pesanan');
			$this->Pesananmodel->batalkan($id);
			redirect("admin/kasir/pesanan/");
		}
		function hapusdetail()
		{
			$id = $this->input->post('id_detail_pesan');
			$id_pesanan = $this->input->post('id_pesanan');
			// print_r($id_pesanan);
			$this->Pesananmodel->hapusDetail($id,$id_pesanan);
			// echo "<script>window.loacation(-1)</script>";
		}
	}
?>