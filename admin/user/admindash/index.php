<?php include '__settings.php'; //include settings ?>
<?php require_once('../../../lib/base64encrypted.php'); ?>
<?php define('Index', TRUE); ?>
<?php $alert = 0; ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Halaman Admin" />
	<meta name="author" content="Devandi Kurnia Restu Andika" />
	<title>Dashboard</title>
	<!-- icons -->
	<link href="../../../assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/plugins/summernote/summernote.css" rel="stylesheet">
	<link href="../../../assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
        media="screen">
    <link href="../../../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" media="screen">
	<!-- morris chart -->
	<link href="../../../assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../../../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../../../assets/css/material_style.css">
	<!-- data tables -->
	<link href="../../../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
		type="text/css" />
	<!-- animation -->
	<link href="../../../assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- Template Styles -->
	<link href="../../../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="../../../assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" />
	<!--tagsinput-->
    <link href="../../../assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="../../../assets/plugins/flatpicker/flatpickr.min.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="../../../img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="index.php?halaman=beranda">
						<img alt="" src="../../../img/logos/logos.png">
						<span class="logo-default">CowSpe</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
				<form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Cari..." name="query">
						<span class="input-group-btn search-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form>
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<!-- start notification dropdown -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-bell-o"></i>
								<span class="badge headerBadgeColor1"> 6 </span>
							</a>
							<ul class="dropdown-menu animated swing">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
									<span class="notification-label purple-bgcolor">New 6</span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-check"></i></span> Congratulations!. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
													<b>John Micle </b>is now following you. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">7 mins</span>
												<span class="details">
													<span class="notification-icon circle blue-bgcolor"><i
															class="fa fa-comments-o"></i></span>
													<b>Sneha Jogi </b>sent you a message. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">12 mins</span>
												<span class="details">
													<span class="notification-icon circle pink"><i
															class="fa fa-heart"></i></span>
													<b>Ravi Patel </b>like your photo. </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">15 mins</span>
												<span class="details">
													<span class="notification-icon circle yellow"><i
															class="fa fa-warning"></i></span> Warning! </span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">10 hrs</span>
												<span class="details">
													<span class="notification-icon circle red"><i
															class="fa fa-times"></i></span> Application error. </span>
											</a>
										</li>
									</ul>
									<div class="dropdown-menu-footer">
										<a href="index.php?halaman=beranda"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>
						<!-- end notification dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<img alt="" class="img-circle" src="../../../img/dp/<?php $fotofunc->Foto(); ?>" />
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default animated jello">
								<li>
									<a href="index.php?halaman=profil-pengguna">
										<i class="icon-user"></i> Profil </a>
								</li>
								<li>
									<a href="#">
										<i class="icon-settings"></i> Settings
									</a>
								</li>
								<li>
									<a href="index.php?halaman=beranda">
										<i class="icon-directions"></i> Help
									</a>
								</li>
								<li class="divider"> </li>
								<li>
									<a href="#">
										<i class="icon-lock"></i> Lock
									</a>
								</li>
								<li>
									<a href="index.php?halaman=log-keluar">
										<i class="icon-logout"></i> Log Keluar </a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll">
						<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
							data-slide-speed="200">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="user-panel">
									<div class="row">
										<div class="sidebar-userpic">
											<img src="../../../img/dp/<?php $fotofunc->Foto(); ?>" class="img-responsive" alt=""> </div>
									</div>
									<div class="profile-usertitle">
										<div class="sidebar-userpic-name"> <?=$_SESSION['username'];?> </div>
										<div class="profile-usertitle-job"> <?php $ktpfunc->Ktp(); ?> </div>
									</div>
								</div>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">dashboard</i>
									<span class="title">Dasbor Utama</span>
								</a>
							</li><li class="nav-item">
								<a href="index.php?halaman=staff" class="nav-link nav-toggle"> <i class="material-icons">group</i>
									<span class="title">Staff</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=members" class="nav-link nav-toggle"> <i class="material-icons">account_circle</i>
									<span class="title">Pelanggan</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">restaurant_menu</i>
									<span class="title">Produk</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">attach_money</i>
									<span class="title">Keuangan</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i class="material-icons">business_center</i>
									<span class="title">Pemesanan</span>
									<span class="arrow "></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="#" class="nav-link"> Ruangan </a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link"> Produk </a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i class="material-icons">vpn_key</i>
									<span class="title">Manajemen</span>
									<span class="arrow "></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="#" class="nav-link"> Penjadwalan </a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link"> Lokasi </a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link"> Ruangan </a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link nav-toggle">
									<i class="material-icons">account_balance_wallet</i>
									<span class="title">E-Pay</span>
									<span class="arrow "></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="index.php?halaman=epay" class="nav-link"> Dasbor </a>
									</li>
									<li class="nav-item">
										<a href="index.php?halaman=epay" class="nav-link"> Akun </a>
									</li>
									<li class="nav-item">
										<a href="javascript:;" class="nav-link nav-toggle"> Kredit
											<span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li class="nav-item">
												<a href="#" class="nav-link"> Top Up</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link"> Pengembalian</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a href="javascript:;" class="nav-link nav-toggle"> Riwayat
											<span class="arrow"></span>
										</a>
										<ul class="sub-menu">
											<li class="nav-item">
												<a href="#" class="nav-link"> Transaksi Pemasukan</a>
											</li>
											<li class="nav-item">
												<a href="#" class="nav-link"> Transaksi Pengeluaran</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a href="index.php?halaman=epay" class="nav-link"> Penarikan </a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">inbox</i>
									<span class="title">Pertanyaan</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">feedback</i>
									<span class="title">Umpan Balik</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="index.php?halaman=beranda" class="nav-link nav-toggle"> <i class="material-icons">settings</i>
									<span class="title">Pengaturan</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
				<!-- inikonten -->
				<?php
					if(isset($_GET["halaman"])){
						if($_GET["halaman"] == "profil-pengguna"){
							include '__user-profile.php';
						}
						elseif($_GET["halaman"] == "beranda"){
							include '__home.php';
						}
						elseif($_GET["halaman"] == "staff"){
							include '_staff/__index.php';
						}
						elseif($_GET["halaman"] == "staff-tambah"){
							include '_staff/__tambah.php';
						}
						elseif($_GET["halaman"] == "staff-edit"){
							include '_staff/__edit.php';
						}
						elseif($_GET["halaman"] == "staff-hapus"){
							include '_staff/__hapus.php';
						}
						elseif($_GET["halaman"] == "staff-ok"){
							include '_staff/__hapus-confirm.php';
						}
						elseif($_GET["halaman"] == "members"){
							include '_members/__index.php';
						}
						elseif($_GET["halaman"] == "members-tambah"){
							include '_members/__tambah.php';
						}
						elseif($_GET["halaman"] == "members-edit"){
							include '_members/__edit.php';
						}
						elseif($_GET["halaman"] == "members-hapus"){
							include '_members/__hapus.php';
						}
						elseif($_GET["halaman"] == "members-ok"){
							include '_members/__hapus-confirm.php';
						}
						elseif($_GET["halaman"] == "members-kunci"){
							include '_members/__locked.php';
						}
						elseif($_GET["halaman"] == "tutup-akun"){
							include '__locked.php';
						}
						elseif($_GET["halaman"] == "epay"){
							include '_epay/__index.php';
						}
						elseif($_GET["halaman"] == "log-keluar"){
							echo "<script>location='../../includes/logout.php';</script>";
						}
					}
					else{
						include '__home.php';
					}
				?>
				</div>
			</div>
			<!-- end page content -->
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; CowSpe merupakan proyek milik
				<a href="htpps://vandi.id" target="_top" class="makerCss">Devandi Kurnia Restu Andika</a>
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="../../../assets/plugins/jquery/jquery.min.js"></script>
	<script src="../../../assets/plugins/popper/popper.min.js"></script>
	<script src="../../../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap -->
	<script src="../../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="../../../assets/js/pages/sparkline/sparkline-data.js"></script>
	<script src="../../../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="../../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="../../../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js"></script>
    <script src="../../../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="../../../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js"></script>
	<!-- Common js-->
	<script src="../../../assets/js/app.js"></script>
	<script src="../../../assets/js/layout.js"></script>
	<script src="../../../assets/js/theme-color.js"></script>
	<!-- data tables -->
	<script src="../../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../../../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="../../../assets/js/pages/table/table_data.js"></script>
	<!-- material -->
	<script src="../../../assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="../../../assets/js/pages/ui/animations.js"></script>
	<!-- morris chart -->
	<script src="../../../assets/plugins/morris/morris.min.js"></script>
	<script src="../../../assets/plugins/morris/raphael-min.js"></script>
	<script src="../../../assets/js/pages/chart/morris/morris_home_data.js"></script>
	<!--tags input-->
    <script src="../../../assets/plugins/jquery-tags-input/jquery-tags-input.js"></script>
    <script src="../../../assets/plugins/jquery-tags-input/jquery-tags-input-init.js"></script>
	<!-- date and time 	 -->
	<script src="../../../assets/plugins/flatpicker/flatpickr.min.js"></script>
	<script src="../../../assets/js/pages/datetime/datetime-data.js"></script>
	<!-- end js include path -->
</body>

</html>