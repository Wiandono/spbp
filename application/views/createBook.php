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
					<a class="nav-link nav-link`x-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
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
					<a href="<?php echo base_url() ?>index.php/admin">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Tambah Buku</li>
			</ol>

			<?php 
				echo form_open_multipart('control_admin/createBook');

				if(isset($createBook)) {
					if ($createBook == false) {
						echo "
							<script>
								alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
							</script>
						";
					} else {
						echo "
							<script>
								alert('Buku berhasil ditambahkan');
							</script>
						";
					}
				}
			?>

			<div class="row">
				<div class="col-12">
					<div class="form-group row">
						<label for="cover" class="col-sm-2 col-form-label offset-sm-1">Foto Cover</label>
						<div class="col-sm-8">
							<input id="cover" name="file" type="file" >
						</div>
					</div>
					<div class="form-group row">
						<label for="judulBuku" class="col-sm-2 col-form-label offset-sm-1">Judul Buku</label>
						<div class="col-sm-8">
							<input id="judulBuku" class="form-control" name="title" type="text" placeholder="Harry Potter">
						</div>
					</div>
					<div class="form-group row">
						<label for="isbn" class="col-sm-2 col-form-label offset-sm-1">ISBN</label>
						<div class="col-sm-8">
							<input id="isbn" class="form-control" name="isbn" type="number" placeholder="9786025406164">
						</div>
					</div>
					<div class="form-group row">
						<label for="kategori" class="col-sm-2 col-form-label offset-sm-1">Kategori</label>
						<div class="col-sm-8">
							<input id="kategori" class="form-control" name="category" type="text" placeholder="Kuliner">
						</div>
					</div>
					<div class="form-group row">
						<label for="bahasa" class="col-sm-2 col-form-label offset-sm-1">Bahasa</label>
						<div class="col-sm-8">
							<input id="bahasa" class="form-control" name="language" type="text" placeholder="Indonesia">
						</div>
					</div>
					<div class="form-group row">
						<label for="penulis" class="col-sm-2 col-form-label offset-sm-1">Penulis</label>
						<div class="col-sm-8">
							<input id="penulis" class="form-control" name="penulis" type="text" placeholder="Shah Rukh Khan">
						</div>
					</div>
					<div class="form-group row">
						<label for="penerbit" class="col-sm-2 col-form-label offset-sm-1">Penerbit</label>
						<div class="col-sm-8">
							<input id="penerbit" class="form-control" name="penerbit" type="text" placeholder="Gramedia">
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggalTerbit" class="col-sm-2 col-form-label offset-sm-1">Tanggal Terbit</label>
						<div class="col-sm-8">
							<input id="tanggalTerbit" class="form-control" name="tanggal" type="text" placeholder="YYYY-MM-DD">
						</div>
					</div>
					<div class="form-group row">
						<label for="halaman" class="col-sm-2 col-form-label offset-sm-1">Jumlah Halaman</label>
						<div class="col-sm-8">
							<input id="halaman" class="form-control" name="halaman" type="text" placeholder="745">
						</div>
					</div>
					<div class="form-group row">
						<label for="deskripsi" class="col-sm-2 col-form-label offset-sm-1">Deskripsi</label>
						<div class="col-sm-8">
							<textarea id="deskripsi" class="form-control" name="deskripsi" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="stock" class="col-sm-2 col-form-label offset-sm-1">Stok</label>
						<div class="col-sm-8">
							<input id="stock" class="form-control" type="number" name="stock" placeholder="12">
						</div>
					</div>
					<div class="form-group row justify-content-center">
						<input class="btn btn-primary mr-3" type="submit" value="Simpan" name="submit"/>
						<a class="btn btn-primary" href="<?php echo base_url() ?>index.php/admin/books">Cancel</a>
					</div>
				</div>
			</div>
			
			<?php echo form_close(); ?>
		
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
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url() ?>assets/admin/js/sb-admin.min.js"></script>
	</div>
</body>

</html>
