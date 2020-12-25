<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Tambah Data
if(isset($_POST["kirim"])) {
    $iktp = $_POST['ktp'];
    $iemail = $_POST['email'];
	$itelp = $_POST['telepon'];
    $inama = $_POST['nama'];
	$ipass = md5($_POST['password']);
	$ikelahiran = date('Y-m-d', strtotime($_POST['kelahiran']));
	$ikelamin = $_POST['kelamin'];
    $istatus = 1;

    $ambil = $conn->query("SELECT * FROM members WHERE email='$iemail'");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
        $alert = 1;
    } else {
        $conn->query("INSERT INTO members(no_ktp, email, telepon, nama, password, tgl_lahir, bio, kelamin, status) VALUES('$iktp', '$iemail', '$itelp', '$inama', '$ipass', '$ikelahiran', 'Tidak ada biografi tertulis.', '$ikelamin', '$istatus')");
        echo "<script>window.location='index.php?halaman=members';</script>";
    }
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Tambah members Baru</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=members">Pelanggan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Tambah Pelanggan</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
                    <?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Alamat email sudah terpakai.
							</div><?php
							} ?>
							<div class="card card-box">
								<div class="card-body " id="bar-parent">
                                    <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="simpleFormEmail">Nomor KTP</label>
											<input required="" pattern=".{8,}" title="Mohon masukkan minimal setidaknya 8 karakter" maxlength="20" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nomor KTP" name="ktp">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Alamat Email</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="email" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Alamat Email" name="email">
                                        </div>
										<div class="form-group">
											<label for="simpleFormEmail">Nomor Telepon</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nomor Telepon" name="telepon">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Nama Lengkap</label>
											<input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nama Lengkap" name="nama">
										</div>
										<div class="form-group">
											<label>Kelahiran</label>
											<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input required="" name="kelahiran" readonly class="form-control" size="16" type="text">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											</div>
										</div>
										<div class="form-group">
											<label>Jenis Kelamin </label>
											<div class="radio p-0">
												<input type="radio" name="kelamin" id="optionsRadios1" value="0" checked>
												<label for="optionsRadios1">Pria</label>
												<br>
												<input type="radio" name="kelamin" id="optionsRadios2" value="1">
												<label for="optionsRadios2">Wanita</label>
											</div>
										</div>
										<div class="form-group">
											<label for="simpleFormPassword">Kata Sandi</label>
											<input required="" pattern=".{6,}" title="Mohon masukkan minimal setidaknya 6 karakter" type="password" class="form-control" id="simpleFormPassword"
												placeholder="Masukkan Kata Sandi" name="password">
                                        </div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=members" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>