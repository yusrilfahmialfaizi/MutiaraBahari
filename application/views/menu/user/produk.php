		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- Card -->
					<div class="page-header">
						<h4 class="page-title">Data Barang</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
					<!-- Card With Icon States Color -->
					<div class="row">
						<?php foreach ($barang as $key): ?>
							
						<div class="col-sm-6 col-md-3">
							<form method="post" action="<?php echo base_url() ?>user/agen/dashboard/tambahkeranjang" >
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-7">
											<div class="icon-big text-center">
												<i class="flaticon-chart-pie text-warning"></i>
											</div>
										</div>
										<div class="col-5 col-stats">
											<div class="numbers">
												<h4 class="card-title"><?php echo $key->nama_barang?></h4>
												<input type="text" name="id_barang" id="id_barang" readonly="readonly" value="<?php echo $key->id_barang ?>" hidden="hidden">
												<input type="text" name="nama_barang" id="nama_barang" readonly="readonly" value="<?php echo $key->nama_barang ?>" hidden="hidden">
											</div>
										</div>
									<!-- </div> -->
									<!-- <div class="row"> -->
		                                <div class="col-md-7">
		                                	<input type="text" name="harga" id="harga" value="<?php echo 'Rp '.number_format($key->hrg_grosir1);?>" class="qty form-control" readonly>
		                                </div>
		                                <div class="col-md-5">
		                                    <input type="number" name="qty" id="qty" value="1" class="qty form-control">
		                                </div>
		                            </div>
								</div>
								<div class="card-footer">
									<div class="col-md-10 ml-auto mr-auto">
										<button class="add_cart btn btn-primary btn-md btn-round">Add To Cart</button>
									</div>
								</div>
							</div>
							</form>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<?php $this->load->view('_partial/foot') ?>
		</div>
		<?php $this->load->view("_partial/script") ?>
	</body>
	</html>

					