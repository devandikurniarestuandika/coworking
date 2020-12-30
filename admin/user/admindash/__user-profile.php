<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<?php
//Ganti Pengaturan Umum
if(isset($_POST["kirim1"])) {
	$iidusr = $_SESSION['id'];
    $iktp = $_POST['ktp'];
	$inamel = $_POST['namel'];
	$ikelahiran = date('Y-m-d', strtotime($_POST['kelahiran']));
	$ikelamin = $_POST['kelamin'];
	$ibio = $_POST['bio'];
	$ialamat = $_POST['alamat'];
	$conn->query("UPDATE users SET no_ktp='$iktp', nama='$inamel', tgl_lahir='$ikelahiran', bio='$ibio', kelamin='$ikelamin', alamat='$ialamat' WHERE id='$iidusr'");
	echo "<script>window.location='index.php?halaman=profil-pengguna';</script>";
}

//Ganti Foto Profil
if(isset($_POST["kirim2"])) {
	
    if(is_array($_FILES)) {

		$iidusr = $_SESSION['id'];
		$iusrname = $_SESSION['username'];
		$nama = $iusrname;
        $file = $_FILES['image']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $folderPath = "../../../img/dp/";
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
		$fileNewName = $_FILES['image']['name'];
		
        switch ($imageType) {
			
			case IMAGETYPE_PNG:
				// Mengambil data
				$ambilfoto = $conn->query("SELECT * FROM users WHERE id='$iidusr'");
				$detailfoto = $ambilfoto->fetch_assoc();
				$namafilefoto = $detailfoto['foto'];
				$defaultfoto = "default.png";
				if ($defaultfoto == $namafilefoto) {
					$imageResourceId = imagecreatefrompng($file);
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagepng($targetLayer,$folderPath. $nama. ".". $ext);
				break;
				} else {
					// Hapus namafilefoto
					unlink("../../../img/dp/" . $namafilefoto);
				
                	$imageResourceId = imagecreatefrompng($file);
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagepng($targetLayer,$folderPath. $nama. ".". $ext);
				break;
				}


			case IMAGETYPE_GIF:
				// Mengambil data
				$ambilfoto = $conn->query("SELECT * FROM users WHERE id='$iidusr'");
				$detailfoto = $ambilfoto->fetch_assoc();
				$namafilefoto = $detailfoto['foto'];
				$defaultfoto = "default.png";
				if ($defaultfoto == $namafilefoto) {
					$imageResourceId = imagecreatefromgif($file);
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagegif($targetLayer,$folderPath. $nama. ".". $ext);
				break;
				} else {
					// Hapus namafilefoto
					unlink("../../../img/dp/" . $namafilefoto);
				
                	$imageResourceId = imagecreatefromgif($file); 
                	$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                	imagegif($targetLayer,$folderPath. $nama. ".". $ext);
                	break;
				}


			case IMAGETYPE_JPEG:
				// Mengambil data
				$ambilfoto = $conn->query("SELECT * FROM users WHERE id='$iidusr'");
				$detailfoto = $ambilfoto->fetch_assoc();
				$namafilefoto = $detailfoto['foto'];
				$defaultfoto = "default.png";
				if ($defaultfoto == $namafilefoto) {
					$imageResourceId = imagecreatefromjpeg($file); 
                	$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                	imagejpeg($targetLayer,$folderPath. $nama. ".". $ext);
					break;
				} else {
					// Hapus namafilefoto
					unlink("../../../img/dp/" . $namafilefoto);
				
                	$imageResourceId = imagecreatefromjpeg($file); 
                	$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                	imagejpeg($targetLayer,$folderPath. $nama. ".". $ext);
					break;
				}
				
			default:
				echo "<script>window.location='index.php?halaman=profil-pengguna';</script>";
                exit;
				break;
        }
		$namafile = $nama. ".". $ext;
		$conn->query("UPDATE users SET foto='$namafile' WHERE id='$iidusr'");
		echo "<script>window.location='index.php?halaman=profil-pengguna';</script>";
    }
}


function imageResize($imageResourceId,$width,$height) {


    $targetWidth =500;
    $targetHeight =500;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}

//Ganti Kata Sandi
if(isset($_POST["kirim3"])) {
	$iidusr = $_SESSION['id'];
	$ioldpass = md5($_POST['oldpass']);
	$inewpass = md5($_POST['newpass']);
	if ($ioldpass == $_SESSION['password']) {
		$conn->query("UPDATE users SET password='$inewpass' WHERE id='$iidusr'");
		echo "<script>window.location='index.php?halaman=profil-pengguna';</script>";
	} else {
		$alert = 1;
	}
}

//Tutup Akun
if(isset($_POST["kirim4"])) {
	$iidusr = $_SESSION['id'];
	$conn->query("UPDATE users SET status='0' WHERE id='$iidusr'");
	echo "<script>window.location='logout.php';</script>";
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Profil Pengguna</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li class="active">Semoga hari mu menyenangkan!</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Kata sandi saat ini yang Anda masukkan salah.
							</div><?php
							} ?>
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card card-topline-aqua">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="profile-userpic">
												<img src="../../../img/dp/<?php $fotofunc->Foto(); ?>" class="img-responsive" alt=""> </div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?php $namafunc->Nama(); ?> </div>
											<div class="profile-usertitle-job"> <?php $ktpfunc->Ktp(); ?> </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
								<div class="card">
									<div class="card-head card-topline-aqua">
										<header>Tentang Saya</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="profile-desc">
											Hai, perkenalkan dengan saya <?php $namafunc->Nama(); ?> senang bisa bergabung dengan usaha Coworking Space CowSpe.
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Status </b>
												<div class="profile-desc-item pull-right">Aktif</div>
											</li>
											<li class="list-group-item">
												<b>Akun Dibuat </b>
												<div class="profile-desc-item pull-right"><?php $createdfunc->Createdat(); ?></div>
											</li>
											<li class="list-group-item">
												<b>Perubahan Akun </b>
												<div class="profile-desc-item pull-right"><?php $updatedfunc->Updatedat(); ?></div>
											</li>
										</ul>
									</div>
								</div>
								<div class="card">
									<div class="card-head card-topline-aqua">
										<header>Alamat Rumah</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<p><?php $alamatfunc->Alamat(); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="profile-tab-box">
										<div class="p-l-20">
											<ul class="nav ">
												<li class="nav-item tab-all"><a class="nav-link active show"
														href="#tab1" data-toggle="tab">Biografi</a></li>
												<li class="nav-item tab-all p-l-20"><a class="nav-link" href="#tab2"
														data-toggle="tab">Umum</a></li>
												<li class="nav-item tab-all p-l-20"><a class="nav-link" href="#tab3"
														data-toggle="tab">Foto Profil</a></li>
												<li class="nav-item tab-all p-l-20"><a class="nav-link" href="#tab4"
														data-toggle="tab">Kata Sandi</a></li>
												<li class="nav-item tab-all p-l-20"><a class="nav-link" href="#tab5"
														data-toggle="tab">Tutup Akun</a></li>
											</ul>
										</div>
									</div>
									<div class="white-box">
										<!-- Tab panes -->
										<div class="tab-content">
											<div class="tab-pane active fontawesome-demo" id="tab1">
												<div id="biography">
													<p class="m-t-30"><?php $biofunc->Bio(); ?></p>
													<br>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="card-head">
															<header>Pengaturan Umum</header>
															<p></p>
														</div>
														<div class="card-body " id="bar-parent1">
															<form role="form" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="simpleFormEmail">Nomor KTP</label>
																	<input type="text" class="form-control"
																		id="simpleFormEmail" pattern=".{8,}" title="Mohon masukkan minimal setidaknya 8 karakter" required="" maxlength="20" name="ktp" value="<?php $ktpfunc->Ktp(); ?>">
																</div>
																<div class="form-group">
																	<label for="simpleFormEmail">Nama Lengkap</label>
																	<input type="text" class="form-control"
																		id="simpleFormEmail" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" required="" maxlength="30" name="namel" value="<?php $namafunc->Nama(); ?>">
																</div>
																<div class="form-group">
																	<label>Kelahiran</label>
																	<div class="input-group date form_date" data-date=""
																		data-date-format="dd MM yyyy" data-link-field="dtp_input2"
																		data-link-format="yyyy-mm-dd">
																		<input required="" name="kelahiran" readonly class="form-control" size="16" type="text" value="<?php echo date('d F Y', strtotime($_SESSION["tgl_lahir"])); ?>">
																		<span class="input-group-addon"><span
																				class="fa fa-calendar"></span></span>
																	</div>
																</div>
																<div class="form-group">
																	<label>Jenis Kelamin </label>
																	<div class="radio p-0">
																		<?php
																		if ($_SESSION["kelamin"] == 0) {
																			?><input type="radio" name="kelamin" id="optionsRadios1"
																			value="0" checked>
																		<label for="optionsRadios1">
																			Pria
																		</label>
																		<br>
																		<input type="radio" name="kelamin" id="optionsRadios2"
																			value="1">
																		<label for="optionsRadios2">
																			Wanita
																		</label><?php
																		} else {
																			?><input type="radio" name="kelamin" id="optionsRadios1"
																			value="0">
																		<label for="optionsRadios1">
																			Pria
																		</label>
																		<br>
																		<input type="radio" name="kelamin" id="optionsRadios2"
																			value="1" checked>
																		<label for="optionsRadios2">
																			Wanita
																		</label><?php
																		}
																		?>
																	</div>
																</div>
																<div class="form-group">
																	<label for="simpleFormEmail">Alamat Rumah</label>
																	<input type="text" class="form-control"
																		id="simpleFormEmail" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" required="" maxlength="30" name="alamat" value="<?php $alamatfunc->Alamat(); ?>">
																</div>
																<div class="form-group">
																	<label>Biografi</label>
																	<textarea class="form-control" rows="3"
																	placeholder="Isikan biografi Anda disini ..." name="bio"><?php $biofunc->Bio(); ?></textarea>
																</div>
																<br>
																<button type="submit"
																	class="btn btn-primary" name="kirim1">Simpan</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="card-head">
															<header>Ganti Foto Profil</header>
															<p></p>
														</div>
														<div class="card-body " id="bar-parent1">
															<form role="form" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="simpleFormEmail">Jenis file yang didukung *.jpg *.jpeg *.png *.gif</label>
																	<input type="file" class="form-control"
																		id="simpleFormEmail" required="" name="image">
																</div>
																<br>
																<button type="submit"
																	class="btn btn-primary" name="kirim2">Simpan</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="card-head">
															<header>Ubah Kata Sandi</header>
															<p></p>
														</div>
														<div class="card-body " id="bar-parent1">
															<form role="form" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="simpleFormEmail">Kata Sandi Sekarang</label>
																	<input type="password" required="" class="form-control"
																		id="simpleFormPassword"
																		placeholder="Kata Sandi Sekarang" name="oldpass">
																</div>
																<div class="form-group">
																	<label for="simpleFormPassword">Kata Sandi Baru</label>
																	<input type="password" class="form-control"
																		id="newpassword" required="" pattern=".{6,}" title="Mohon masukkan minimal setidaknya 6 karakter" placeholder="Kata Sandi Baru" name="newpass">
																</div>
																<br>
																<button type="submit"
																	class="btn btn-primary" name="kirim3">Simpan</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab5">
												<div class="row">
													<div class="col-md-12 col-sm-12">
														<div class="card-head">
															<header>Tutup Akun</header>
															<p></p>
														</div>
														<div class="card-body " id="bar-parent1">
															<form role="form" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label for="simpleFormEmail">Jika Anda yakin ingin menutup akun ini. Maka akun akan terkunci sementara. Hubungi Admin untuk meng-aktifkan akun kembali.</label>
																</div>
																<br>
																<button type="submit"
																	class="btn btn-primary" name="kirim4">Tutup Akun</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				<!-- end page content -->