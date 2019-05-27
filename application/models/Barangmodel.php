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
		public function getmerek()
		{
			return $this->db->get('merek')->result();
		}
		public function getDetailBarang()
		{
			$this->db->select("detail_barang.id_det_barang AS id, barang.nama_barang AS barang, pegawai.nama AS nama, detail_barang.tanggal AS tanggal, detail_barang.stok AS stok");
			$this->db->from("detail_barang, barang, pegawai");
			$this->db->where("detail_barang.id_barang = barang.id_barang AND detail_barang.id_pegawai = pegawai.id_pegawai");
			$query = $this->db->get();
			return $query->result();
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
			$this->id_barang = $post["id_barang"];
			$this->nama_barang = $post["nama_barang"];
			$this->harga = $post["harga"];
			$this->hrg_grosir1 = $post["grosir1"];
			$this->hrg_grosir2 = $post["grosir2"];
			$this->hrg_grosir3 = $post["grosir3"];
			$this->id_merek = $post["id_merek"];
			$this->gambar = $this->upload_gambar();

			$this->db->insert("barang", $this);
		}
		public function tambahMerek()
		{
			$post = $this->input->post();
			$this->id_merek = $post["id_merek"];
			$this->merek = $post["nama_merek"];
			$this->kode_merek = $post["kode"];
			$this->gambar = $this->upload_image();

			$this->db->insert("merek", $this);
		}
		function edit_barang(){
			$post = $this->input->post();
			// $this->id_barang->uniqid();
			$this->id_barang = $post["id_barang"];
			$this->nama_barang = $post["nama_barang"];
			$this->harga = $post["harga"];
			$this->hrg_grosir1 = $post["grosir1"];
			$this->hrg_grosir2 = $post["grosir2"];
			$this->hrg_grosir3 = $post["grosir3"];
			$this->jumlah_stok = $post["stok"];
			$this->id_merek = $post["id_merek"];
			if (!empty($_FILES['gambar']['tmp_name'])) {
				# code...
				$this->gambar = $this->upload_gambar();
			}else{
				$this->gambar = $post['gambar_lama'];
			}

			$this->db->update("barang", $this,array('id_barang'=>$post["id_barang"]));
			// $hasil=$this->db->query("UPDATE barang SET nama_barang='$nama_barang',jumlah_stok='$stok',harga='$harga',hrg_grosir1='$harga1',hrg_grosir2='$harga2',hrg_grosir3='$harga3' WHERE id_barang='$id_barang'");
			// return $hasil;
		}
		public function updateMerek()
		{
			$post = $this->input->post();
			$this->id_merek = $post["id_merek"];
			$this->merek = $post["nama_merek"];
			$this->kode_merek = $post["kode_merek"];
			if (!empty($_FILES['gambar']['tmp_name'])) {
				# code...
				$this->gambar = $this->upload_image();
			}else{
				$this->gambar = $post['old_image'];
			}
				$update = $this->db->update("merek",$this ,array('id_merek'=>$post["id_merek"]));
		}


		private function upload_image()
		{
		    $config['upload_path']          = APPPATH.'../upload/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['file_name']            = $this->id_merek;
		    $config['overwrite']			= true;
		    $config['max_size']             = 1024; // 1MB
		    // $config['max_width']            = 1024;
		    // $config['max_height']           = 768;

		    $this->load->library('upload', $config);

		    if ($this->upload->do_upload('gambar')) {
		        return $this->upload->data("file_name");
		    } else {
		    	return '';
		    }
		}
		private function upload_gambar()
		{
		    $config['upload_path']          = APPPATH.'../upload/barang/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['file_name']            = $this->id_barang;
		    $config['overwrite']			= true;
		    $config['max_size']             = 1024; // 1MB
		    // $config['max_width']            = 1024;
		    // $config['max_height']           = 768;

		    $this->load->library('upload', $config);

		    if ($this->upload->do_upload('gambar')) {
		        return $this->upload->data("file_name");
		    } else {
		    	return '';
		    }
		}
		function get_data_barang_bynama($kode)
		{
			$hsl=$this->db->query("SELECT * FROM merek WHERE merek='$kode'");
			if($hsl->num_rows()>0){
				foreach ($hsl->result() as $data) {
					$hasil=array(
						'id_merek' => $data->id_merek,
						'merek' => $data->merek,
						'kode_merek' => $data->kode_merek,
						);
				}
			}
			return $hasil;
		}
		public function id_barang($kode)
		{
			$this->db->select('MAX(RIGHT(barang.id_barang,4)) AS id_barang', FALSE);
			$this->db->where('id_merek = (SELECT id_merek from merek where merek = "'.$kode.'")');
			$this->db->order_by('id_barang','Desc');
			$this->db->limit(1);
			$query = $this->db->get('barang');
			$kode_merek = $this->db->query("select kode_merek from merek where merek = '". $kode ."'")->result_array();
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_barang) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 4,"0", STR_PAD_LEFT);
			$id_barang_tampil = $kode_merek[0]['kode_merek'].$batas;
			return $id_barang_tampil;
		}
		function id_merek()
		{
			$this->db->select('MAX(RIGHT(merek.id_merek,3)) AS id_merek', FALSE);
			$this->db->order_by('id_merek','Desc');
			$this->db->limit(1);
			$query = $this->db->get('merek');
			if ($query->num_rows() <> 0) {
				# code...
				$data = $query->row();
				$id = intVal($data->id_merek) + 1;
			}else{
				$id = 1;
			}
			$batas = str_pad($id, 3,"0", STR_PAD_LEFT);
			$id_barang_tampil ="A".$batas;
			return $id_barang_tampil;
		}
		public function edit($id,$data)
		{
			$this->db->where('id_barang', $id);
			$this->db->update('barang', $data);
			return true;
		}
		public function deleteBarang($id)
		{
			return $this->db->delete("barang", array("id_barang" => $id));
		}
		public function deleteMerek($id)
		{
			return $this->db->delete("merek", array("id_merek" => $id));
		}
		public function riwayat(){
			return $this->db->get('view_transaksi')->result();
		}
		
		function get_barangagen($id)
		{
			// return $this->db->get_where("barang",["id_merek"=>$id])->result();
			return $this->db->query("SELECT * From barang where id_merek = (SELECT id_merek from merek where merek = '$id')")->result();
		}
		function get_datagrosir($name,$qty)
		{
			$hsl=$this->db->query("SELECT * FROM barang WHERE nama_barang='$name'")->result();
			return $hsl;
			// if($hsl->num_rows()>0){
			// 	foreach ($hsl->result() as $data) {
			// 		if ($qty <= 750) {
			// 			# code...
			// 			$hasil=array(
			// 			'id_barang' => $data->id_barang,
			// 			'nama_barang' => $data->nama_barang,
			// 			'harga' => $data->hrg_grosir1,
			// 			'stok' =>$data->jumlah_stok
			// 			);
			// 		}elseif ($qty>750 && $qty<1000) {
			// 			# code...
			// 			$hasil=array(
			// 			'id_barang' => $data->id_barang,
			// 			'nama_barang' => $data->nama_barang,
			// 			'harga' => $data->hrg_grosir2,
			// 			'stok' =>$data->jumlah_stok
			// 			);
			// 		}else{
			// 			# code...
			// 			$hasil=array(
			// 			'id_barang' => $data->id_barang,
			// 			'nama_barang' => $data->nama_barang,
			// 			'harga' => $data->hrg_grosir3,
			// 			'stok' =>$data->jumlah_stok
			// 			);
			// 		}
			// 		// $hasil=array(
			// 		// 	'id_barang' => $data->id_barang,
			// 		// 	'nama_barang' => $data->nama_barang,
			// 		// 	'harga' => $data->harga,
			// 		// 	);
			// 	}
			// }
			// return $hasil;
		}
	}
?>