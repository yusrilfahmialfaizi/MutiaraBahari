	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Kasir Eceran</h4>
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
														New</span> 
														<span class="fw-light">
															Row
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form method="post" action="<?php echo base_url(); ?>admin/kasir/eceran/tambah">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group ">
																	<label>ID Barang</label>
																	<input id="id_barang" name="id_barang" type="text" class="form-control" placeholder="fill name" readonly>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Nama Barang</label><br>
																	<!-- input id="nama_barang" name="nama_barang" type="text" class="form-control" placeholder="fill name"> -->
																	<select class="form-control form-control-md-12" id="nama_barang" name="nama_barang">
															<option value="0">&nbsp;</option>
															<?php 
																foreach ($barang as $key) {
															?>
															<option><?php echo $key->nama_barang; ?></option>
															<?php 	
																}
															?>
														</select>
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group ">
																	<label>Qty</label>
																	<input id="qty" name="qty" type="number" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group ">
																	<label>Harga</label>
																	<input id="harga" name="harga" type="text" class="form-control" placeholder="fill office" readonly>
																</div>
															</div>
														</div>
														<div class="modal-footer no-bd">
															<button id="add_keranjang" class="add_keranjang btn btn-primary">Simpan</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<form>
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="no_invoice">No Invoice</label>
														<input type="text" class="form-control form-control-sm" id="no_invoice" name="no_invoice" value="<?php echo $kode ?>" readonly="readonly">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="nama_pelanggan">Nama Pelanggan</label>
														<select class="form-control form-control-xl" id="nama_pelanggan" name="nama_pelanggan">
															<option value="0">&nbsp;</option>
															<?php 
																foreach ($user as $key) {
															?>
															<option><?php echo $key->nama; ?>   <?php echo $key->alamat ?></option>
															<?php 	
																}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<?php
															date_default_timezone_set('Asia/Jakarta');
															$tgl=date('d-m-Y');
														?>
														<label for="tanggal">Tanggal</label>
														<input type="text" class="form-control form-control-sm" id="tanggal" value="<?php echo $tgl ?>" readonly="readonly">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<?php
															$jtp=date('d-m-Y');
															$tujuh_hari        = mktime(0,0,0,date("m"),date("d")+7,date("Y"));
															$kembali        = date("d-m-Y", $tujuh_hari);
														?>
														<label for="jatuh_tempo">Jatuh Tempo</label>
														<input type="text" class="form-control form-control-sm" id="jatuh_tempo" value="<?php echo $kembali ?>" readonly="readonly">
													</div>
												</div>
											</div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th scope="col">ID Barang</th>
														<th scope="col">Nama Barang</th>
														<th scope="col">Qty</th>
														<th scope="col">Harga</th>
														<th scope="col">Subtotal</th>
														<th scope="col">Action</th>
													</tr>
												</thead>
												<tbody id="detail_keranjang"></tbody>
											</table>
											<button id="simpan" class="simpan btn btn-primary ml-auto">Simpan</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			window.alert(id);
						window.alert(name);
						window.alert(qty);
						window.alert(price);
			<?php $this->load->view('_partial/scripttable') ?>
			<script type="text/javascript">
				$(document).ready(function(){
					// $(".add_keranjang").click(function(){
					// 	// var id = $("#id_barang").val();
					// 	// // var id = $(this).data("id_barang");
					// 	// var name = $("#nama_barang").val();
					// 	// // var name = $(this).data("nama_barang");
					// 	// var qty = $("#qty").val();
					// 	// // var qty = $(this).data("qty");
					// 	// var price = $("#harga").val();
					// 	// // var price = $(this).data("harga");
					// 	var id = $(this).attr("id_barang");
					// 	var name = $(this).attr("nama_barang");
					// 	var qty = $(this).attr("qty");
					// 	var price = $(this).attr("harga");

					// 	$.ajax({
					// 		url : "<?php //echo base_url(); ?>admin/kasir/eceran/keranjang_kasir",
					// 		method : "POST",
					// 		data : {id : id, name : name, qty : qty, price : price },
					// 		success: function(data){
					// 			$("#detail_keranjang").html(data);
					// 		}
					// 	});
					// });
					$('#detail_keranjang').load("<?php echo base_url();?>admin/kasir/eceran/load_cart");
					$(document).on('click', '.hapus_cart', function(){
						var row_id = $(this).attr("id");
						$.ajax({
							url		: "<?php echo base_url(); ?>admin/kasir/eceran/hapus_keranjang",
							method 	:"POST",
							data 	: {row_id : row_id},
							success	: function(data){
								$('#detail_keranjang').html(data);
							}
						});
					});
				});
			</script>
			<script src="<?php echo base_url("assets/") ?>js/select2.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					$("#nama_pelanggan").select2({
						placeholder: "Pilih Pelanggan",
    					allowClear: true,
    					minimumInputLength : 2
					});
					$("#nama_barang").select2({
						placeholder: "Pilih Barang",
    					allowClear: true,
    					minimumInputLength : 2
					});
				});
			</script>
			<script type="text/javascript">
		        $(document).ready(function(){
		             $('#nama_barang').on('change',function(){
		                 
		                var kode=$(this).val();
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo base_url('admin/kasir/eceran/get_barangeceran')?>",
		                    dataType : "JSON",
		                    data : {nama_barang: kode},
		                    cache:false,
		                    success: function(data){
		                        $.each(data,function(id_barangeceran, hargaeceran){
		                            $('[name="id_barang"]').val(data.id_barangeceran);
		                            // $('[name="nama_barang"]').val(data.nama_barang);
		                            $('[name="harga"]').val(data.hargaeceran);
		                             
		                        });
		                         
		                    }
		                });
		                return false;
		           });
		        });
		    </script>
		    <!-- <script type="text/javascript">
		    	$(document).ready(function(){
		    		$('#qty').on('input', function(){
		 				// var qty = $('#qty').val();
		 				// var kode = $('#nama_barang').val();
		 				$.ajax({
		 					type : "POST",
		 					url : "<?php //echo base_url('admin/kasir/eceran/get_harga')?>",
		 					data :{qty : $('#qty').val(), nama_barang : $('#nama_barang').val()},
		 					dataType : "JSON",
		 					cache : false,
		 					success : function(data){
		 						$.each(data,function(harga){
		                            $('[name="harga"]').val(data.harga);
		                        });
		 					}
		 				});
		 			});
		    	});
		    </script> -->
		</body>
		</html>
