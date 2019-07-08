<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
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
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
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
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/detail_pesanan', $data);
		}
		function Detail($no_pesanan)
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/user/data_pesanan', $data);
		}
		function Detailproses($no_pesanan)
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['detail_pesanan'] = $this->Pesananmodel->getDetail($no_pesanan);
			$this->load->view('_partial/header');
			$this->load->view('menu/user/data_pesananproses', $data);
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
		function prosesjual()
		{
			$id_pesanan = $this->input->post("id_pesanan");
			//Transaksi
			$no_invoice = $this->Kasirmodel->kode();
			date_default_timezone_set('Asia/Jakarta');
			$tgl=date('Y-m-d');
			$tanggal = $tgl;
			$jtp=date('Y-m-d');
			$tujuh_hari        = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
			$kembali        = date("Y-m-d", $tujuh_hari);
			$jtp = $kembali;
			$variable = $this->Pesananmodel->pesananproses();
			foreach ($variable as $key) :
				# code...
				$transaksi = array(
				'id_transaksi' => $no_invoice,
			 	'id_user' => $key->id_user,
			 	'id_pegawai' => $this->session->userdata("id_pegawai"),
			 	'tanggal' => $tanggal,
			 	'jatuh_tempo' => $jtp,
			 	'total_harga' => $key->total_harga,
			 	'bayar' => $key->total_harga,
			 	'kembalian' => "0",
			 	'jenis_pembayaran' => "Cash",
			 	'status_pembayaran' => "Lunas",
			 	'bukti_pembayaran' => '');
			endforeach;
			// print_r($detail_pesanan);
			$jual = $this->Kasirmodel->tambah($transaksi);
			$detail_pesanan = $this->Pesananmodel->getDetailPesanan($id_pesanan);
			foreach ($detail_pesanan as $a) {
				# code...
				$data = array(
					'id_transaksi' =>$no_invoice,
					'id_barang' => $a->id_barang,
					'qty' => $a->qty,
					'harga' => $a->harga,
					'subtotal' => $a->subtotal,
					 );
			}
			// endforeach;
			$proses = $this->Kasirmodel->tambah_detail_jual($data);
			redirect(base_url("admin/kasir/pesanan/"));
			// echo $id_pesanan."/".$no_invoice."/".$data['id_barang']." / ".$transaksi['total_harga'];
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
		function pesananAndroid()
		{
			$id_user = $this->input->post("id_user");
			$id_barang = $this->input->post("id_barang");
			$qty = $this->input->post("qty");
			$harga = $this->input->post("harga");
			print_r($id_user.$id_barang);
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d H:i:s');
			$id_pesanan = $this->Pesananmodel->id_pesanan();
			$id_user = $this->session->userdata("id_user");
			$tanggal = $tanggal;
			$jenis_pembayaran = "Cash";
			$jenis_pengiriman = "Ambil Sendiri";
			$status_pesanan = "Menunggu Konfirmasi";
			$pesanan = array(
				'id_pesanan'		=> $id_pesanan,
				'id_user' 			=> $id_user,
				'tanggal' 			=> $tanggal,
				'total_harga'		=> $harga,
				'jenis_pembayaran'	=> $jenis_pembayaran,
				'jenis_pengiriman'	=> $jenis_pengiriman,
				'status_pesanan'	=> $status_pesanan);
			$pesan = $this->Pesananmodel->tambah_pesanan($pesanan);

			$detail_pesanan = array(
                        				// 'id_transaksi' =>$no_invoice,
                        	'id_pesanan'	=> $id_pesanan,
                            'id_barang' 	=> $id_barang,
                            'qty' 			=> $qty,
                            'harga' 		=> $harga,
                            'subtotal' 		=> $harga);
             $detail = $this->Pesananmodel->tambah_detail_pesanan($detail_pesanan);
			$helo = array('username' => $email);
			$reg = $this->Usermodel->cek($helo);
			if ($pesan && $detail) {
			// if ($pesan) {
				# code...
				$response = array('status' => "1", 'pesan'=> "berhasil");
				echo json_encode($response);
			}else{
				$response = array('status' => "0", 'pesan'=> "gagal");
				echo json_encode($response);

				// $daftar = $this->Usermodel->register($data);
				// if (!$daftar) {
				// 	$this->response(['status' => 1, 'pesan'=> 'Registrasi gagal']);
				// 	# code...
				// }else{
				// 	$this->response(['status' => 2, 'pesan'=> 'Registrasi berhasil']);

				// }
			}
		}
	}
?>