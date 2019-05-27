<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	  * 
	  */
	 class Dashboard extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		# code...
	 		parent::__construct();
	 		$this->load->model("Barangmodel");
	 		$this->load->library("cart");
	 	}
	 	public function index()
 		{
 			if($this->session->userdata('stat') != "login"){
				redirect(base_url("user/login"));
			}
 			$data['merek'] = $this->Barangmodel->getMerek();
			$data['barang'] = $this->Barangmodel->getBarang();
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/frontdashboard',$data);
			$this->load->view('_partial/footer');
		}
		function produk()
		{
			if($this->session->userdata('stat') != "login"){
				redirect(base_url("user/login"));
			}

			if(!$this->uri->segment(5)){
					$data['barang'] = $this->Barangmodel->getBarang();
			} else {
				$data['barang'] = $this->Barangmodel->get_barangagen($this->uri->segment(5));

			}
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/produk',$data);
			// $this->load->view('_partial/footer');
		}
		function tambahkeranjang()
		{
			$id = $this->input->post('id_barang');
			$name = $this->input->post('nama_barang');
			$qty = $this->input->post('qty');
			$data  = $this->Barangmodel->get_datagrosir($name,$qty);
			foreach ($data as $key) {
					# code...
				if ($qty <= 750) {
					# code...
					$price = $key->hrg_grosir1;
				}elseif ($qty>750 && $qty<1000) {
					# code...
					$price = $key->hrg_grosir2;
				}else{
					$price = $key->hrg_grosir3;
				}
			}
			$keranjang = array(
				'id' => $id,
				'name' => $name,
				'qty' => $qty,
				'price'=> $price);
			$this->cart->insert($keranjang);
			redirect("user/agen/pemesanan");
		}
		function load()
		{
			$this->cart->destroy();
			$items = $this->cart->contents();
			// $item = $this->session->all_userdata();
			echo "<pre>";
			print_r($items);
			echo "</pre>";
			print_r($item);
		}
		function harga_produk()
		{
			$qty = $this->input->post('qty');
			$kode = $this->input->post('nama_barang');
			$data  = $this->Barangmodel->get_datagrosir($kode,$qty);
			echo json_encode($data);
		}
	 } 
 ?>