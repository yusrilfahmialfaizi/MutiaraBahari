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
		function index()
		{
			if($this->session->userdata('stat') != "login" || $this->session->userdata("status") != "pelanggan biasa"){
				redirect(base_url("user/login"));
			}
			$data['notif'] = $this->Notifikasimodel->getnotifall();
			$this->Notifikasimodel->update();
			$this->load->view('_partial/headerbiasa');
			$this->load->view('menu/user/notifikasibiasa',$data);
		}
		function getnotif()
		{
			$datas = $this->Notifikasimodel->getnotif();

			foreach ($datas as $key) {
			// 	# code...
				$data = '';
				$data = 
					'
							<a href="">
								<div class="col-md-12">
									<div class="form-group" id="form-group">
										<div class="notif-content" id="notif-content">
											<span><strong class="block" id="judul">Admin telah menambahkan "'.$key->judul.'"</strong></span>
											<span class="time" id="isi">'.$key->waktu.'</span>
										</div>
									</div>
								</div>
							</a>';
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