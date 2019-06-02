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
									<a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#konfirmasi" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Menunggu Konfirmasi</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#proses" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Diproses</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#kemas" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dikemas</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#kirim" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dikirim</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#terima" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Diterima</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#selesai" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Selesai</a>
								</li>
								<li class="nav-item submenu">
									<a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#batal" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Dibatalkan</a>
								</li>
							</ul>
							<div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
								<div class="tab-pane fade active show" id="konfirmasi" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
									<div class="row">
										<?php foreach ($pesanan as $key): ?>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
															
														</div>
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-success btn-round btn-sm  mr-auto">Konfirmasi</a>
														</div>
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-danger btn-round btn-sm  mr-auto">Batalkan</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-success btn-round btn-sm  mr-auto">Konfirmasi</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
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
															<th>: <?php echo $key->total_harga?></th>
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
														<div class="col-md-4">
															<a href="<?php echo base_url()?>admin/kasir/pesanan/detail_pesanan" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
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
					
					<!-- 	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Pesanan</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>Status</th>
													<th>Tanggal</th>
													<th>Total Harga</th>
													<th>Jenis Pembayaran</th>
													<th>Status Pesanan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>Status</th>
													<th>Tanggal</th>
													<th>Total Harga</th>
													<th>Jenis Pembayaran</th>
													<th>Status Pesanan</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													foreach ($pesanan as $key) {
												?>
												<tr>
													<td><?php echo $key->id_pesanan ?></td>
													<td><?php echo $key->nama ?></td>
													<td><?php echo $key->alamat ?></td>
													<td><?php echo $key->status ?></td>
													<td><?php echo $key->tanggal ?></td>
													<td><?php echo number_format($key->total_harga) ?></td>
													<td><?php echo $key->jenis_pembayaran ?></td>
													<td><?php echo $key->status_pesanan ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#ModalEdit<?php echo $key->id_pesanan ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i> Data
															<a href="<?php echo base_url("admin/user/hapusagen/".$key->id_pesanan) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div> -->
							<?php foreach ($pesanan as $i): ?>	
									<!-- Modal -->
									<div class="modal fade" id="ModalEdit<?php echo $i->id_pesanan ?>"role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Agen
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url('admin/user/editAgen') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="largeInput">ID Pesanan</label>
																	<input type="text" class="form-control form-control" id="id_user" name="id_user" value="<?php echo $i->id_pesanan ?>" readonly>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label for="largeInput">Nama Agen</label>
																	<input type="text" class="form-control form-control" id="nama_agen" name="nama_agen" value="<?php echo $i->nama ?>">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">Alamat</label>
																	<textarea type="text" class="form-control form-control" id="alamat" name="alamat"><?php echo $i->alamat ?></textarea>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Tanggal</label>
																	<input type="text" class="form-control form-control" id="no_telepon" name="no_telepon" min="0" value="<?php echo $i->tanggal ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Total Harga</label>
																	<input type="text" class="form-control form-control" id="username" name="username" value="<?php echo $i->total_harga ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Jenis Pembayaran</label>
																	<input type="text" class="form-control form-control" id="password" name="password" value="<?php echo $i->jenis_pembayaran ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Status Pesanan</label>
																	<input type="text" class="form-control form-control" id="password" name="password" value="<?php echo $i->status_pesanan ?>">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button class="btn btn-primary" id="update">Update</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach ?>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
		</body>
		</html>
