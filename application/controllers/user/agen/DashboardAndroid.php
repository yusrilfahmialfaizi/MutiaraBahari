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
 		}
 		function getMerek()
 		{
 			$data = $this->Merekandroid->merektampil();
 			return $data;
 		}
 	}
?>