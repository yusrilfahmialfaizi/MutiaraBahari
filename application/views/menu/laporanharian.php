	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Laporan Harian</h4>
					<?php $this->load->view('_partial/breadcrumbs') ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-md-4 ml-auto">
										<div class="form-group">
											<form method="post" action="<?php echo base_url("owner/laporan/laporanharian")?>">
												<div class="input-group">
													<input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
													<div class="input-group-prepend">
														<button type="submit" class="btn btn-primary btn-md">
															<i class="fas fa-filter"></i>
															Filter
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="basic-datatables" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>ID Transaksi</th>
												<th>Nama</th>
												<th>Status</th>
												<th>Pegawai</th>
												<th>Jabatan</th>
												<th>Tanggal</th>
												<th>JTH</th>
												<th>Total Harga</th>
												<th>Jenis Pembayaran</th>
												<th>Status Pembayaran</th>
												<th>No. Rekening</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>ID Transaksi</th>
												<th>Nama</th>
												<th>Status</th>
												<th>Pegawai</th>
												<th>Jabatan</th>
												<th>Tanggal</th>
												<th>JTH</th>
												<th>Total Harga</th>
												<th>Jenis Pembayaran</th>
												<th>Status Pembayaran</th>
												<th>No. Rekening</th>
											</tr>
										</tfoot>
										<tbody>
											<?php foreach ($all as $key): ?>
												
											<tr>
												<td><?php echo $key->id_transaksi ?></td>
												<td><?php echo $key->nama_pelanggan ?></td>
												<td><?php echo $key->status ?></td>
												<td><?php echo $key->nama_pegawai ?></td>
												<td><?php echo $key->jabatan ?></td>
												<td><?php echo $key->tanggal ?></td>
												<td><?php echo $key->jatuh_tempo ?></td>
												<td><?php echo number_format($key->total_harga) ?></td>
												<td><?php echo $key->jenis_pembayaran ?></td>
												<td><?php echo $key->status_pembayaran ?></td>
												<td><?php echo $key->no_rekening ?></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('_partial/foot') ?>
	</div>
</div>
<?php $this->load->view('_partial/scripttable') ?>
</body>
</html>