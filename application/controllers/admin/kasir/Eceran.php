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
			if($this->session->userdata('status') != "login"){
				redirect(base_url("admin"));
			}
			$user['barang'] = $this->Kasirmodel->getBarang();
			$user['kode'] = $this->Kasirmodel->kode();
			$user['user'] = $this->Usermodel->getUser();
			$this->load->view('_partial/header');
			$this->load->view('menu/kasireceran',$user);
			// $this->load->view('_partial/footertable');
		}
		public function grosir()
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
		function tambah()
		{	
			$data = array(
		        'id'     => $this->input->post('id_barang'),
		        'qty'    => $this->input->post('qty'),
		        'price'   => $this->input->post('harga'),
		        'name'      => $this->input->post('nama_barang')
			);
			
			$this->cart->insert($data);	
			redirect('admin/kasir/eceran');
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
		                    <td>'.number_format($items['subtotal']).'</td>
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
		function get_barangeceran()
		{
			$kode=$this->input->post('nama_barang');
			// $qty=$this->input->post('qty');
			$data=$this->Kasirmodel->get_datahargaeceran($kode);
			echo json_encode($data);
		}
		// function get_hargaeceran()
		// {
		// 	// $qty=$this->input->post('qty');
		// 	$kode=$this->input->post('nama_barang');
		// 	$data=$this->Kasirmodel->get_datahargaeceran($kode);
		// 	echo json_encode($data);
		// }
	}
?>