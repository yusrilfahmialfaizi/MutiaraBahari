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
											<form action="<?php echo base_url() ?>user/agen/pemesanan/data">
												<button type="submit" class="btn btn-icon btn-link">
													<i class="fas fa-arrow-left fas-lg"></i>
												</button>
											</form>
										</div>
										<div class="form-group">
											<h4 class="card-title">Pesanan</h4>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form method="post">
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
													<td><?php echo $key['id_pesanan'] ?><input type="text" name="id_pesanan" id="id_pesanan" value="<?php echo $key['id_pesanan'] ?>" hidden></td>
													<td><?php echo $key['nama_barang'] ?></td>
													<td><?php echo $key['qty'] ?></td>
													<td><?php echo $key['harga'] ?></td>
													<td><?php echo $key['subtotal'] ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
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
