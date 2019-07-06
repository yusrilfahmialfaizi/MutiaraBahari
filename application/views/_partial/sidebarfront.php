		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item <?php if($this->uri->segment(3)=="dashboard"){echo "active";}?>">
							<a class="" href="<?php echo base_url('user/login') ?>">
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
										<a href="<?php echo base_url('user/login') ?>">
											<span class="sub-item">Diskusi Produk</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('user/login') ?>">
											<span class="sub-item">Notifikasi</span>
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
										<a href="<?php echo base_url('user/login') ?>">
											<span class="sub-item">Pesan Barang</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('user/login') ?>">
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