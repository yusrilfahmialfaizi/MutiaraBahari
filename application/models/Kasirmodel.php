<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Kasirmodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();

		}
		public function getBarang()
		{
			return $this->db->get('barang')->result();
		}
		public function get_Barang($name)
		{
			return $this->db->get_where('barang',array('nama_barang' => $name))->result();
		}
		//////////////Grosir//////////////////////
		function get_data_barang_bynama($kode,$qty)
		{
			$hsl=$this->db->query("SELECT * FROM barang WHERE nama_barang='$kode'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					if ($qty <= 750) {
						# code...
						$hasil=array(
						'id_barang' => $data->id_barang,
						'nama_barang' => $data->nama_barang,
						'harga' => $data->hrg_grosir1,
						'stok' =>$data->jumlah_stok
						);
					}elseif ($qty>750 && $qty<1000) {
						# code...
						$hasil=array(
						'id_barang' => $data->id_barang,
						'nama_barang' => $data->nama_barang,
						'harga' => $data->hrg_grosir2,
						'stok' =>$data->jumlah_stok
						);
					}else{
						# code...
						$hasil=array(
						'id_barang' => $data->id_barang,
						'nama_barang' => $data->nama_barang,
						'harga' => $data->hrg_grosir3,
						'stok' =>$data->jumlah_stok
						);
					}
				}
			}
			return $hasil;
		}
		///////////Grosir////////////
		function get_dataharga($qty,$kode)
		{
			$hsl=$this->db->query("SELECT * FROM barang where nama_barang = '$kode'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					if ($qty <= 750) {
						# code...
						$hasil=array(
							'harga' => $data->hrg_grosir1,
							);
					}elseif ($qty>750 && $qty<1000) {
						# code...
						$hasil=array(
							'harga' => $data->hrg_grosir2,
							);
					}else{
						# code...
						$hasil=array(
							'harga' => $data->hrg_grosir3,
							);
					}
				}
			}
			return $hasil;
		}
		///////////Eceran/////////////
		function get_datahargaeceran($kode)
		{
			$hsl=$this->db->query("SELECT * FROM barang where nama_barang = '$kode'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					# code...
				$eceran=array(
					'id_barangeceran' => $data->id_barang,
					'hargaeceran' => $data->harga,
					'stok' =>$data->jumlah_stok
					);
				}
			return $eceran;
			}
		}
		public function kode()
		{
			date_default_timezone_set('Asia/Jakarta');
			$t = date('m');
			$this->db->select('MAX(RIGHT(transaksi.id_transaksi,5)) as id_transaksi', FALSE);
			$this->db->where("MONTH(tanggal) = MONTH(NOW())");
			$this->db->order_by('id_transaksi','DESC');    
			$this->db->limit(1);    
			$query = $this->db->get('transaksi');  //cek dulu apakah ada sudah ada kode di tabel.    
			if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->id_transaksi) + 1; 
		  	}
		  	else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  	}
		  	$id = $this->session->userdata('id_pegawai');
			$tgl=date('ym'); //1905 
			$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);     
			$kodetampil = "JL".$tgl."-".$id.$batas;  //format kode
			return $kodetampil;  
		}
		function tambah($transaksi)
		{
			$this->db->insert('transaksi', $transaksi);
		}
		function tambah_detail_jual($data_detail)
		{
		 	$this->db->insert('detail_transaksi', $data_detail);
		}
	}
?>