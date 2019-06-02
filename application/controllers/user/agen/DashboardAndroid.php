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
 			$data = $this->Merekandroid->merektampil();
 			return $data;
 		}
 		function getNamaBarang()
 		{
 			$data = $this->Barangmodel->getBarang();
 			echo json_encode($data);
 			print_r($data);
 		}
 	}
?>