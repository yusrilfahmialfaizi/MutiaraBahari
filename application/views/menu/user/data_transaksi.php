	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Pesanan</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
					<div class="card">
						<div class="card-body">
							<ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
								<li class="nav-item submenu">
									<a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#konfirmasi" data-id="Menunggu Konfirmasi" data-user="<?php echo $this->session->userdata("id_user") ?>" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Menunggu Konfirmasi</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#proses" data-id="Diproses" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Diproses</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#kemas" data-id="Dikemas" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dikemas</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#kirim" data-id="Dikirim" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dikirim</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#terima" data-id="Diterima" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Diterima</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#selesai" data-id="Selesai" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Selesai</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#batal" data-id="Dibatalkan" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dibatalkan</a>
								</li>
							</ul>
							<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
								<div class="tab-pane fade active show" id="konfirmasi" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
									<div class="row">
										<?php foreach ($pesanan as $key): ?>
										<div class="col-md-4" id="menunggu">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="proses" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
									<div class="row">
										<?php foreach ($proses as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="kemas" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
									<div class="row">
										<?php foreach ($kemas as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="kirim" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
									<div class="row">
										<?php foreach ($kirim as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="terima" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
									<div class="row">
										<?php foreach ($terima as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
									<div class="row">
										<?php foreach ($selesai as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
									<div class="row">
										<?php foreach ($batal as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4 ml-auto mr-auto">
															<div class="form-group">
																<a href="<?php echo base_url()?>user/agen/pemesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-danger btn-round btn-md">Lihat Barang</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $this->load->view('_partial/foot.php') ?>
	</div>
	<?php $this->load->view('_partial/scripttableagen') ?>
	<!--  -->
</body>
</html>
