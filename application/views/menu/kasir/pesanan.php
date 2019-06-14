	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Data Pesanan</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
					<div class="card">
						<div class="card-body">
							<ul  class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
								<li class="nav-item submenu">
									<a class="nav-link active" id="pills-konfirmasi-tab" data-toggle="pill" href="#pills-konfirmasi" role="tab" aria-controls="pills-konfirmasi" aria-selected="true">Menunggu Konfirmasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-proses-tab" data-toggle="pill" href="#pills-proses" role="tab" aria-controls="pills-proses" aria-selected="false">Diproses</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-kemas-tab" data-toggle="pill" href="#pills-kemas" role="tab" aria-controls="pills-kemas" aria-selected="false">Dikemas</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-kirim-tab" data-toggle="pill" href="#pills-kirim" role="tab" aria-controls="pills-kirim" aria-selected="false">Dikirim</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-terima-tab" data-toggle="pill" href="#pills-terima" role="tab" aria-controls="pills-terima" aria-selected="false">Diterima</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-selesai-tab" data-toggle="pill" href="#pills-selesai" role="tab" aria-controls="pills-selesai" aria-selected="false">Selesai</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-batalkan-tab" data-toggle="pill" href="#pills-batalkan" role="tab" aria-controls="pills-batalkan" aria-selected="false">Dibatalkan</a>
								</li>
							</ul>
							<div class="tab-content mt-2 mb-3" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-konfirmasi" role="tabpanel" aria-labelledby="pills-konfirmasi-tab">
									<div class="row">
										<?php foreach ($pesanan as $konfirmasi): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $konfirmasi->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $konfirmasi->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $konfirmasi->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $konfirmasi->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $konfirmasi->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($konfirmasi->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $konfirmasi->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $konfirmasi->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Pesanan/<?php echo $konfirmasi->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
															
														</div>
														<div class="col-md-4">
															<button type="button" id="menunggu_konfirmasi" class="menunggu_konfirmasi btn btn-success btn-round btn-sm  mr-auto" data-id="<?php echo $konfirmasi->id_pesanan ?>">Konfirmasi</button>
														</div>
														<div class="col-md-4">
															<button type="button" id="batal" class="batal btn btn-danger btn-round btn-sm  mr-auto" data-id="<?php echo $konfirmasi->id_pesanan ?>">Batalkan</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="pills-proses-tab">
									<div class="row">
										<?php foreach ($proses as $p): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $p->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $p->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $p->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $p->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $p->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($p->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $p->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $p->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $p->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
															
														</div>
														<div class="col-md-4">
															<button type="button" id="kemas" class="kemas btn btn-success btn-round btn-sm  mr-auto" data-id="<?php echo $p->id_pesanan ?>">Kemas</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-kemas" role="tabpanel" aria-labelledby="pills-kemas-tab">
									<div class="row">
										<?php foreach ($kemas as $k): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $k->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $k->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $k->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $k->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $k->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($k->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $k->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $k->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $k->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
														</div>
														<div class="col-md-4">
															<button type="button" id="kirim" class="kirim btn btn-success btn-round btn-sm  mr-auto" data-id="<?php echo $k->id_pesanan ?>">Kirim</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-kirim" role="tabpanel" aria-labelledby="pills-kirim-tab">
									<div class="row">
										<?php foreach ($kirim as $r): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $r->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $r->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $r->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $r->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $r->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($r->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $r->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $r->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $r->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
														</div>
														<div class="col-md-4">
															<button type="button" id="diterima" class="diterima btn btn-success btn-round btn-sm  mr-auto" data-id="<?php echo $r->id_pesanan ?>">Diterima</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-terima" role="tabpanel" aria-labelledby="pills-terima-tab">
									<div class="row">
										<?php foreach ($terima as $t): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $t->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $t->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $t->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $t->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $t->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($t->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $t->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $t->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $t->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
														</div>
														<div class="col-md-4">
															<button type="button" id="selesai" class="selesai btn btn-success btn-round btn-sm  mr-auto" data-id="<?php echo $t->id_pesanan ?>">Selesai</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab">
									<div class="row">
										<?php foreach ($selesai as $s): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $s->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $s->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $s->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $s->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $s->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($s->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $s->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $s->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $s->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-batalkan" role="tabpanel" aria-labelledby="pills-batalkan-tab">
									<div class="row">
										<?php foreach ($batal as $key): ?>
										<div class="col-md-4">
											<div class="card">
												<div class="card-body">
													<table style="">
														<tr>
															<th>No. Pesanan</th>
															<th>: <?php echo $key->id_pesanan?></th>
														</tr>
														<tr>
															<th>Nama Agen</th>
															<th>:  <?php echo $key->nama?></th>
														</tr>
														<tr>
															<th>Alamat</th>
															<th>: <?php echo $key->alamat?></th>
														</tr>
														<tr>
															<th>Status</th>
															<th>: <?php echo $key->status?></th>
														</tr>
														<tr>
															<th>Tanggal</th>
															<th>: <?php echo $key->tanggal?></th>
														</tr>
														<tr>
															<th>Total Harga</th>
															<th>: Rp. <?php echo number_format($key->total_harga)?></th>
														</tr>
														<tr>
															<th>Jenis Pembayaran</th>
															<th>: <?php echo $key->jenis_pembayaran?></th>
														</tr>
														<tr>
															<th>Status Pesanan</th>
															<th>: <?php echo $key->status_pesanan?></th>
														</tr>
													</table>
													<div class="row">
														<div class="col-md-4">
															<a href="<?php echo base_url()?>kasir/pesanan/Detail/<?php echo $key->id_pesanan ?>" class="btn btn-primary btn-round btn-sm  mr-auto">Lihat Barang</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
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
			$(document).on('click', '.menunggu_konfirmasi', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/konfirmasi/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
			$(document).on('click', '.kemas', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/proses/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
			$(document).on('click', '.kirim', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/kemas/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
			$(document).on('click', '.diterima', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/kirim/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
			$(document).on('click', '.selesai', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/terima/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
			$(document).on('click', '.batal', function(){
				var id = $(this).attr("data-id");
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
						text : 'Ya, Konfirmsi saja !',
						className : 'btn btn-success'
					}
				}
			}).then((willDelete) => {
				if (willDelete) {
				$.ajax({
					method 	:"POST",
					url 	:"<?php echo base_url()?>kasir/pesanan/batalkan/",
					data 	:{id_pesanan : id},
					success	: function(data){
						swal({
							title: "Selamat!",
							text: "Konfirmasi Berhasil",
							icon: "success",
							buttons: {
								confirm: {
									className: "btn btn-success",
									closeModal: true
								}
							}
						}).then((willDelete) => {
							if (willDelete) {
								location.reload();
							}
						})
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
		})
	</script>
</body>
</html>
