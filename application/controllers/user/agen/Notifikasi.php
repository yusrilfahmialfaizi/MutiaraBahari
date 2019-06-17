<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Notifikasi extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model("Notifikasimodel");
		}
		function jumlah_notif()
		{
			$data = $this->Notifikasimodel->jumlah();
			// print_r($data["jumlah"]);
			foreach ($data as $key) {
				# code...
				echo json_encode($key->jumlah);
			}
			// echo json_encode($data);
		}
	}
?>