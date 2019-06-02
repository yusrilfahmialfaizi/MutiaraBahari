<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Pesananmodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function tampilPesanan()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Menunggu Konfirmasi'))->result();
		}
		function pesananproses()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Diproses'))->result();
		}
		function pesanankemas()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Dikemas'))->result();
		}
		function pesanankirim()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Dikirim'))->result();
		}
		function pesananterima()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Diterima'))->result();
		}
		function pesananselesai()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Selesai'))->result();
		}
		function pesananbatal()
		{
			return $this->db->get_where('tampilPesanan', array('status_pesanan' => 'Dibatalkan'))->result();
		}
		function tambah_pesanan($pesanan)
		{
			$this->db->insert('pesanan',$pesanan);
		}
		function tambah_detail_pesanan($detail_pesanan)
		{
			$this->db->insert('detail_pesanan', $detail_pesanan);
		}
		function getDetail($no_pesanan)
		{
			$procedure = "CALL tampildetailpesanan(?)";
			$query = $this->db->query($procedure, $no_pesanan);
			return $query->result_array();
		}
		function editDetail($id_detail_pesan, $edit,$id_pesanan)
		{
			$this->db->where('id_detail_pesan', $id_detail_pesan);
			$this->db->update('detail_pesanan',$edit);
			$total = $this->db->query("SELECT SUM(subtotal) as total FROM detail_pesanan where id_pesanan = $id_pesanan")->result_array();
			$total_harga = array('total_harga' => $total[0]['total']);
			$this->db->where('id_pesanan', $id_pesanan);
			$this->db->update('pesanan',$total_harga);
		}
		function load($id_pesanan)
		{
			$total = $this->db->query("SELECT SUM(subtotal) as total FROM detail_pesanan where id_pesanan = $id_pesanan");
			return $total->result_array();
		}
		function id_pesanan()
		{
			$this->db->select('MAX(RIGHT(pesanan.id_pesanan,4)) AS id_pesanan', FALSE);
			$this->db->where('date(tanggal) = now()');
			$this->db->order_by('id_pesanan','Desc');
			$this->db->limit(1);
			$query = $this->db->get('pesanan');
			// $kode_merek = $this->db->query("select kode_merek from merek where merek = '". $kode ."'")->result_array();
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_pesanan) + 1;
			}else{
				$id = 1;
			}
			date_default_timezone_set('Asia/Jakarta');
			$tgl=date('Ymd');
			$batas = str_pad($id, 4,"0", STR_PAD_LEFT);
			$kodetampil = $tgl.$batas;  //format kode
			return $kodetampil; 
		}
	}
?>