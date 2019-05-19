		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url() ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php $nama =  $this->session->userdata("nama");
									echo $nama; ?>
									<span class="user-level"><?php $status =  $this->session->userdata("status");
									echo $status; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($this->uri->segment(3)=="dashboard"){echo "active";}?>">
							<a class="" href="<?php echo base_url('user/agen/dashboard') ?>">
								<i class="fas fa-home"></i>
								<p>Home</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Fitur</h4>
						</li>
						<li class="nav-item <?php if($this->uri->segment(3)=="diskusi"){echo "active";}?>">
							<a data-toggle="collapse" href="#message">
								<i class="fas fa-envelope"></i>
								<p>Kotak Masuk</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="message">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url("user/agen/pemesanan") ?>">
											<span class="sub-item">Diskusi Produk</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($this->uri->segment(3)=="pemesanan"){echo "active";}?>">
							<a data-toggle="collapse" href="#transaksi">
								<i class="fas fa-cart-plus"></i>
								<p>Pemesanan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="transaksi">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url("user/agen/pemesanan") ?>">
											<span class="sub-item">Pesan Barang</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url("admin/kasir/grosir") ?>">
											<span class="sub-item">Data Transaksi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->