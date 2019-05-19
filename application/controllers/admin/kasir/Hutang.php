<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Hutang extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model("Hutangmodel");
		$this->load->model("Usermodel");
	}

	function index()
	{
		if($this->session->userdata('status') != "login"){
					redirect(base_url("admin"));
		}
		$data['id'] = $this->Hutangmodel->id_hutang();
		$data['hutang'] = $this->Hutangmodel->get_hutang();
		$data['user'] = $this->Usermodel->getUser();
		$this->load->view('_partial/header');
		$this->load->view('menu/hutang', $data);
	}
	function tambah()
	{
		$this->Hutangmodel->tambah();	
	}
	function get_id()
	{
		$nama = $this->input->post('nama');
		$data = $this->Hutangmodel->getid($nama);
		echo json_encode($data);
	}
}
?>