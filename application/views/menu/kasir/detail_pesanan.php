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
											<form action="<?php echo base_url() ?>kasir/pesanan">
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

									<?php foreach ($detail_pesanan as $i): ?>	
									<!-- Modal -->
									<div class="modal fade" id="ModalEdit<?php echo $i['id_detail_pesan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<form method="post" action="<?php echo base_url('kasir/pesanan/editdetail') ?>" enctype="multipart/form-data">
														<div class="row">
															<input type="text" class="form-control form-control" id="id_detail_pesanan" name="id_detail_pesanan" value="<?php echo $i['id_detail_pesan'] ?>" readonly hidden>
															<input type="text" class="form-control form-control" id="id_pesanan" name="id_pesanan" value="<?php echo $i['id_pesanan'] ?>" readonly hidden>
															<div class="col-md-12">
																<div class="form-group">
																	<label for="largeInput">No. Pesanan</label>
																	<h6><?php echo $i['id_pesanan'] ?></h6>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Nama Barang</label>
																	<input type="text" class="form-control form-control" id="nama_barang" name="nama_barang" value="<?php echo $i['nama_barang'] ?>" readonly hidden>
																	<h6><?php echo $i['nama_barang'] ?></h6>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">Qty</label>
																	<input type="number" class="form-control form-control" id="qty" name="qty" value="<?php echo $i['qty'] ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Harga</label>
																	<input type="number" class="form-control form-control" id="harga" name="harga" min="0" value="<?php echo $i["harga"] ?>">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Subtotal</label>
																	<input type="text" class="form-control form-control" id="subtotal" name="subtotal" value="<?php echo $i['subtotal'] ?>">
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
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No. Pesanan</th>
													<th>Nama Barang</th>
													<th>Qty</th>
													<th>Harga</th>
													<th>Subtotal</th>
													<th style="width: 10%">Action</th>
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
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="modal" data-target="#ModalEdit<?php echo $key['id_detail_pesan'] ?>" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<!-- <a href="<?php echo base_url("kasir/pesanan/hapusdetail/".$key['id_detail_pesan']) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</a> -->
															<button data-toggle="tooltip" title="" id="hapus" data-id="<?php echo $key['id_detail_pesan']?>" data-id_pesanan="<?php echo $key['id_pesanan'] ?>" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
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
			<?php $this->load->view('_partial/scripttable') ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#qty').on('input',function(){
		                 
		                var kode=$('#nama_barang').val();
		                var qty = $('#qty').val();
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo base_url('kasir/pesanan/get_barang')?>",
		                    dataType : "JSON",
		                    data : {nama_barang: kode, qty : qty },
		                    cache:false,
		                    success: function(data){
		                        $.each(data,function(id_barang, nama_barang, harga,stok){
		                        	$('#harga').val(data.harga)
		                            var subtotal = qty * data.harga ;
									$('#subtotal').val(subtotal);
		                        });
		                         
		                    }
		                });
		                return false;
		           	});
					$('#hapus').on('click', function(){
						var id_detail_pesan = $(this).attr('data-id');
						var id_pesanan = $(this).attr('data-id_pesanan');
						// window.alert(id + id_pesanan);
						$.ajax({
							type : "POST",
		                    url  : "<?php echo base_url('kasir/pesanan/hapusdetail')?>",
		                    // dataType : "JSON",
		                    data : {id_detail_pesan: id_detail_pesan, id_pesanan : id_pesanan },
		                    success : function(data){
		                    	window.alert('berhasil');
		                    }
						})
					})
				});
			</script>
		</body>
		</html>
