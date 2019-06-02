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
			$data['pesanan'] = $this->Pesananmodel->tampilPesanan();
			$data['proses'] = $this->Pesananmodel->pesananproses();
			$data['kemas'] = $this->Pesananmodel->pesanankemas();
			$data['kirim'] = $this->Pesananmodel->pesanankirim();
			$data['terima'] = $this->Pesananmodel->pesananterima();
			$data['selesai'] = $this->Pesananmodel->pesananselesai();
			$data['batal'] = $this->Pesananmodel->pesananbatal();
			$this->load->view('_partial/header');
			$this->load->view('menu/pesanan', $data);
		}
		function detail_pesanan($no_pesanan)
		{
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/detail_pesanan', $data);
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
			redirect("admin/kasir/pesanan/detail_pesanan/$id_pesanan");
		}
		function get_barang()
		{
			$kode=$this->input->post('nama_barang');
			$qty=$this->input->post('qty');
			$data=$this->Kasirmodel->get_data_barang_bynama($kode,$qty);
			echo json_encode($data);
		}
		function load($id_pesanan)
		{
			$id_user = $this->Pesananmodel->load($id_pesanan);
			print_r( $id_user[0]['total']);
		}
	}
?>