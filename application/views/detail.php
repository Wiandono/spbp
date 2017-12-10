<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Alexandria - Book Details</title>

    <!-- Font Awesome v5 -->
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        body {
            margin-top: 7rem;
            background-color: #f2f2f2;
        }

        .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }

        .extra-margins {
            margin-top: 1rem;
            margin-bottom: 2.5rem;
        }

        .divider-new {
            margin-top: 0;
        }

        .navbar {
            background-color: #6D7993;
        }

        footer.page-footer {
            background-color: #6D7993;
        }

        .list-group-item.active {
            background-color: #2bbbad;
            border-color: #2bbbad
        }

        .list-group-item:not(.active) {
            color: #222;
        }

        .list-group-item:not(.active):hover {
            color: #666;
        }

        .card {
            font-weight: 300;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
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

    <?php echo form_open('control_user/book/'. $result[0]->isbn); ?>

    <div class="modal fade" id="modalPesanForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-bold">Konfirmasi Peminjaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="defaultForm-username" class="form-control" name="username"
                            <?php
                                if (isset($_SESSION['logged_in'])) {
                                    echo "value='". $_SESSION['logged_in'] ."'";
                                }
                            ?>
                        disabled>
                        <label for="defaultForm-username">Username</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-book prefix grey-text"></i>
                        <input type="text" id="defaultForm-title" class="form-control" name="title"
                            <?php
                                echo "value='". $result[0]->judul ."'";
                            ?>
                        disabled>
                        <label for="defaultForm-title">Judul Buku</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input class="btn btn-elegant" type="submit" value="Pesan" name="submit"/>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

    <?php echo form_open('control_user/return/'. $result[0]->isbn); ?>

    <div class="modal fade" id="modalKembaliForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-bold">Konfirmasi Pengembalian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="defaultForm-name" class="form-control" name="username"
                            <?php
                                if (isset($_SESSION['logged_in'])) {
                                    echo "value='". $_SESSION['logged_in'] ."'";
                                }
                            ?>
                        disabled>
                        <label for="defaultForm-name">Username</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-book prefix grey-text"></i>
                        <input type="text" id="defaultForm-title" class="form-control" name="title"
                            <?php
                                echo "value='". $result[0]->judul ."'";
                            ?>
                        disabled>
                        <label for="defaultForm-title">Judul Buku</label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <input class="btn btn-elegant" type="submit" value="Kembalikan" name="submit"/>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

    <!--Main layout-->
    <div class="container">
        <div class="row">

            <!--Main column-->
            <div class="col-lg-12">

                <!--First row-->
                <div class="row" data-wow-delay="0.4s">
                    <div class="col-lg-12">
                        <div class="divider-new">
                            <h2 class="h2-responsive"><?php echo $result[0]->judul ?></h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 text-center">
                                <div class="view overlay hm-zoom d-flex justify-content-center">
                                    <img src="<?php echo base_url() ?>assets/img/cover/<?php echo $result[0]->image ?>" class="img-fluid " alt="zoom">
                                    <div class="mask flex-center waves-effect waves-light"></div>
                                </div>
                                <?php 
                                    if ($transaction == false) {
                                        echo "<a class='btn btn-elegant btn-block mt-3' data-toggle='modal' data-target='#modalPesanForm'>Pesan</a>";
                                    } else if ($verified == 0) {
                                            echo "<a class='btn btn-elegant btn-block mt-3' disabled>Pending Transaction</a>";
                                    } else if ($type == "Peminjaman") {
                                        echo "<a class='btn btn-elegant btn-block mt-3' data-toggle='modal' data-target='#modalKembaliForm'>Kembalikan</a>";
                                    } else {
                                        echo "<a class='btn btn-elegant btn-block mt-3' data-toggle='modal' data-target='#modalPesanForm'>Pesan</a>";
                                    }
                                ?>
                            </div>
                            <div class="col-lg-8">
                                <br>
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <p>ISBN</p>
                                    </div>
                                    <div class="col-7 col-sm-7 col-md-8"><?php echo $result[0]->isbn ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <p>Tanggal Terbit</p>
                                    </div>
                                    <div class="col-7 col-sm-7 col-md-8"><?php echo $result[0]->tgl_terbit ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <p>Jumlah Halaman</p>
                                    </div>
                                    <div class="col-7 col-sm-7 col-md-8"><?php echo $result[0]->halaman ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <p>Kategori</p>
                                    </div>
                                    <div class="col-7 col-sm-7 col-md-8"><?php echo $result[0]->kategori ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-5 col-sm-5 col-md-4">
                                        <p>Bahasa</p>
                                    </div>
                                    <div class="col-7 col-sm-7 col-md-8"><?php echo $result[0]->bahasa ?></div>
                                </div>
                                <br>
                                <p>
                                    <span>by <?php echo $result[0]->penulis ?></span>
                                    <span class="text-muted">(<?php echo $result[0]->penerbit ?>)</span>
                                </p>
                                <br>
                                <p class="text-justify"><?php echo $result[0]->deskripsi ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
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
            <!--/.First row-->



        </div>
        <!--/.Main column-->

    </div>
    </div>
    <!--/.Main layout-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
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

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/detail.js"></script>

    <script>
        new WOW().init();
    </script>

</body>

</html>