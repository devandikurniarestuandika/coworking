<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Ambil Data
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM members WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();

//Edit Data
if(isset($_POST["kirim"])) {
    $iktp = $_POST['ktp'];
	$iemail = $_POST['email'];
	$itelp = $_POST['telepon'];
    $inama = $_POST['nama'];
	$ipass = md5($_POST['password']);
	$ikelahiran = date('Y-m-d', strtotime($_POST['kelahiran']));
	$ikelamin = $_POST['kelamin'];
	$iidses = $_SESSION['id'];
	$iunses = $_SESSION['username'];
	$iaksi = $iidses . "-" . $iunses;

    $ambil = $conn->query("SELECT * FROM members WHERE email='$iemail'");
	$yangcocok = $ambil->num_rows;
	if ($_POST['password'] == null) {
		if ($iemail == $pecah['email']) {
			$conn->query("UPDATE members SET no_ktp='$iktp', email='$iemail', telepon='$itelp', nama='$inama', tgl_lahir='$ikelahiran', kelamin='$ikelamin', aksi_oleh='$iaksi' WHERE id='$decrypt'");
			echo "<script>window.location='index.php?halaman=members';</script>";
		} else {
			if($yangcocok == 1){
				$alert = 1;
			} else {
				$conn->query("UPDATE members SET no_ktp='$iktp', email='$iemail', telepon='$itelp', nama='$inama', tgl_lahir='$ikelahiran', kelamin='$ikelamin', aksi_oleh='$iaksi' WHERE id='$decrypt'");
				echo "<script>window.location='index.php?halaman=members';</script>";
			}
		}
	} else {
		if ($iemail == $pecah['email']) {
			$conn->query("UPDATE members SET no_ktp='$iktp', email='$iemail', telepon='$itelp', nama='$inama', password='$ipass', tgl_lahir='$ikelahiran', kelamin='$ikelamin', aksi_oleh='$iaksi' WHERE id='$decrypt'");
			echo "<script>window.location='index.php?halaman=members';</script>";
		} else {
			if($yangcocok == 1){
				$alert = 1;
			} else {
				$conn->query("UPDATE members SET no_ktp='$iktp', email='$iemail', telepon='$itelp', nama='$inama', password='$ipass', tgl_lahir='$ikelahiran', kelamin='$ikelamin', aksi_oleh='$iaksi' WHERE id='$decrypt'");
				echo "<script>window.location='index.php?halaman=members';</script>";
			}
		}
	}
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Perbarui Data <?php
								$string = $pecah['nama'];
								$PecahStr = explode(" ", $string);
								echo $PecahStr[0];
								?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=members">Pelanggan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Ubah Data</li>
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
							<div class="card card-topline-red">
								<div class="card-body " id="bar-parent">
                                    <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="simpleFormEmail">Nomor KTP</label>
											<input required="" pattern=".{8,}" title="Mohon masukkan minimal setidaknya 8 karakter" maxlength="20" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['no_ktp']; ?>" name="ktp">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Alamat Email</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="email" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['email']; ?>" name="email">
                                        </div>
										<div class="form-group">
											<label for="simpleFormEmail">Telepon</label>
											<input required="" pattern=".{8,}" title="Mohon masukkan nomor telepon dengan benar!" maxlength="30" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['telepon']; ?>" name="telepon">
                                        </div>
                                        <div class="form-group">
											<label for="simpleFormEmail">Nama Lengkap</label>
											<input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												value="<?php echo $pecah['nama']; ?>" name="nama">
										</div>
										<div class="form-group">
											<label>Kelahiran</label>
											<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input required="" name="kelahiran" readonly class="form-control" size="16" type="text" value="<?php echo date('d F Y', strtotime($pecah['tgl_lahir'])); ?>">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											</div>
										</div>
										<div class="form-group">
											<label>Jenis Kelamin </label>
											<div class="radio p-0">
												<?php
												if ($pecah['kelamin'] == 0) {
													?><input type="radio" name="kelamin" id="optionsRadios1" value="0" checked>
													<label for="optionsRadios1">Pria</label>
													<br>
													<input type="radio" name="kelamin" id="optionsRadios2" value="1">
													<label for="optionsRadios2">Wanita</label><?php
													} else {
														?><input type="radio" name="kelamin" id="optionsRadios1" value="0">
														<label for="optionsRadios1">Pria</label>
														<br>
														<input type="radio" name="kelamin" id="optionsRadios2" value="1" checked>
														<label for="optionsRadios2">Wanita</label><?php
														} ?>
											</div>
										</div>
										<div class="form-group">
											<label for="simpleFormPassword">Kata Sandi</label>
											<input pattern=".{6,}" title="Mohon masukkan minimal setidaknya 6 karakter" type="password" class="form-control" id="simpleFormPassword"
												placeholder="Kosongkan jika tidak ingin diganti" name="password">
                                        </div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=members" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>