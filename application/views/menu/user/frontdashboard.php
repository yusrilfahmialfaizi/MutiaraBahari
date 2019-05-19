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
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-chart-pie text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<h4 class="card-title"><?php echo $key->merek?></h4>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="col-md-6 ml-auto mr-auto">
										<a href="<?php echo base_url() ?>user/agen/dashboard/<?php echo $key->merek ?>" class="btn btn-primary btn-border btn-round btn-md">Lihat</a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

					