		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- Card -->
					<div class="page-header">
						<h4 class="page-title">Notifikasi</h4>
						<?php $this->load->view('_partial/breadcrumbs') ?>
					</div>
					<!-- Card With Icon States Color -->
					<div class="row">
						<?php foreach ($notif as $key): ?>
							
						<div class="col-sm-4">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-md-4 ml-auto mr-auto">
											<div class="form-group">
												<h4 class="card-title"><?php echo $key->judul?></h4>
											</div>
										</div>
										<div class="col-md-12 ml-auto mr-auto">
											<div class="form-group">
												<p><?php echo $key->isi ?></p>
											</div>
										</div>
										<div class="col-md-12 ml-auto mr-auto">
											<div class="form-group">
												<p><?php echo $key->waktu?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
				<?php $this->load->view('_partial/foot') ?>
			</div>
				<?php $this->load->view('_partial/scripttableagen') ?>
		</body>
		</html>

					