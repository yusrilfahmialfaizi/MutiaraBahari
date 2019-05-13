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
						);
					}elseif ($qty>750 && $qty<1000) {
						# code...
						$hasil=array(
						'id_barang' => $data->id_barang,
						'nama_barang' => $data->nama_barang,
						'harga' => $data->hrg_grosir2,
						);
					}else{
						# code...
						$hasil=array(
						'id_barang' => $data->id_barang,
						'nama_barang' => $data->nama_barang,
						'harga' => $data->hrg_grosir3,
						);
					}
					// $hasil=array(
					// 	'id_barang' => $data->id_barang,
					// 	'nama_barang' => $data->nama_barang,
					// 	'harga' => $data->harga,
					// 	);
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
					);
				}
			return $eceran;
			}
		}
		public function kode()
		{
		  $this->db->select('RIGHT(transaksi.id_transaksi,5) as id_transaksi', FALSE);
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
			  $tgl=date('ym'); 
			  $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
			  $kodetampil = "JL".$tgl."-04".$batas;  //format kode
			  return $kodetampil;  
		 }
	}
?>