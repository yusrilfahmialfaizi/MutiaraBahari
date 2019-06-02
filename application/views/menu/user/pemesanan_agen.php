	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Keranjang Belanja</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
					<div class="row">
						<!--  -->
							<div class="col-md-8">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label for="nama_pelanggan">Nama Pelanggan</label>
														<input type="text" class="form-control form-control-sm" id="nama_pelanggan" name="nama_pelanggan" value="<?php $nama =  $this->session->userdata("nama");
														echo $nama; ?>" readonly="readonly">
														<input type="text" class="form-control form-control-sm" id="id_user" name="id_user" value="<?php $id_user =  $this->session->userdata("id_user");
														echo $id_user; ?>" readonly="readonly" hidden>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="Alamat">Alamat</label>
														<input type="text" class="form-control form-control-sm" id="alamat" name="alamat" value="<?php $alamat =  $this->session->userdata("alamat");
														echo $alamat; ?>" readonly="readonly">
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<?php
															date_default_timezone_set('Asia/Jakarta');
															$tgl=date('d-m-Y');
														?>
														<label for="tanggal">Tanggal</label>
														<input type="text" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?php echo $tgl ?>" readonly="readonly">
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
												<tbody>
													<?php foreach ($this->cart->contents() as $items): ?>
														
													<tr>
									                    <td>
									                    	<?php echo $items['id']?>
								                    	</td>
									                    <td><?php echo $items['name']?></td>
									                    <td><?php echo $items['qty']?></td>
									                    <td><?php echo number_format($items['price'])?></td>
									                    <td><?php echo number_format($items['subtotal'])?></td>
									                    <td>
									                    	<div class="form-group">
										                    	<a href="#" class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#update<?php echo $items['rowid']?>">
	 																<i class="fas fa-edit"></i>
	 															</a>
										                    	<button type="button" id="<?php echo $items['rowid']?>" class="hapus_cart btn btn-link btn-danger btn-lg"><i class="fa fa-times"></i></button>
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
							<div class="col-sm-4">
								<div class="card">
									<div class="card-body">
										<div class="col-md-12">
											<form action="<?php echo base_url('user/agen/pemesanan/proses_pesan') ?>" method="post">
											<div class="form-group form-inline">
												<!-- <label class="col-md-4 col-form-label">Total Rp. </label> -->
												<h3><strong>Total Rp. <?php echo number_format($this->cart->total()) ?></strong></h3>
												<input type="number" class="form-control" id="total" name="total" value="<?php echo $this->cart->total() ?>" readonly hidden>
											</div>
										<!-- </div> -->
										<!-- <div class="col-md-4"> -->
											<div class="form-group">
												<label>Jenis Pembayaran</label>
												<select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
													<option value="Cash">Cash</option>
													<option value="Transfer">Transfer</option>
												</select>
											</div>
											<div class="form-group">
												<label>Jenis Pengiriman</label>
												<select class="form-control" name="jenis_pengiriman" id="jenis_pengiriman">
													<option value="Ambil Sendiri">Ambil Sendiri</option>
													<option value="Kirim">Kirim</option>
												</select>
											</div>
										<!-- </div> -->
										<!-- <div class="col-md-4"> -->
											<div class="form-group">	
												<button id="simpan" name="simpan" class=" btn btn-primary ml-auto">Simpan</button>
												<button id="reset" name="reset" class="btn btn-danger ml-auto">Reset</button>
											</div>
										</form>
										</div>
									</div>
								</div>
							<!-- </form> -->
						</div>
					</div>
					<!-- Modal -->
					<?php foreach ($this->cart->contents() as $key) {?>
						
					<div class="modal fade" id="update<?php echo $key['rowid']?>" role="dialog" aria-hidden="true">

						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										Tambah</span> 
										<span class="fw-light">
											Barang
										</span>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="post" action="<?php echo base_url() ?>user/agen/pemesanan/updatekeranjang">
										<?php $k = $this->cart->get_item($key['rowid']) ?>
										<div class="row">
											<input type="text" name="rowid" id="rowid" value="<?php echo $k['rowid'] ?>" hidden readonly>
											<div class="col-md-6">
												<div class="form-group">
													<label>Nama Barang</label>
													<input id="name" name="name" type="text" class="form-control" value="<?php echo $k['name'] ?>" placeholder="Stok Barang .." readonly>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<label>Sisa Stok</label>
													<input id="stok" name="stok" type="text" class="form-control" placeholder="Stok Barang .." readonly>
												</div>
											</div>
											<div class="col-md-6 pr-0">
												<div class="form-group ">
													<label>Qty</label>
													<input id="qty" name="qty" type="number" value="<?php echo $k['qty'] ?>" class="form-control" placeholder="Qty ..." min="0">
												</div>
											</div>
										</div>
										<div class="modal-footer no-bd">
											<button id="add_keranjang" class="add_keranjang btn btn-primary">Simpan</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
										</div>
										<?php //endforeach ?>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					</div>
				</div>
			<?php $this->load->view('_partial/foot.php') ?>
			</div>
			<?php $this->load->view('_partial/scripttable') ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$(document).on('click', '.hapus_cart', function(){
						var row_id = $(this).attr("id");
						swal({
						title: 'Apakah Kamu Yakin?',
						text: "Kamu Tidak Dapat Mengembalikannya !",
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'Tidak, BATALKAN !',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya, Hapus saja !',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
						$.ajax({
							url		: "<?php echo base_url(); ?>admin/kasir/grosir/hapus_keranjang",
							method 	:"POST",
							data 	: {row_id : row_id},
							success	: function(data){
								$('#detail_keranjang').html(data);
								location.reload();
							}
						});
						} else {
							swal("Data Kamu Aman!", {
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
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
		                var qty = $('#qty').val();
		                $.ajax({
		                    type : "POST",
		                    url  : "<?php echo base_url('admin/kasir/grosir/get_barang')?>",
		                    dataType : "JSON",
		                    data : {nama_barang: kode,qty : qty },
		                    cache:false,
		                    success: function(data){
		                        $.each(data,function(id_barang, nama_barang, harga,stok){
		                            $('[name="id_barang"]').val(data.id_barang);
		                            $('[name="stok"]').val(data.stok);
		                            $('[name="harga"]').val(data.harga);
		                             
		                        });
		                         
		                    }
		                });
		                return false;
		           });
		        });
		    </script>
		    <script type="text/javascript">
		    	$(document).ready(function(){
		    		$('#bayar').on('keyup', function(){
		    			var total = $('#total').val()
		    			var bayar = $('#bayar').val();
		    			var hasil = bayar - total;
		    			$('#kembali').val(hasil);
		    		});
		    	});
		    </script>
		</body>
		</html>
