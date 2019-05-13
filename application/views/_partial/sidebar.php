<!-- Sidebar -->


		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url().'assets/img/profile.jpg'?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php $nama =  $this->session->userdata("nama");
									echo $nama; ?>
									<span class="user-level">Administrator</span>
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
						<li class="nav-item active">
							<a href="<?php echo base_url('admin/dashboard') ?>">
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
						<li class="nav-item">
							<a href="<?php echo base_url('admin/user') ?>">
								<i class="fas fa-user"></i>
								<p>User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/barang') ?>">
								<i class="fas fa-dolly"></i>
								<p>Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/barang') ?>">
								<i class="fas fa-bell"></i>
								<p>Notifikasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#transaksi">
								<i class="fas fa-cart-plus"></i>
								<p>Pemesanan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="transaksi">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url("admin/kasir/eceran") ?>">
											<span class="sub-item">Penjualan Eceran</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url("admin/kasir/grosir") ?>">
											<span class="sub-item">Penjualan Grosir</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="sub-item">Pesanan</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url("admin/hutang") ?>">
											<span class="sub-item">Hutang</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url().'admin/transaksi/riwayat_trans' ?>">
											<span class="sub-item">Riwayat Pesanan</span>
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
