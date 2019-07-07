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
									<span class="user-level"><?php echo $this->session->userdata("jabatan");?></span>
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
					<ul class="nav nav-primary" id="nav-primary">
						<li class="nav-item <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>">
							<a class="" href="<?php echo base_url('owner/dashboard') ?>">
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
						<li class="nav-item <?php if($this->uri->segment(2)=="user"){echo "active";}?>">
							<a class="" data-toggle="collapse"  href="#user">
								<i class="fas fa-user"></i>
								<p>User</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="user">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url('owner/user') ?>">
											<span class="sub-item">Data User</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('owner/user/pegawai') ?>">
											<span class="sub-item">Data Pegawai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?php if($this->uri->segment(2)=="laporan"){echo "active";}?>">
							<a class="" href="#laporan" data-toggle="collapse">
								<i class="fas fa-clipboard-list"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="laporan">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?php echo base_url("owner/laporan/laporanharian") ?>">
											<span class="sub-item">Laporan Harian</span>
										</a>
										<a href="<?php echo base_url("owner/laporan/laporanbulanan") ?>">
											<span class="sub-item">Laporan Bulanan</span>
										</a>
										<a href="<?php echo base_url("owner/laporan/laporanhutang") ?>">
											<span class="sub-item">Laporan Hutang</span>
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
