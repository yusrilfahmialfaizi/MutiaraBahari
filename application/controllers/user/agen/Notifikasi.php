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
		function getnotif()
		{
			$datas = $this->Notifikasimodel->getnotif();
			foreach ($datas as $key) {
			// 	# code...
				$data = '';
				$data = 
					'<div class="notif-center">
							<a href="">
								<div class="col-md-12">
									<div class="form-group">
										<div class="notif-content">
											<span><strong class="block">'.$key->judul.'</strong></span>
											<span class="time">'.$key->isi.'</span>
										</div>
									</div>
								</div>
							</a>
						</div>';
				// $data = array('judul' => $key->judul );
				// echo json_encode($data);
						echo $data;
			}
				// echo json_encode($data);
		}
		function jumlah_notif()
		{
			$data = $this->Notifikasimodel->jumlah();
			foreach ($data as $key) {
				# code...
				echo json_encode($key->jumlah);
			}
		}
	}
?>