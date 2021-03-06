<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Eceran extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->library('cart');
			$this->load->model('Usermodel');
			$this->load->model('Barangmodel');
			$this->load->model('Kasirmodel');
		}
		public function index()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Owner"){
				redirect(base_url("admin"));
			}
			$user['barang'] = $this->Kasirmodel->getBarang();
			$user['kode'] = $this->Kasirmodel->kode();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/headerowner');
			$this->load->view('menu/owner/kasir/kasireceran',$user);
			// $this->load->view('_partial/footertable');
		}
		function tambah()
		{	
			$data = array(
		        'id'     => $this->input->post('id_barang'),
		        'qty'    => $this->input->post('qty'),
		        'price'   => $this->input->post('harga'),
		        'name'      => $this->input->post('nama_barang')
			);
			
			$this->cart->insert($data);	
			redirect('owner/kasir/eceran');
			// echo $this->show_keranjang();
		}
		function updatekeranjang()
		{
			$qty = $this->input->post('qty');
			// $name = $this->input->post('name');
			// $harga = $this->Kasirmodel->get_Barang($name);
			$data = array(
				'rowid'=> $this->input->post('rowid'),
				'qty'=>$qty
			);
			$code = $this->cart->update($data); 
			redirect('owner/kasir/eceran');
		}
		function load(){
			// $this->cart->destroy();
			$items = $this->cart->contents();
			// $item = $this->session->all_userdata();
			echo "<pre>";
			print_r($items);
			echo "</pre>";
			print_r($item);
		}
		function load_cart()
		{
			echo $this->show_keranjang();
			// echo "string";
		}
		function hapus_keranjang()
		{
			$data = array(
				'rowid' => $this->input->post('row_id'),
				'qty'	=>0,
			);
			$this->cart->update($data);
			// echo $this->show_keranjang();
		}
		function get_barangeceran()
		{
			$kode=$this->input->post('nama_barang');
			// $qty=$this->input->post('qty');
			$data=$this->Kasirmodel->get_datahargaeceran($kode);
			echo json_encode($data);
		}
		function proses_jual()
		{
			date_default_timezone_set('Asia/Jakarta');
			
			// -------- No. Invoice-------------//
			$no_invoice = $this->input->post('no_invoice');
			$nama = $this->input->post('nama_pelanggan');
			$id_user = $this->Usermodel->getPelanggan($nama);
			$id_admin = $this->session->userdata("id_admin");
			$id_pegawai =  $id_admin;
			$tgl=date('Y-m-d');
			$tanggal = $tgl;
			$jtp=date('Y-m-d');
			$tujuh_hari        = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
			$kembali        = date("Y-m-d", $tujuh_hari);
			$jtp = $kembali;
			$total = $this->input->post('total');
			$bayar = $this->input->post('bayar');
			$kembali = $this->input->post('kembali');
			$jenis_pembayaran = $this->input->post('jenis_pembayaran');
			if ($kembali >= 0) {
			 	# code...
			 	$status_pembayaran = 'Lunas';
			 }else{
			 	$status_pembayaran = 'Tidak Lunas';
			 }
			 $transaksi = array(
			 	'id_transaksi' => $no_invoice,
			 	'id_user' => $id_user['id_user'],
			 	'id_pegawai' => $id_pegawai,
			 	'tanggal' => $tanggal,
			 	'jatuh_tempo' => $jtp,
			 	'total_harga' => $total,
			 	'bayar' => $bayar,
			 	'kembalian' => $kembali,
			 	'jenis_pembayaran' => $jenis_pembayaran,
			 	'status_pembayaran' => $status_pembayaran,
			 	'bukti_pembayaran' => '');
			 $jual = $this->Kasirmodel->tambah($transaksi);
			// ---------------data jual---------------//
			$subtotal = $this->input->post('subtotal');
			if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array('id_transaksi' =>$no_invoice,
                                        'id_barang' => $item['id'],
                                        'qty' => $item['qty'],
                                        'harga' => $item['price'],
                                        'subtotal' =>$subtotal);
                        $proses = $this->Kasirmodel->tambah_detail_jual($data_detail);
                    }
            }
            $this->cart->destroy();
            redirect('owner/kasir/eceran');
		}
	}
?>