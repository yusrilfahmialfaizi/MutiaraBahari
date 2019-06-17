<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Ongkirmodel extends CI_Model
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
		}
		function getOngkir()
		{
			return $this->db->get('ongkir')->result();
		}
		function tambah($data)
		{
			$this->db->insert('ongkir', $data);
		}
		function edit($id,$data)
		{
			$this->db->where('id_ongkir',$id);
			$this->db->update('ongkir', $data);
		}
		function hapus($id)
		{
			$this->db->where('id_ongkir', $id);
			$this->db->delete('ongkir');
		}
		function getOngkirWhere($cakupan_area)
		{
			// return $this->db->query("Select * from ongkir where cakupan_area = '$cakupan_area'")->result();
			return $this->db->get_where('ongkir', array('cakupan_area'=>$cakupan_area))->result();
			// $query = $this->db->get_where('ongkir', array('cakupan_area',$cakupan_area));
			// if ($query->num_rows() >0) {
			// 	# code...
			// 	foreach ($query->result() as $key) {
			// 		# code...
			// 		$data = array(
			// 			'id_ongkir'	=> $key->id_ongkir,
			// 			'cakupan_area'	=> $key->cakupan_area,
			// 			'ongkir'	=> $key->ongkir
			// 		);
			// 	}
			// 	return $data;
			// }
		}
	}
?>