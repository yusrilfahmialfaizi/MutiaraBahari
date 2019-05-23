		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Hutang</h4>
							<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title"></h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add Row
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
															Hutang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url('admin/kasir/hutang/tambahHutang') ?>"enctype="multipart/form-data">
														<div class="row">
															<!-- <div class="col-sm-12">
																<div class="form-group">
																	<label for="largeInput">Id Hutang</label>
																	<input type="text" class="form-control form-control" id="idhutang " name="idhutang" value="<?php //echo $id ?>" readonly>
																</div>
															</div> -->
															<div class="col-md-12">
																<div class="form-group">
																	<label for="nama_pelanggan">Nama Pelanggan</label><br>
																	<select class="form-control form-control-xl" id="nama_pelanggan" name="nama_pelanggan">
																		<option value="0">&nbsp;</option>
																		<?php foreach ($user as $b): ?>
																			
																		<option><?php echo $b->nama; ?></option>
																		<?php endforeach ?>
																	</select>
																	<input type="text" class="form-control form-control" id="user" name="user" hidden="hidden">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">Jumlah Hutang</label>
																	<input type="text" class="form-control form-control" id="jumlah_hutang" name="jumlah_hutang" placeholder="Jumlah hutang">
																</div>
															</div>
															<div class="col-md-6">
																<?php
																	date_default_timezone_set('Asia/Jakarta');
																	$jtp=date('d-m-Y');
																	$tujuh_hari        = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
																	$kembali        = date("Y-m-d", $tujuh_hari);
																?>
																<div class="form-group">
																	<label for="largeInput">Jatuh Tempo</label>
																	<input type="text" class="form-control form-control" id="jatuh_tempo" name="jatuh_tempo" value="<?php echo $kembali ?>" readonly>
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
									<?php foreach ($hutang as $y): ?>
										
									<!-- Modal -->
									<div class="modal fade" id="ModalEdit<?php echo $y->id_hutang ?>" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Pembayaran</span> 
														<span class="fw-light">
															Hutang
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url() ?>admin/kasir/hutang/updateHutang" enctype="multipart/form-data">
														<div class="row">
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">ID Hutang</label>
																	<input type="text" class="form-control form-control" id="id_htg" name="id_htg" value="<?php echo $y->id_hutang ?>" readonly>
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<label for="largeInput">Nama Pelanggan</label>
																	<input type="text" class="form-control form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?php echo $y->nama ?>" readonly>
																	<input type="text" class="form-control form-control" id="id_user" name="id_user" value="<?php echo $y->id_user ?>" hidden>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group">
																	<label for="largeInput">Jumlah Hutang</label>
																	<input type="text" class="form-control form-control" id="hutang" name="hutang" value="<?php echo $y->total_hutang ?>" readonly>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Bayar</label>
																	<input type="number" class="form-control form-control" id="bayar" name="bayar" min="0">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="largeInput">Sisa Hutang</label>
																	<input type="number" class="form-control form-control" id="sisa" name="sisa" max="0" readonly>
																</div>
															</div>
															<div class="col-md-6">
																<?php
																	date_default_timezone_set('Asia/Jakarta');
																	$jtp=date('d-m-Y');
																	$tujuh_hari        = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
																	$kembali        = date("Y-m-d", $tujuh_hari);
																?>
																<div class="form-group">
																	<label for="largeInput">Jatuh Tempo</label>
																	<input type="text" class="form-control form-control" id="jatuh_tempo" name="jatuh_tempo" value="<?php echo $kembali ?>" readonly>
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
									<?php endforeach ?>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Id Hutang</th>
													<th>Id User</th>
													<th>Nama Pelanggan</th>
													<th>Hutang</th>
													<th>Jatuh Tempo</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Id Hutang</th>
													<th>Id User</th>
													<th>Nama Pelanggan</th>
													<th>Hutang</th>
													<th>Jatuh Tempo</th>
													<th style="width: 10%"></th>
												</tr>
											</tfoot>
											<tbody>
												<?php foreach ($hutang as $k): ?>
												<tr>
													<td><?php echo $k->id_hutang ?></td>
													<td><?php echo $k->id_user ?></td>
													<td><?php echo $k->nama ?></td>
													<td><?php echo $k->total_hutang ?></td>
													<td><?php echo $k->jatuh_tempo ?></td>
													<td>
														<div class="form-button-action">
 															<button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $k->id_hutang;?>">
 																<i class="fas fa-edit"></i>
 															</button>
															<!-- <a href="<?php //echo site_url("admin/kasir/grosir/hapusHutang/".$k->id_hutang) ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
																<i class="fa fa-times"></i>
															</a> -->
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
			<?php $this->load->view('_partial/foot') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#nama_pelanggan").select2({
						placeholder: "Pilih Pelanggan",
    					allowClear: true,
    					minimumInputLength : 2
					});
					$(function(){
						$( "#jtp" ).datepicker({
						  dateFormat : 'yyyy/mm/dd',
						  autoclose:true
						});
					});
				});
			</script>
			<script type="text/javascript">
		        $(document).ready(function(){
		             $('#nama_pelanggan').on('change',function(){
		                 
		                var nama=$(this).val();
		       
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo base_url('admin/kasir/hutang/get_id')?>",
		                    dataType : "JSON",
		                    data : {nama: nama },
		                    cache:false,
		                    success: function(data){
		                        $.each(data,function(id_user){
		                            $('[name="user"]').val(data.id_user);
		                            
		                        });
		                         
		                    }
		                });
		                return false;
		           });
		             $('#bayar').on('keyup', function(){
		             	var hutang = $('#hutang').val();
		             	var bayar = $('#bayar').val();
		             	var sisa = hutang - bayar;
		             	var a = 0;
		             	// window.alert(a);
		             	if (sisa >= 0) {
		             		$('#sisa').val(sisa);           		
		             	}else{
		             		$('#sisa').val(a);
		             	}
		             });
		        });
		    </script>
		</body>
		</html>
