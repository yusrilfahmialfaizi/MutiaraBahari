<?php 
	defined('BASEPATH')OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Barangmodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		public function rules()
		{
			return[
				['field'=>'id_barang',
				'label'=>'id_barang',
				'rules'=>'required'],
				['field'=>'nama_barang',
				'label'=>'nama_barang',
				'rules'=>'required'],
				['field'=>'harga',
				'label'=>'harga',
				'rules'=>'required']
			];
		}
		// barang 
		public function getBarang()
		{
			return $this->db->get('barang')->result();
		}
		public function getDetailBarang()
		{
			$this->db->select("detail_barang.id_det_barang, barang.nama_barang, pegawai.nama, detail_barang.tanggal, detail_barang.stok");
			$this->db->from("detail_barang, barang, pegawai");
			$this->db->where("detail_barang.id_barang = barang.id_barang AND detail_barang.id_pegawai = pegawai.id_pegawai");
			$query = $this->db->get()->result();
		}
		public function getId($id)
		{
			return $this->db->get_where('barang',["id_barang"=>$id]->row());
		}
		// tambah barang
		public function tambahBarang()
		{
			$post = $this->input->post();
			// $this->id_barang->uniqid();
			$this->id_barang = $post["kode_barang"];
			$this->nama_barang = $post["nama_barang"];
			$this->harga = $post["harga"];
			$this->stok = $post["stok"];

			$this->db->insert("barang", $this);
		}
		public function id_barang()
		{
			$this->db->select('RIGHT(barang.id_barang,4) AS id_barang', FALSE);
			$this->db->order_by('id_barang','Desc');
			$this->db->limit(1);
			$query = $this->db->get('barang');
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_barang) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 4,"0", STR_PAD_LEFT);
			$id_barang_tampil = "A".$batas;
			return $id_barang_tampil;
		}
		public function edit($id,$data)
		{
			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);
			return true;

		}
		public function riwayat(){
			return $this->db->get('transaksi')->result();
		}
		function edit_barang($id_barang,$nama_barang,$stok,$harga){
		$hasil=$this->db->query("UPDATE barang SET nama_barang='$nama_barang',stok='$stok',harga='$harga' WHERE id_barang='$id_barang'");
		return $hsl;
	}

	}
?>