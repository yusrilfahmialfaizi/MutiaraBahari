	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data User</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Agen dan Pelanggan</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah Agen
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Agen
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url('admin/user/tambahAgen') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="largeInput">Id User</label>
																	<input type="text" class="form-control form-control" id="id_user" name="id_user" value="<?php echo $id ?>" readonly>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label for="largeInput">Nama Agen</label>
																	<input type="text" class="form-control form-control" id="nama_agen" name="nama_agen">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">Alamat</label>
																	<textarea type="text" class="form-control form-control" id="alamat" name="alamat"></textarea>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">No Telepon</label>
																	<input type="number" class="form-control form-control" id="no_telepon" name="no_telepon" min="0">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Username</label>
																	<input type="text" class="form-control form-control" id="username" name="username">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Password</label>
																	<input type="password" class="form-control form-control" id="password" name="password">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button class="btn btn-primary" id="simpan">Simpan</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<?php foreach ($user as $i): ?>	
									<!-- Modal -->
									<div class="modal fade" id="ModalEdit<?php echo $i->id_user ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																	<label for="largeInput">Id User</label>
																	<input type="text" class="form-control form-control" id="id_user" name="id_user" value="<?php echo $i->id_user ?>" readonly>
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
																	<label for="largeInput">No Telepon</label>
																	<input type="number" class="form-control form-control" id="no_telepon" name="no_telepon" min="0" value="<?php echo $i->no_telepon ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Username</label>
																	<input type="text" class="form-control form-control" id="username" name="username" value="<?php echo $i->username ?>">
																</div>
															</div>
															<!-- <div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Password </label>
																	<input type="password" class="form-control form-control" id="password" name="password">
																</div>
															</div> -->
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
									<?php foreach ($user as $a): ?>	
									<!-- Modal -->
									<div class="modal fade" id="ModalPass<?php echo $a->id_user ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<form method="post" action="<?php echo base_url('admin/user/editPass') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Password </label>
																	<input type="text" class="form-control form-control" id="userid" name="userid" value="<?php echo $a->id_user ?>" hidden>
																	<input type="password" class="form-control form-control" id="pass" name="pass">
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

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>No. Telepon</th>
													<th>Username</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>No. Telepon</th>
													<th>Username</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													foreach ($user as $key) {
												?>
												<tr>
													<td><?php echo $key->id_user ?></td>
													<td><?php echo $key->nama ?></td>
													<td><?php echo $key->alamat ?></td>
													<td><?php echo $key->no_telepon ?></td>
													<td><?php echo $key->username ?></td>
													<td><?php echo $key->status ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#ModalEdit<?php echo $key->id_user ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i> Data
															</button>
															<button type="button" data-toggle="modal" data-target="#ModalPass<?php echo $key->id_user ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i> Password
															</button>
															<a href="<?php echo base_url("admin/user/hapusagen/".$key->id_user) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
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
							</div>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
		</body>
		</html>
