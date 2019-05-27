	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Merek Barang</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Data Merek Barang</h4>
										<button class="btn btn-primary btn-round btn-md ml-auto" data-toggle="modal" data-target="#addRowModal2">
											<i class="fa fa-plus"></i>
											Tambah merek
										</button>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="modal fade" id="addRowModal2" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Tambah</span> 
														<span class="fw-light">
															Merek Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
						
													<form action="<?php echo base_url().'admin/barang/addmerek'?>" method="post" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group  ">
																	<!-- <label>ID merek</label> -->
																	<input id="id_merek" name="id_merek" type="hidden" class="form-control" value="<?php echo $kode ?>"hidden="hidden">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group  ">
																	<label>Nama Merek Barang</label>
																	<input id="nama_merek" name="nama_merek" type="text" class="form-control" placeholder="Nama Barang ....." required="required">
																</div>
															</div>
															<div class="col-md-6 ">
																<div class="form-group  ">
																	<label>Kode</label>
																	<input id="kode" name="kode" type="text" min="0" class="form-control" placeholder="Kode ..." required="required">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="gambar">Gambar</label>
																	<input type="file" class="form-control-file" id="gambar" name="gambar">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button class="btn btn-primary">Simpan</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
									
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID Merek</th>
													<th>Nama Merek</th>
													<th>Kode Merek</th>
													<th>Gambar</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID Merek</th>
													<th>Nama Merek</th>
													<th>Kode Merek</th>
													<th>Gambar</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php
													foreach ($merek as $key) {
												?>
												<tr>
													<td><?php echo $key->id_merek ?></td>
													<td><?php echo $key->merek ?></td>
													<td><?php echo $key->kode_merek ?></td>
													<td>	<?php if ($key->gambar == null){ ?>
																<img width="50px" src="<?php echo base_url('upload/default/default.jpg') ?>">
															<?php }else if ($key->gambar == 'default.jpg') {?>
																<img width="50px" src="<?php echo base_url('upload/default/default.jpg') ?>">
															<?php }else{?>
																<img width="50px" src="<?php echo base_url('upload/'.$key->gambar) ?>">	
															<?php } ?>
													</td>
													<td>
														<div class="form-button-action">
 															<button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#EditModal<?php echo $key->id_merek;?>">
 																<i class="fas fa-edit"></i>
 															</button>
															<a href="<?php echo base_url("admin/barang/hapusMerek/".$key->id_merek) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<?php 
									// $barang = json_decode(json_encode($barang),true);
							        foreach($merek as $i):
							            $id_merek=$i->id_merek;
							            $nama_merek=$i->merek;
							            $kode_merek=$i->kode_merek;
							            $gambar=$i->gambar;
							        ?>
									<div class="modal fade" id="EditModal<?php echo $id_merek ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Data Merek 
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?php echo base_url().'admin/barang/editModalMerek'?>" method="post" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group  ">
																	<!-- <label>ID Merek</label> -->
																	<input id="id_merek" name="id_merek" type="text" class="form-control" readonly="readonly" value="<?php echo $id_merek; ?>" hidden>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group  ">
																	<label>Nama merek</label>
																	<input id="nama_merek" name="nama_merek" type="text" class="form-control" placeholder="Nama Merek ....." required="required" value="<?php echo $nama_merek; ?>">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group  ">
																	<!-- <label>Kode</label> -->
																	<input id="kode_merek" name="kode_merek" type="text" class="form-control" placeholder="Kode ..." required="required" value="<?php echo $kode_merek; ?>"hidden>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group  ">
																	<label>Gambar</label>
																	<input type="file" name="gambar" id="gambar" class="form-control-file">
																	<input id="old_image" name="old_image" type="text" class="form-control" placeholder="Gambar ..." value="<?php echo $gambar; ?>"hidden>
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button class="btn btn-primary">Update</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
		</body>
		</html>

