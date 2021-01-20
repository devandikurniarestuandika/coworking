<?php include '__settings.php'; //include settings ?>
<?php require_once('../../../lib/base64encrypted.php'); ?>
<?php define('Index', TRUE); ?>
<?php $alert = 0; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N63MS48');</script>
    <!-- End Google Tag Manager -->
    <title>Cowspe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../../../fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="../../../fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="../../../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="../../../css/bootstrap-datepicker.min.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="../../../css/skins/blue-light-2.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../../../img/favicon.ico" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="../../../css/ie10-viewport-bug-workaround.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script  src="../../../js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script  src="../../../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script  src="../../../js/html5shiv.min.js"></script>
    <script  src="../../../js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="../../../../www.googletagmanager.com/ns4613.html?id=GTM-N63MS48"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>


<!-- Top header start -->
<header class="top-header top-header-3 hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="list-inline">
                    <a href="tel:6285377376906"><i class="fa fa-phone"></i>Butuh Bantuan? +62853-7737-6906</a>
                    <a href="tel:cs@vandiku.com"><i class="fa fa-envelope"></i>cs@vandiku.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                <ul class="social-list clearfix pull-right">
                    <li>
                        <a href="https://facebook.com/drdevandi" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/drdevandi" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/drdevandi" class="rss">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?halaman=log-keluar" class="sign-in"><i class="fa fa-power-off"></i> Log Keluar </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header main-header-4">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="logo">
                    <img src="../../../img/logos/logo.png" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="index.php?halaman=beranda">Beranda</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?halaman=ruangan">Ruangan</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?halaman=lokasi">Lokasi</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.php?halaman=pertanyaan">Pertanyaan</a>
                    </li>
                    <li class="dropdown">
                        <a href="https://www.vandi.id/p/tentang.html">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                    <li>
                        <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="#"><?=$_SESSION['email'];?></a>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <!-- /.container -->
        </nav>
    </div>
</header>
<!-- Main header end -->

<?php
					if(isset($_GET["halaman"])){
						if($_GET["halaman"] == "beranda"){
							include 'home.php';
                        } elseif ($_GET["halaman"] == "pertanyaan") {
                            include 'pertanyaan.php';
                        } elseif ($_GET["halaman"] == "lokasi") {
                            include 'lokasi.php';
                        } elseif ($_GET["halaman"] == "ruangan") {
                            include 'ruangan.php';
                        }
                        //Log Keluar
						elseif($_GET["halaman"] == "log-keluar"){
							echo "<script>location='../../includes/logout.php';</script>";
                        }
                        else {
                            include 'home.php';
                        }
                    }
                ?>

<!-- Footer start -->
<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="../../../img/logos/white-logo.png" alt="white-logo">
                            </a>
                        </div>
                        <p>CowSpe merupakan layanan reservasi ruang kerja bersama. Cowspe hadir sebagai wadah kegiatan usaha secara online. Website CowSpe merupakan ide dari Devandi Kurnia Restu Andika sebagai tugas untuk memenuhi tugas UAS dari mata pelajaran Tugas Proyek Pemrogramman dan Tugas Proyek E-Commerce.</p>
                    </div>
                </div>
                <!-- Contact Us -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Hubungi Kami</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                Alamat: Jl. Manggis (Sebelah Amikom), Sleman, DIY.
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email:<a href="mailto:cs@vandiku.com">cs@vandiku.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                Telepon: <a href="tel:6285377376906">+62 853-7737-6906</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="social-list">
                            <li><a href="https://facebook.com/drdevandi" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://twitter.com/drdevandi" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://instagram.com/drdevandi" class="rss-bg"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Gallery -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item gallery">
                        <div class="main-title-2">
                            <h1>Galeri</h1>
                        </div>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img-2.jpg" alt="small-img-2">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img-4.jpg" alt="small-img-4">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img-5.jpg" alt="small-img-5">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img-3.jpg" alt="small-img-3">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img-6.jpg" alt="small-img-6">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="../../../img/room/small-img.jpg" alt="small-img">
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Newsletter -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item newsletter">
                        <div class="main-title-2">
                            <h1>Buletin</h1>
                        </div>
                        <div class="newsletter-inner">
                            <p>Dapatkan penawaran terbaik dari kami dengan berlangganan buletin secara gratis.</p>
                            <form action="#" method="GET">
                                <p><input type="text" class="form-contact" name="email" placeholder="Masukkan Email Anda"></p>
                                <p><button type="submit" name="buletin" class="btn btn-small">
                                    Daftar
                                </button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Copy right start -->
<div class="copy-right">
    <div class="container">
          2020 &copy; CowSpe merupakan proyek milik <a href="https://www.vandi.id" target="_blank">Devandi Kurnia Restu Andika</a>
    </div>
</div>
<!-- Copy end right-->

<script  src="../../../js/jquery-2.2.0.min.js"></script>
<script  src="../../../js/bootstrap.min.js"></script>
<script  src="../../../js/bootstrap-submenu.js"></script>
<script  src="../../../js/jquery.mb.YTPlayer.js"></script>
<script  src="../../../js/wow.min.js"></script>
<script  src="../../../js/bootstrap-select.min.js"></script>
<script  src="../../../js/jquery.easing.1.3.js"></script>
<script  src="../../../js/jquery.scrollUp.js"></script>
<script  src="../../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="../../../js/jquery.filterizr.js"></script>
<script  src="../../../js/bootstrap-datepicker.min.js"></script>
<script  src="../../../js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="../../../js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->

</body>
</html>
