		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Ongkir</h4>
						<?php $this->load->view("_partial/breadcrumbs") ?>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Data Ongkir</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Data Ongkir
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url() ?>admin/ongkir/tambah">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Cakupan Area</label>
																	<input id="cakupan" name="cakupan" type="text" class="form-control" placeholder="Contoh : Jember Kota ....." required="required">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label>Harga Ongkir</label>
																	<input id="harga" name="harga" type="number" class="form-control" placeholder="Harga Ongkir" required="required">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal -->
									<?php foreach ($ongkir as $a): ?>
									<div class="modal fade" id="EditModal<?php echo $a->id_ongkir ?>" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Data Ongkir
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url() ?>admin/ongkir/edit">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group">
																	<label>Cakupan Area</label>
																	<input type="text" name="id" name="id" class="form-control" value="<?php echo $a->id_ongkir ?>" required="required" hidden="hidden">
																	<input id="cakupan" name="cakupan" type="text" class="form-control" placeholder="Contoh : Jember Kota ....." value="<?php echo $a->cakupan_area ?>" required="required">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label>Harga Ongkir</label>
																	<input id="harga" name="harga" type="number" class="form-control" placeholder="Harga Ongkir" value="<?php echo $a->ongkir ?>" required="required">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach ?>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Cakupan Area</th>
													<th>Harga Ongkir</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
													<th>Cakupan Area</th>
													<th>Harga Ongkir</th>
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php $no = 1; foreach ($ongkir as $key): ?>
													
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $key->cakupan_area ?></td>
													<td>Rp. <?php echo number_format($key->ongkir) ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-target="#EditModal<?php echo $key->id_ongkir ?>">
																<i class="fa fa-edit"></i>
															</button>
															<a href="<?php echo base_url() ?>admin/ongkir/hapus/<?php echo $key->id_ongkir ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
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
			<?php $this->load->view("_partial/foot") ?>
		</div>
		<?php $this->load->view("_partial/scripttable") ?>
	</div>
</body>
</html>