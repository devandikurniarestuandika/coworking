<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Ambil Data
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM users WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();

//Edit Data
if(isset($_POST["kirim"])) {
    $iktp = $_POST['ktp'];
    $iusername = $_POST['username'];
    $inama = $_POST['nama'];
    $ipass = md5($_POST['password']);
    $iperan = $_POST['peran'];

    $ambil = $conn->query("SELECT * FROM users WHERE username='$iusername'");
	$yangcocok = $ambil->num_rows;
	if ($iusername == $pecah['username']) {
		$conn->query("UPDATE users SET no_ktp='$iktp', username='$iusername', nama='$inama', password='$ipass', role='$iperan' WHERE id='$decrypt'");
        echo "<script>window.location='index.php?halaman=staff';</script>";
	} else {
		if($yangcocok == 1){
			$alert = 1;
		} else {
			$conn->query("UPDATE users SET no_ktp='$iktp', username='$iusername', nama='$inama', password='$ipass', role='$iperan' WHERE id='$decrypt'");
			echo "<script>window.location='index.php?halaman=staff';</script>";
		}
	}
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Perbarui Data <?php $pecah['nama']; ?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=staff">Staff</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Ubah Data</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
                    <?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Nama Pengguna sudah terpakai.
							</div><?php
							} ?>
							<div class="card card-box">
								<div class="card-body " id="bar-parent">
                                    <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="simpleFormEmail">Nomor KTP</label>
											<input required="" pattern=".{8,}" title="Mohon masukkan minimal setidaknya 8 karakter" maxlength="20" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['no_ktp']; ?>" name="ktp">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Nama Pengguna</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['username']; ?>" name="username">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Nama Lengkap</label>
											<input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['nama']; ?>" name="nama">
										</div>
										<div class="form-group">
											<label for="simpleFormPassword">Kata Sandi</label>
											<input required="" pattern=".{6,}" title="Mohon masukkan minimal setidaknya 6 karakter" type="password" class="form-control" id="simpleFormPassword"
												placeholder="Masukkan Kata Sandi Baru" name="password">
                                        </div>
                                        <div class="form-group">
												<label>Pilih Peran</label>
												<select class="form-control" name="peran">
												<?php if ($pecah['role'] == 0) {
													?><option value="0" selected>Staff</option><option value="1">Admin (Pemilik)</option><?php
													} else {
														?><option value="0">Staff</option><option value="1" selected>Admin (Pemilik)</option><?php
													}
												?>
												</select>
										</div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=staff" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>