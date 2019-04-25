	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Barang</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Data Barang</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah jenis
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
															Jenis Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
						
													<form action="<?php echo base_url().'admin/add'?>" method="post" enctype="multipart/form-data">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Barang</label>
																	<input id="id_barang" name="id_barang" value="<?php echo $kode; ?>" type="text" class="form-control">
																	<input id="kode_barang" name="kode_barang" value="<?php echo $kode; ?>" type="hidden" class="form-control">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Barang</label>
																	<input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="Nama Barang ....." required="required">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Harga Rp.</label>
																	<input id="harga" name="harga" type="number" min="0" class="form-control" placeholder="Harga ..." required="required">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Stok</label>
																	<input id="stok" name="stok" type="number" min="0" class="form-control" placeholder="Jumlah Stok" required="required">
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
													<th>ID</th>
													<th>Nama Barang</th>
													<th>Harga</th>
													<th>Stok</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Nama Barang</th>
													<th>Harga</th>
													<th>Stok</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													// foreach ($barang as $key) {
													foreach ($barang as $key) {
												?>
												<tr>
													<td><?php echo $key->id_barang ?></td>
													<td><?php echo $key->nama_barang ?></td>
													<td><?php echo $key->harga ?></td>
													<td><?php echo $key->jumlah_stok ?></td>
													<td>
														<div class="form-button-action">
 															<button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#EditModal<?php echo $key->id_barang;?>">
 																<i class="fas fa-edit"></i>
 															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
									<?php 
									// $barang = json_decode(json_encode($barang),true);
							        foreach($barang as $i):
							            $id_barang=$i->id_barang;
							            $nama_barang=$i->nama_barang;
							            $stok=$i->jumlah_stok;
							            $harga=$i->harga;
							        ?>
									<div class="modal fade" id="EditModal<?php echo $id_barang ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Jenis Barang 
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?php echo base_url().'admin/editModal'?>" method="post">
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Kode Barang</label>
																	<input id="id_barang" name="id_barang" type="text" class="form-control" readonly="readonly" value="<?php echo $id_barang; ?>">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Nama Barang</label>
																	<input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="Nama Barang ....." required="required" value="<?php echo $nama_barang; ?>">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Harga Rp.</label>
																	<input id="harga" name="harga" type="number" min="0" class="form-control" placeholder="Harga ..." required="required" value="<?php echo $harga; ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Stok</label>
																	<input id="stok" name="stok" type="number" min="0" class="form-control" placeholder="Jumlah Stok" required="required" value="<?php echo $stok; ?>">
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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Tambah Stok</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Tambah Stok Barang
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
														Tamabah</span> 
														<span class="fw-light">
															Stok Barang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" type="text" class="form-control" placeholder="fill name">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>No. Telepon</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th>Alamat</th>
													<th>No. Telepon</th>
													<th style="width: 10%">Action</th>
												</tr>
											</tfoot>
											<tbody>
												<?php 
													 foreach ($barang as $key) {
												?>
												<tr>
													<td><?php echo $key->id_det_barang ?></td>
													<td><?php echo $key->nama_barang ?></td>
													<td><?php echo $key->nama ?></td>
													<td><?php echo $key->tanggal ?></td>
													<td><?php echo $key->stok ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
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
			<?php $this->load->view('_partial/foot') ?>
			</div>
			<script>
			    $(function () {
			    $('#btn-edit').click(function (e) {
			            e.preventDefault();
			            $('#EditModal').modal({
			                backdrop: 'static',
			                show: true
			            });
			            id = $(this).data('id');
			            // mengambil nilai data-id yang di click
			            $.ajax({
			                url: 'admin/editModal' + id,
			                success: function (data) {
			                    $("input[name='id_barang']").val(data.id);
			                    $("input[name='nama_barang']").val(data.nama_barang);	                    
			                    $("input[name='harga']").val(data.harga);	                    
			                    $("input[name='stok']").val(data.stok);	                    
			                }
			            });
			       });
			}
			</script>
			<?php $this->load->view('_partial/scripttable') ?>
		</body>
		</html>

