	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('<?php echo base_url() ?>assets_loginUser/images/bg-01.jpg');">
					<span class="login100-form-title-1">
						Register
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo base_url() ?>user/login/daftar">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Nama</span>
						<input class="input100" type="text" id="nama" name="nama" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Alamat</span>
						<input class="input100" type="text" id="alamat" name="alamat" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div><div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">No. Telepon</span>
						<input class="input100" type="number" id="no_telepon" name="no_telepon" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div><div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" id="email" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="row">
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Register
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>