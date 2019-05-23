	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url('<?php echo base_url() ?>assets_loginUser/images/bg-01.jpg');">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo base_url() ?>user/login/aksilogin">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" id="username" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="#" class="txt1">
								Lupa password untuk pelanggan ?
							</a>
						</div>
					</div>
					<div class="row">
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					<div class="row">
						<div class="container-login100-form-btn">
							<a href="#" class="login100-form-btn">
								Register Untuk Pelanggan
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>