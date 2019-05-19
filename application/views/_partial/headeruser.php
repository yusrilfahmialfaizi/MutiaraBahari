<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('_partial/head.php') ?>
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<?php $this->load->view('_partial/logouser.php') ?>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php $this->load->view('_partial/navbar.php') ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php $this->load->view('_partial/sidebaruser.php') ?>
		<!-- End Sidebar -->

	
	