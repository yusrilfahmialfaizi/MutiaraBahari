<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Pemesanan extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Barangmodel");
			$this->load->model("Kasirmodel");
			$this->load->model("Pesananmodel");
	 		$this->load->library("cart");
		}
		function index()
		{
			if($this->session->userdata('stat') != "login"){
					redirect(base_url("user/login"));
			}
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/pemesanan_agen');
		}
		function data()
		{
			if($this->session->userdata('stat') != "login"){
					redirect(base_url("user/login"));
			}
			// $data['pesanan'] = $this->Pesananmodel->tampilPesanan($status_pesanan);
			$data['pesanan'] = $this->Pesananmodel->usermenunggu();
			$data['proses'] = $this->Pesananmodel->userproses();
			$data['kemas'] = $this->Pesananmodel->userkemas();
			$data['kirim'] = $this->Pesananmodel->userkirim();
			$data['terima'] = $this->Pesananmodel->userterima();
			$data['selesai'] = $this->Pesananmodel->userselesai();
			$data['batal'] = $this->Pesananmodel->userbatal();
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/data_transaksi',$data);
		}
		function detail_pesanan($no_pesanan)
		{
			if($this->session->userdata('stat') != "login"){
					redirect(base_url("user/login"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/headeragen');
			$this->load->view('menu/user/data_pesanan_user',$data);
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
		function updatekeranjang()
		{
			$qty = $this->input->post('qty');
			$name = $this->input->post('name');
			$harga = $this->Kasirmodel->get_Barang($name);
			foreach ($harga as $key) {
				# code...
				if ($qty<= 750) {
					# code...
					$data = array(
						'rowid'=> $this->input->post('rowid'),
						'qty'=>$qty,
						'price' => $key->hrg_grosir1,
					);
					$code = $this->cart->update($data); 
					$pesan = "success";
					redirect('user/agen/pemesanan');

				}elseif ($qty>750 && $qty<1000 ) {
					# code...
					$data = array(
						'rowid'=> $this->input->post('rowid'),
						'qty'=>$qty,
						'price' => $key->hrg_grosir2,
					);
					$code = $this->cart->update($data); 
					redirect('user/agen/pemesanan');

				}else if ($qty >= 1000 ){
					$data = array(
						'rowid'=> $this->input->post('rowid'),
						'qty'=>$qty,
						'price' => $key->hrg_grosir3,
					);
					$code = $this->cart->update($data);
					redirect('user/agen/pemesanan');

				}else{
					
				redirect('user/agen/pemesanan');

				}
			}
		}
		function load()
		{
			// $this->cart->destroy();
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
		function proses_pesan()
		{
			//----------------pesanan------------//
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$id_pesanan = $this->Pesananmodel->id_pesanan();
			$id_user = $this->session->userdata("id_user");
			$tanggal = $tanggal;
			$total_harga = $this->input->post('total');
			$jenis_pengiriman = $this->input->post('jenis_pengiriman');
			$jenis_pembayaran = $this->input->post('jenis_pembayaran');
			$status_pesanan = 'Menunggu Konfirmasi';
			$pesanan = array(
				'id_pesanan'		=> $id_pesanan,
				'id_user' 			=> $id_user,
				'tanggal' 			=> $tanggal,
				'total_harga'		=> $total_harga,
				'jenis_pembayaran'	=> $jenis_pembayaran,
				'jenis_pengiriman'	=> $jenis_pengiriman,
				'status_pesanan'	=> $status_pesanan);
			$this->Pesananmodel->tambah_pesanan($pesanan);

			//---------------- detail pesanan ----------------//
			if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $detail_pesanan = array(
                        				// 'id_transaksi' =>$no_invoice,
                        	'id_pesanan'	=> $id_pesanan,
                            'id_barang' 	=> $item['id'],
                            'qty' 			=> $item['qty'],
                            'harga' 		=> $item['price'],
                            'subtotal' 		=>$item['subtotal']);
                        $this->Pesananmodel->tambah_detail_pesanan($detail_pesanan);
                    }
            }
            $this->cart->destroy();
            redirect('user/agen/dashboard');
		}
	}
?>