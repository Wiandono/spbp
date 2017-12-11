<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Alexandria - Admin</title>
	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="<?php echo base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="<?php echo base_url() ?>index.php/admin">SPBP</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
		aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
					<a class="nav-link" href="<?php echo base_url() ?>index.php/admin">
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					</a>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-server"></i>
						<span class="nav-link-text">User & Book</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapseComponents">
						<li>
							<a href="<?php echo base_url() ?>index.php/admin/user">User</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/admin/books">Book</a>
						</li>
					</ul>
				</li>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
					<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
						<i class="fa fa-fw fa-shopping-cart"></i>
						<span class="nav-link-text">Transaction</span>
					</a>
					<ul class="sidenav-second-level collapse" id="collapseExamplePages">
						<li>
							<a href="<?php echo base_url() ?>index.php/admin/peminjaman">Peminjaman</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/admin/pengembalian">Pengembalian</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/admin/donasi">Donasi</a>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-fw fa-sign-out"></i>Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="content-wrapper">
		<div class="container-fluid">
			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">My Dashboard</li>
			</ol>
			<!-- Icon Cards-->
			<div class="row justify-content-center">
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="card text-white bg-primary o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-comments"></i>
							</div>
							<div class="mr-5">10 Peminjaman Belum Terverifikasi!</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>index.php/admin/peminjaman">
							<span class="float-left">Details</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="card text-white bg-warning o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-list"></i>
							</div>
							<div class="mr-5">3 Pengembalian Belum Terverifikasi!</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>index.php/admin/pengembalian">
							<span class="float-left">Details</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
				<div class="col-xl-4 col-sm-6 mb-3">
					<div class="card text-white bg-success o-hidden h-100">
						<div class="card-body">
							<div class="card-body-icon">
								<i class="fa fa-fw fa-shopping-cart"></i>
							</div>
							<div class="mr-5">9 Donasi Belum Terverifikasi!</div>
						</div>
						<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>index.php/admin/donasi">
							<span class="float-left">Details</span>
							<span class="float-right">
								<i class="fa fa-angle-right"></i>
							</span>
						</a>
					</div>
				</div>
			</div>
			<!-- Example DataTables Card-->
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i> Data Pengguna</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Nickname</th>
									<th>Username</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Nickname</th>
									<th>Username</th>
								</tr>
							</tfoot>
							<tbody>

								<?php
									if ($result != false) {
										foreach ($result as $row) {
											echo "
												<tr>
													<td>$row->username</td>
													<td>$row->nickname</td>
												</tr>
											";
										}
									}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted">Alexandria Admin</div>
			</div>
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © Alexandria 2017</small>
				</div>
			</div>
		</footer>
		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Logout Modal-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?php echo base_url() ?>index.php/admin/logout">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="<?php echo base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
		<script src="<?php echo base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url() ?>assets/admin/js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="<?php echo base_url() ?>assets/admin/js/sb-admin-datatables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/admin/js/sb-admin-charts.min.js"></script>
	</div>
</body>

</html>
