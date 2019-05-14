<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Grosir extends CI_Controller
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
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$user['barang'] = $this->Kasirmodel->getBarang();
			$user['kode'] = $this->Kasirmodel->kode();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/kasirgrosir',$user);
			// $this->load->view('_partial/footertable');
		}
		// public function grosir()
		// {
		// 	if($this->session->userdata('status') != "login"){
		// 		redirect(base_url("admin"));
		// 	}
		// 	$user['barang'] = $this->Kasirmodel->getBarang();
		// 	$user['kode'] = $this->Kasirmodel->kode();
		// 	$user['user'] = $this->Usermodel->getUser();
		// 	$this->load->view('_partial/header');
		// 	$this->load->view('menu/kasirgrosir',$user);
		// 	// $this->load->view('_partial/footertable');
		// }
		function keranjang_kasir()
		{	
			$grosir = array(
		        'id'     => $this->input->post('id_barang'),
		        'qty'    => $this->input->post('qty'),
		        'price'   => $this->input->post('harga'),
		        'name'      => $this->input->post('nama_barang')
			);
			
			$this->cart->insert($grosir);	
			redirect('admin/kasir/grosir');
			echo $this->show_keranjang();
		}
		function show_keranjang()
		{
			$output='';
			foreach ($this->cart->contents() as $items) {
				# code...
				$output .='
		                <tr>
		                    <td>'.$items['id'].'</td>
		                    <td>'.$items['name'].'</td>
		                    <td>'.$items['qty'].'</td>
		                    <td>'.number_format($items['price']).'</td>
		                    <td>
			                    <div class="col-md-8">
		                			<div class="form-group">
		                				<input type="text" id="subtotal" name="subtotal" value="'.number_format($items['subtotal']).'" class="form-control" style="text-align:right;margin-bottom:5px;" readonly>
		                			</div>
		                		</div>
		                	</td>
		                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
		                </tr>
		            ';
			}
			$output .= '
	            <tr>
	            	<th colspan="3"></th>
	                <th>Total Rp.</th>
	                <th>
	                	<div class="col-md-8">
	                		<div class="form-group">
	                			<input type="text" name="total2" value="'.number_format($this->cart->total()).'" class="form-control" style="text-align:right;margin-bottom:5px;" readonly>
	                		</div>
	                	</div>
	                </th>
	            </tr>
	            <tr>
	            	<th colspan="3"></th>
	                <th>Bayar Rp.</th>
	                <th>
	                	<div class="col-md-8">
							<div class="form-group ">
	                			<input type="number" class="form-control" id="bayar" name="bayar">'.'
	                		</div>
	                	</div>
	                </th>
	            </tr>
	            <tr>
	            	<th colspan="3"></th>
	                <th>Kembali Rp.</th>
	                <th>
	                	<div class="col-md-8">
							<div class="form-group ">
	                			<input type="number" class="form-control" id="kembali" name="kembali">'.'
	                		</div>
	                	</div>
	                </th>
	            </tr>
	        ';
	        return $output;
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
			echo $this->show_keranjang();
		}
		function get_barang()
		{
			$kode=$this->input->post('nama_barang');
			$qty=$this->input->post('qty');
			$data=$this->Kasirmodel->get_data_barang_bynama($kode,$qty);
			echo json_encode($data);
		}
		function get_harga()
		{
			$qty=$this->input->post('qty');
			$kode=$this->input->post('nama_barang');
			$data=$this->Kasirmodel->get_dataharga($qty,$kode);
			echo json_encode($data);
		}
		// // // // // // // proses  // // // // // // // 
		function proses_jual()
		{
			// -------- No. Invoice-------------//
			$no_invoice = $this->input->post('no_invoice');
			$nama_pelanggan = $this->input->post('nama_pelanggan');
			$tanggal = $this->input->post('tanggal');
			$jtp = $this->input->post('jatuh_tempo');
			$total = $this->input->post('total2');
			$bayar = $this->input->post('bayar');
			$kembali = $this->input->post('kembali');
			$jenis_pembayaran = $this->input->post('jenis_pembayaran');
			if ($kembali >= 0) {
			 	# code...
			 	$status_pembayaran = 'Lunas';
			 }else{
			 	$status_pembayaran = 'Tidak Lunas';
			 }
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
            redirect('admin/kasir/grosir');
		}
	}
?>