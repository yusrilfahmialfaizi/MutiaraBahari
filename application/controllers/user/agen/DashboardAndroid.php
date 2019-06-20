<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 	/**
 	 * 
 	 */
 	class DashboardAndroid extends CI_Controller
 	{
 		
 		function __construct()
 		{
 			# code...
 			parent::__construct();
 			$this->load->model("Merekandroid");
 			$this->load->model("Barangmodel");
 		}
 		function getMerek()
 		{
 			$data = $this->Barangmodel->getMerek();
 			echo json_encode(array('data' => $data));
 			// print_r($data);
 		}
 		function getNamaBarang()
 		{
 			$id = $this->input->post('id_merek');
 			$data = $this->Barangmodel->getIdbarang($id);
 			echo json_encode(array('data' => $data));
 			// print_r($data);
 		}
 	}
?>