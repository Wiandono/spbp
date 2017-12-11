<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(isset($bookSuccess)) {
	if ($bookSuccess == true) {
		echo "
			<script>
				alert('Transaksi kamu sudah masuk kedalam sistem kami, silahkan tunggu kabar selanjutnya');
			</script>
		";
	} else {
		echo "
			<script>
				alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
			</script>
		";
	}
}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<title>Alexandria - Home</title>

		<!-- Font Awesome v5 -->
		<link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- Material Design Bootstrap -->
		<link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet">

		<style rel="stylesheet">
			/* TEMPLATE STYLES */
			/* Necessary for full page carousel*/

			html,
			body {
				height: 100%;
				background-color: #f2f2f2;
			}
			/* Navigation*/

			.navbar {
				background-color: transparent;
			}

			.top-nav-collapse {
				background-color: #6D7993;
			}

			footer.page-footer {
				background-color: #6D7993;
			}

			section {
				padding: 5rem 0
			}

			.section-heading {
				margin-top: 0
			}

			.scrolling-navbar {
				-webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
				-moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
				transition: background .5s ease-in-out, padding .5s ease-in-out;
			}
			/* Carousel*/

			.carousel {
				height: 50%;
			}

			.carousel-item {
				height: 100%;
			}

			.carousel-inner {
				height: 100%;
			}
			/*Caption*/

			.flex-center {
				color: #fff;
			}

			.navbar .btn-group .dropdown-menu a:hover {
				color: #000 !important;
			}

			.navbar .btn-group .dropdown-menu a:active {
				color: #fff !important;
			}

			@media (max-width: 768px) {
				.navbar {
					background-color: #6D7993;
				}
			}

		</style>

	</head>

	<body>

		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url() ?>">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url() ?>index.php/catalogue">Catalogue</a>
						</li>
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a>
						</li>
						<?php 
							if (isset($_SESSION['logged_in'])) {
								echo "
									<li class='nav-item'>
										<a class='nav-link' data-toggle='modal' data-target='#modalDonateForm'>Donate</a>
									</li>
								";
							}
						?>
					</ul>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
					</form>
					<?php 
						if (isset($_SESSION['logged_in'])) {

							echo "
								<ul class='navbar-nav'>
									<li class='nav-item'>
										<a class='nav-link' data-toggle='modal' data-target='#modalLoginAvatar'>". $_SESSION['nickname'] ."</a>
									</li>
								</ul>
							";
						}
					?>
				</div>
			</div>
		</nav>
		<!--/.Navbar-->

		<!--Carousel Wrapper-->
		<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">

			<!--Slides-->
			<div class="carousel-inner" role="listbox">

				<div class="carousel-item active hm-black-light" style="background-image: url('<?php echo base_url() ?>assets/img/header1.jpeg'); background-repeat: no-repeat; background-size: cover;">
					<!-- Caption -->
					<div class="full-bg-img flex-center white-text">
						<ul class="col-md-12">
							<li>
								<h1 class="h1-responsive">While you may be too busy to find a book in our library</h1>
							</li>
							<li>
								<p>We’ve provide a way to bring you closer into the perfect book you need.</p>
							</li>
							<?php 
								if (empty($_SESSION['logged_in'])) {
									echo "
										<li>
											<a class='btn btn-elegant' data-toggle='modal' data-target='#modalLoginForm'>Login</a>
										</li>
									";
								}
							?>
						</ul>
					</div>
					<!-- /.Caption -->
				</div>

				<div class="carousel-item hm-black-light" style="background-image: url('<?php echo base_url() ?>assets/img/header2.jpeg'); background-repeat: no-repeat; background-size: cover;">
					<!-- Caption -->
					<div class="full-bg-img flex-center white-text">
						<ul class="col-md-12">
							<li>
								<h1 class="h1-responsive">Your memories and stories all in one place</h1>
							</li>
							<li>
								<p>We believe that everybody has the right to read a book suited for them, Start now!</p>
							</li>
							<?php 
								if (empty($_SESSION['logged_in'])) {
									echo "
										<li>
											<a class='btn btn-elegant' data-toggle='modal' data-target='#modalRegisterForm'>Sign Up</a>
										</li>
									";
								}
							?>
							
						</ul>
					</div>
					<!-- /.Caption -->
				</div>
			</div>
			<!--/.Slides-->

			<!--Controls-->
			<a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			<!--/.Controls-->
		</div>
		<!--/.Carousel Wrapper-->

		<?php 
			if (isset($_SESSION['logged_in'])) {
				echo form_open('control_user/editProfile/'. $_SESSION['logged_in']);
			} else {
				echo form_open('control_user/editProfile/');
			}

			if(isset($editProfileSuccess)) {
				if ($editProfileSuccess == true) {
					echo "
						<script>
							alert('Profile edited successfully!');
						</script>
					";
				} else {
					echo "
						<script>
							alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
						</script>
					";
				}
			}
		?>
	
		<!--Modal: Login with Avatar Form-->
		<div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
				<!--Content-->
				<div class="modal-content">

					<!--Header-->
					<div class="modal-header">
						<img src="<?php echo base_url() ?>assets/img/avatar.gif" alt="avatar" class="rounded-circle img-responsive">
					</div>
					<!--Body-->
					<div class="modal-body text-center mb-1">

						<h5 class="mt-1 mb-3">
							<?php
								if (isset($_SESSION['nickname'])) {
									echo $_SESSION['nickname'];
								}
							?>
						</h5>

						<div class="md-form ml-0 mr-0">
							<input id="editNickname" class="form-control ml-0" name="nickname" type="text" required>
							<label for="editNickname" class="ml-0">Nickname</label>
						</div>
						<div class="md-form ml-0 mr-0">
							<input id="oldPassword" class="form-control ml-0" name="oldPassword" type="password" required>
							<label for="oldPassword" class="ml-0">Old Password</label>
						</div>
						<div class="md-form ml-0 mr-0">
							<input id="newPassword" class="form-control ml-0" name="newPassword" type="password" required>
							<label for="newPassword" class="ml-0">New Password</label>
						</div>

						<div class="text-center">
							<input class="btn btn-elegant mt-1" type="submit" value="Save" name="submit"/>
							<a class="btn btn-elegant mt-1" href="<?php echo base_url(); ?>index.php/logout">Logout <i class="fas fa-sign-out-alt ml-1"></i></a>
						</div>
					</div>

				</div>
				<!--/.Content-->
			</div>
		</div>
		<!--Modal: Login with Avatar Form-->

		<?php echo form_close(); ?>

		<?php 
			echo form_open('control_user/signUp'); 

			if(isset($signUpSuccess)) {
				if ($signUpSuccess == true) {
					echo "
						<script>
							alert('Thanks for joining us and welcome to Alexandria!');
						</script>
					";
				} else {
					echo "
						<script>
							alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
						</script>
					";
				}
			}
		?>
		
		<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-bold">Sign up</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="md-form">
							<i class="fa fa-user prefix grey-text"></i>
							<input id="orangeForm-name" class="form-control" name="nickname" type="text" required>
							<label for="orangeForm-name">Nama Lengkap</label>
						</div>
						<div class="md-form">
							<i class="fa fa-user prefix grey-text"></i>
							<input id="orangeForm-username" class="form-control" name="username" type="text" required>
							<label for="orangeForm-username">Username</label>
						</div>
						<div class="md-form">
							<i class="fas fa-key prefix grey-text"></i>
							<input id="orangeForm-pass" class="form-control" name="password" type="password" required>
							<label for="orangeForm-email">Password</label>
						</div>

						<div class="md-form">
							<i class="fas fa-key prefix grey-text"></i>
							<input id="orangeForm-passConfirm" class="form-control" name="confirmPassword" type="password" required>
							<label for="orangeForm-passConfirm">Confirm password</label>
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<input class="btn btn-elegant" type="submit" value="Sign Up" name="submit"/>
					</div>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>

		<?php 
			echo form_open('control_user/login'); 

			if(isset($loginSuccess)) {
				if ($loginSuccess == false) {
					echo "
						<script>
							alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
						</script>
					";
				}
			}
		?>

		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-bold">Login</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="md-form">
							<i class="fa fa-user prefix grey-text"></i>
							<input id="defaultForm-username" class="form-control" name="username" type="text" required>
							<label for="defaultForm-username">Username</label>
						</div>

						<div class="md-form">
							<i class="fas fa-key prefix grey-text"></i>
							<input id="defaultForm-pass" class="form-control" name="password" type="password" required>
							<label for="defaultForm-pass">Password</label>
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
					<input class="btn btn-elegant" type="submit" value="Login" name="submit"/>
					</div>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>

		<?php 
			echo form_open_multipart('control_user/donate');

			if(isset($donateSuccess)) {
				if ($donateSuccess == false) {
					echo "
						<script>
							alert('". $error_message . str_replace(array("\r", "\n"), '\n', strip_tags(validation_errors())) ."');
						</script>
					";
				} else {
					echo "
						<script>
							alert('Terimakasih atas kontribusi yang anda berikan, harap tunggu konfirmasi kami selanjutnya');
						</script>
					";
				}
			}
		?>

		<div class="modal fade" id="modalDonateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-bold">Donate</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="row">
							<div class="col md-form">
								<i class="fa fa-user prefix grey-text"></i>
								<input id="defaultForm-username" class="form-control" name="username" type="text" placeholder="Username" disabled value="<?php echo $_SESSION['logged_in'] ?>">
							</div>

							<div class="col md-form">
								<i class="fa fa-book prefix grey-text"></i>
								<input id="defaultForm-title" class="form-control" name="title" type="text" placeholder="Book Title">
							</div>
						</div>

						<div class="row">
							<div class="col md-form">
								<i class="fas fa-bookmark prefix grey-text"></i>
								<input id="defaultForm-isbn" class="form-control" name="isbn" type="number" placeholder="ISBN">
							</div>

							<div class="col md-form">
								<i class="fas fa-list-ul prefix grey-text"></i>
								<input id="defaultForm-category" class="form-control" name="category" type="text" placeholder="Category">
							</div>
						</div>

						<div class="row">
							<div class="col md-form">
								<i class="fa fa-language prefix grey-text"></i>
								<input id="defaultForm-language" class="form-control" name="language" type="text" placeholder="Language">
							</div>

							<div class="col md-form">
								<i class="fa fa-pencil prefix grey-text"></i>
								<input id="defaultForm-penulis" class="form-control" name="penulis" type="text" placeholder="Author">
							</div>
						</div>

						<div class="row">
							<div class="col md-form">
								<i class="fa fa-paper-plane prefix grey-text"></i>
								<input id="defaultForm-penerbit" class="form-control" name="penerbit" type="text" placeholder="Publisher">
							</div>

							<div class="col md-form">
								<i class="fas fa-calendar prefix grey-text"></i>
								<input id="defaultForm-tanggal" class="form-control" name="tanggal" type="text" placeholder="YYYY-MM-DD">
							</div>
						</div>

						<div class="row">
							<div class="col md-form">
								<i class="fa fa-list-ol prefix grey-text"></i>
								<input id="defaultForm-halaman" class="form-control" name="halaman" type="number" placeholder="Total Pages">
							</div>

							<div class="col md-form">
								<i class="fa fa-bars prefix grey-text"></i>
								<input id="defaultForm-deskripsi" class="form-control" name="deskripsi" type="text" placeholder="Description"></input>
							</div>
						</div>

						<div class="md-form">
							<i class="fas fa-images prefix grey-text"></i>
							<input name="file" type="file">
						</div>

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<input class="btn btn-elegant" type="submit" value="Submit" name="submit"/>
						<button class="btn btn-elegant" data-dismiss="modal" aria-label="Close">Cancel</button>
					</div>
				</div>
			</div>
		</div>

		<?php echo form_close(); ?>

		<!--Content-->
		<div class="container">
			<div class="divider-new">
				<h2 class="h2-responsive">Latest Books</h2>
			</div>

			<div class="row my-5 justify-content-center">
				<!--First columnn-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center mb-4">
					<img src="<?php echo base_url() ?>assets/img/cover/seoul.jpg" alt="placeholder" class="img-responsive mb-4" height="300px">
					<button class="btn btn-outline-elegant">Check Out</button>
				</div>

				<!--First columnn-->

				<!--Second columnn-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center mb-4">
					<img src="<?php echo base_url() ?>assets/img/cover/pizza.jpg" alt="placeholder" class="img-responsive mb-4" height="300px">
					<button class="btn btn-outline-elegant">Check Out</button>
				</div>
				<!--Second columnn-->

				<!--Third columnn-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center mb-4">
					<img src="<?php echo base_url() ?>assets/img/cover/20.jpg" alt="placeholder" class="img-responsive mb-4" height="300px">
					<button class="btn btn-outline-elegant">Check Out</button>
				</div>
				<!--Third columnn-->

				<!--Fourth columnn-->
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 text-center mb-4">
					<img src="<?php echo base_url() ?>assets/img/cover/9.jpg" alt="placeholder" class="img-responsive mb-4" height="300px">
					<button class="btn btn-outline-elegant">Check Out</button>
				</div>
				<!--Fourth columnn-->
			</div>
		</div>
		<!--/.Content-->

		<!--Footer-->
		<footer class="page-footer center-on-small-only">

			<!--Footer Links-->
			<section id="contact">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8 mx-auto text-center">
							<h2 class="section-heading">Let's Get In Touch!</h2>
							<hr class="my-4">
							<p class="mb-5">Ready to book your next book with us? That's great! Give us a call or send us an email and we will get back to you
								as soon as possible!</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 ml-auto text-center">
							<i class="fas fa-phone fa-3x mb-3"></i>
							<p>+62-811-167-8036</p>
						</div>
						<div class="col-lg-4 mr-auto text-center">
							<i class="fas fa-envelope fa-3x mb-3"></i>
							<p>
								<a href="mailto:book@spbp.com">book@spbp.com</a>
							</p>
						</div>
					</div>
				</div>
			</section>
			<!--/.Footer Links-->

			<!--Copyright-->
			<div class="footer-copyright">
				<div class="container-fluid">
					© 2017 Copyright:
					<a href="#"> Alexandria </a>

				</div>
			</div>
			<!--/.Copyright-->

		</footer>
		<!--/.Footer-->

		<!-- SCRIPTS -->

		<!-- JQuery -->
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap dropdown -->
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>

		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/mdb.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/jquery-easing/jquery.easing.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/scrollreveal/scrollreveal.min.js"></script>

		<!-- Font Awesome v5 -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.0/js/v4-shims.js"></script>

		<!-- Custom scripts for this template -->
		<script src="<?php echo base_url() ?>assets/js/creative.js"></script>

		<script>
			new WOW().init();

		</script>

	</body>

	</html>
