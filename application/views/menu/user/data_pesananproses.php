	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Detail Pesanan</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<div class="form-group">
											<form action="<?php echo base_url() ?>admin/kasir/pesanan">
												<button type="submit" class="btn btn-icon btn-link">
													<i class="fas fa-arrow-left fas-lg"></i>
												</button>
											</form>
										</div>
										<div class="form-group">
											<h4 class="card-title">Agen dan Pelanggan</h4>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form method="post" action="<?php echo base_url() ?>admin/kasir/pesanan/prosesjual">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No. Pesanan</th>
													<th>Nama Barang</th>
													<th>Qty</th>
													<th>Harga</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No. Pesanan</th>
													<th>Nama Barang</th>
													<th>Qty</th>
													<th>Harga</th>
													<th>Subtotal</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													foreach ($detail_pesanan as $key) {
												?>
												<tr>
													<td>
														<?php echo $key->id_pesanan ?>
														<input type="text" name="id_pesanan" id="id_pesanan" value="<?php echo $key->id_pesanan ?>" hidden>
													</td>
													<td>
														<?php echo $key->nama_barang ?>
														<input type="text" name="nama_barang" id="nama_barang" value="<?php echo $key->nama_barang ?>" hidden>
													</td>
													<td>
														<?php echo $key->qty ?>
														<input type="text" name="qty" id="qty" value="<?php echo $key->qty ?>" hidden>
													</td>
													<td>
														<?php echo $key->harga ?>
														<input type="text" name="harga" id="harga" value="<?php echo $key->harga ?>" hidden>
													</td>
													<td>
														<?php echo $key->subtotal ?>
														<input type="text" name="subtotal" id="subtotal" value="<?php echo $key->subtotal ?>" hidden>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<div class="col-md-2 mr-auto">
										<div class="form-group">
											<input type="submit" name="proses" id="proses" class="btn btn-primary btn-md" value="Proses & Kemas">
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			<?php $this->load->view('_partial/scripttableagen') ?>
		</body>
		</html>
