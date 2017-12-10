<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Alexandria - Catalogue</title>

    <!-- Font Awesome v5 -->
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        body {
            background-color: #f2f2f2;
        }

        main {
            margin-top: 6rem;
        }

        .lead {
            text-align: justify;
        }

        @media only screen and (max-width: 768px) {
            .post-title {
                margin-top: 1rem;
            }
        }

        @media only screen and (max-width: 768px) {
            .read-more {
                text-align: center;
            }
        }

        .extra-margin {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .navbar {
            background-color: #6D7993;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }

        footer.page-footer {
            background-color: #6D7993;
            margin-top: 2rem;
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url() ?>index.php/catalogue">Catalogue
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>#contact">Contact Us</a>
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
							<input type="text" id="defaultForm-usename" class="form-control" placeholder="Username">
						</div>

						<div class="col md-form">
							<i class="fa fa-book prefix grey-text"></i>
							<input type="text" id="defaultForm-title" class="form-control" placeholder="Book Title">
						</div>
					</div>

					<div class="row">
						<div class="col md-form">
							<i class="fas fa-bookmark prefix grey-text"></i>
							<input type="number" id="defaultForm-isbn" class="form-control" placeholder="ISBN">
						</div>

						<div class="col md-form">
							<i class="fas fa-list-ul prefix grey-text"></i>
							<input type="text" id="defaultForm-category" class="form-control" placeholder="Category">
						</div>
					</div>

					<div class="row">
						<div class="col md-form">
							<i class="fa fa-language prefix grey-text"></i>
							<input type="text" id="defaultForm-language" class="form-control" placeholder="Language">
						</div>

						<div class="col md-form">
							<i class="fa fa-pencil prefix grey-text"></i>
							<input type="text" id="defaultForm-penulis" class="form-control" placeholder="Author">
						</div>
					</div>

					<div class="row">
						<div class="col md-form">
							<i class="fa fa-paper-plane prefix grey-text"></i>
							<input type="text" id="defaultForm-penerbit" class="form-control" placeholder="Publisher">
						</div>

						<div class="col md-form">
							<i class="fas fa-calendar prefix grey-text"></i>
							<input type="date" id="defaultForm-tanggal" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col md-form">
							<i class="fa fa-list-ol prefix grey-text"></i>
							<input type="number" id="defaultForm-halaman" class="form-control" placeholder="Total Pages">
						</div>

						<div class="col md-form">
							<i class="fa fa-bars prefix grey-text"></i>
							<input type="text" id="defaultForm-deskripsi" class="form-control" placeholder="Description"></input>
						</div>
					</div>

					<div class="md-form">
						<i class="fas fa-images prefix grey-text"></i>
						<input type="file">
					</div>

                </div>
                
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-elegant">Submit</button>
					<button class="btn btn-elegant" data-dismiss="modal" aria-label="Close">Cancel</button>
				</div>
			</div>
		</div>
	</div>

    <main>
        <!--Main layout-->
        <div class="container">

            <!--Page heading-->
            <div class="row mb-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-12">
                    <h1 class="h1-responsive">Catalogue</h1>
                    <small class="text-muted">
                        <?php
                            if (isset($error_message)) {
                                echo $error_message;
                            }
                        ?>
                    </small>
                </div>
            </div>
            <!--/.Page heading-->

            <?php
                foreach ($result as $row) {
                    echo "
                        <div class='row mt-5 justify-content-center'>
                            <!--Featured image-->
                            <div class='col-6 col-sm-6 col-md-4 col-lg-3'>
                                <div class='view overlay hm-white-light z-depth-1-half'>
                                    <img src='". base_url() ."assets/img/cover/". $row->image ."' class='img-fluid'>
                                    <div class='mask'></div>
                                </div>
                            </div>
                            <!--/.Featured image-->
            
                            <!--Post excerpt-->
                            <div class='col-lg-9'>
                                <h2 class='h2-responsive mt-3'>". $row->judul ."</h2>
                                <p class='my-4 text-justify'>". substr($row->deskripsi, 0, 1000) ."...</p>
                                <div class='read-more'>
                                    <a href='". base_url() ."index.php/detail/". $row->isbn ."' class='btn btn-outline-elegant'>Find Out More</a>
                                </div>
                            </div>
                            <!--/.Post excerpt-->
                        </div>
                        
                        <hr class='extra-margin my-5'>
                    ";
                }
            ?>
            
        </div>
        <!--/.Main layout-->
    </main>


    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="containter-fluid">
                © 2017 Copyright:
                <a href="<?php echo base_url() ?>"> Alexandria </a>
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

    <!-- Font Awesome v5 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/v4-shims.js"></script>

    <script>
        new WOW().init();
    </script>

</body>

</html>