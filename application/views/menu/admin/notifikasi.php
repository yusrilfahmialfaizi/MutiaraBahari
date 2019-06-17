		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Notifikasi</h4>
						<?php $this->load->view("_partial/breadcrumbs") ?>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Tambah Notifikasi</div>
									<div class="card-category">
										Memberikan notifikasi atau pemberitahuan kepada pelanggan 
										<!-- <a class="link" href="https://bootstrap-notify.remabledesigns.com/">Bootstrap Notify</a> -->
									</div>
								</div>
								<div class="card-body">
									<form method="post" action="<?php echo base_url() ?>admin/notifikasi/tambahNotif">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Subject</label>
												<input type="text" name="subject" id="subject" class="form-control form-control-md" required="required" hidden="hidden">
												<select class="form-control form-control-xl" id="nama_pelanggan" name="nama_pelanggan" required="required">
													<option value="0">&nbsp;</option>
													<?php 
														foreach ($user as $key) {
													?>
													<option><?php echo $key->nama; ?>   <?php //echo $key->alamat ?></option>
													<?php 	
														}
													?>
												</select>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Judul</label>
												<input type="text" name="judul" id="judul" class="form-control form-control-md" required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Isi</label>
												<textarea class="form-control" id="notif" name="notif"></textarea>
											</div>
										</div>
										<div class="col-sm-3 ml-auto">
											<div class="form-group">
												<input type="submit" class="btn btn-primary btn-md" name="tambah" id="tambah" value="Push">
											</div>
										</div>
									</form>
									<div class="form">
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Placement :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<select class="form-control input-fixed" id="notify_placement_from">
													<option value="top">Top</option>
													<option value="bottom">Bottom</option>
												</select>
												<select class="form-control input-fixed" id="notify_placement_align">
													<option value="left">Left</option>
													<option value="right" selected="">Right</option>
													<option value="center">Center</option>
												</select>
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>State :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<select class="form-control input-fixed" id="notify_state">
													<option value="default">Default</option>
													<option value="primary">Primary</option>
													<option value="secondary">Secondary</option>
													<option value="info">Info</option>
													<option value="success">Success</option>
													<option value="warning">Warning</option>
													<option value="danger">Danger</option>
												</select>
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Style :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<select class="form-control input-fixed" id="notify_style">
													<option value="plain">Plain</option>
													<option value="withicon">With Icon</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="form">
										<div class="form-group from-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-12">

											</div>
											<div class="col-lg-4 col-md-9 col-sm-12">
												<button id="displayNotif" class="btn btn-success">Display</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view("_partial/foot") ?>
		</div>
		<?php $this->load->view("_partial/scripttableagen") ?>
		<script type="text/javascript">
			$("#nama_pelanggan").select2({
				placeholder: "Pilih Pelanggan",
				allowClear: true,
				minimumInputLength : 2
			});
			$(document).ready(function(){
				$("#nama_pelanggan").on("change", function(){
					var nama = $("#nama_pelanggan").val();
					// window.alert(nama);
					$.ajax({
						url 		:"<?php echo base_url("admin/notifikasi/getPelanggan") ?>",
						type 		:"POST",
						dataType 	:"JSON",
						data 		: {nama : nama},
						cache		: false,
						success 	: function(data){
							$.each(data,function(id_user){
								$("#subject").val(data.id_user);
							})
						}
					});
				});
			});
		</script>
	</div>
</body>
</html>