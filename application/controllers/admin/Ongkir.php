<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Ongkir extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Ongkirmodel");
		}
		function index()
		{
			if($this->session->userdata('status') != "login" || $this->session->userdata("jabatan") != "Admin"){
				redirect(base_url("admin"));
			}
			$data['ongkir'] = $this->Ongkirmodel->getOngkir();
			$this->load->view("_partial/header");
			$this->load->view("menu/admin/ongkir",$data);
		}
		function tambah()
		{
			$cakupan  = $this->input->post("cakupan");
			$harga	  = $this->input->post("harga");
			$data = array(
				'cakupan_area'	=> $cakupan,
				'ongkir'		=> $harga);
			$this->Ongkirmodel->tambah($data);
			redirect(base_url('admin/ongkir'));
		}
		function edit()
		{
			$id 	  = $this->input->post("id");
			$cakupan  = $this->input->post("cakupan");
			$harga	  = $this->input->post("harga");
			$data = array(
				'cakupan_area'	=> $cakupan,
				'ongkir'		=> $harga);
			$this->Ongkirmodel->edit($id,$data);
			redirect(base_url('admin/ongkir'));
			// print_r($id);
			// print_r($data);
		}
		function hapus($id)
		{
			$this->Ongkirmodel->hapus($id);
			redirect(base_url('admin/ongkir'));
		}
	}
?>