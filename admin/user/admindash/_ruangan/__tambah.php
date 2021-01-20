<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Pilih Lokasi
$datalokasi = [];
$ambil = $conn->query("SELECT * FROM lokasi");
while($tiap = $ambil->fetch_assoc()){
	$datalokasi[] = $tiap;
}

//Tambah Data
if(isset($_POST["kirim"])) {
	$inomor = $_POST['nomor'];
	$inama = $_POST['nama'];
	$ilokasi = $_POST['lokasi'];
	$ijenis = $_POST['jenis'];
	$iukuran = $_POST['ukuran'];
	$iharga = $_POST['harga'];
	$ikapasitas = $_POST['kapasitas'];
	$ideskripsi = $_POST['deskripsi'];

    $ambil = $conn->query("SELECT * FROM ruangan WHERE nama='$inama'");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
        $alert = 1;
    } else {
		if ($ideskripsi == null) {
			if($_FILES['image']['size'] == 0) {
				$conn->query("INSERT INTO ruangan(kode_lokasi, nomor, nama, jenis, ukuran, deskripsi, harga, kapasitas) VALUES('$ilokasi', '$inomor', '$inama', '$ijenis', '$iukuran', 'Tidak ada deskripsi tertulis.', '$iharga', '$ikapasitas')");
				echo "<script>window.location='index.php?halaman=ruangan';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/ruang/";
					$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$imageType = $sourceProperties[2];
					$fileNewName = $_FILES['image']['name'];
			
			
					switch ($imageType) {
			
			
						case IMAGETYPE_PNG:
							$imageResourceId = imagecreatefrompng($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagepng($targetLayer,$folderPath. $inama. ".". $ext);
							break;
			
			
						case IMAGETYPE_GIF:
							$imageResourceId = imagecreatefromgif($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagegif($targetLayer,$folderPath. $inama. ".". $ext);
							break;
			
			
						case IMAGETYPE_JPEG:
							$imageResourceId = imagecreatefromjpeg($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
							break;
			
			
						default:
							$alert = 2;
							exit;
							break;
					}
			
			
					$namafile = $inama. ".". $ext;
					$conn->query("INSERT INTO ruangan(kode_lokasi, nomor, nama, jenis, ukuran, deskripsi, harga, kapasitas, foto) VALUES('$ilokasi', '$inomor', '$inama', '$ijenis', '$iukuran', 'Tidak ada deskripsi tertulis.', '$iharga', '$ikapasitas', '$namafile')");
					echo "<script>window.location='index.php?halaman=ruangan';</script>";
				}
			}
		} else {
			if($_FILES['image']['size'] == 0) {
				$conn->query("INSERT INTO ruangan(kode_lokasi, nomor, nama, jenis, ukuran, deskripsi, harga, kapasitas) VALUES('$ilokasi', '$inomor', '$inama', '$ijenis', '$iukuran', '$ideskripsi', '$iharga', '$ikapasitas')");
				echo "<script>window.location='index.php?halaman=ruangan';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$nama = $_POST['nama'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/ruang/";
					$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$imageType = $sourceProperties[2];
					$fileNewName = $_FILES['image']['name'];
			
			
					switch ($imageType) {
			
			
						case IMAGETYPE_PNG:
							$imageResourceId = imagecreatefrompng($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagepng($targetLayer,$folderPath. $nama. ".". $ext);
							break;
			
			
						case IMAGETYPE_GIF:
							$imageResourceId = imagecreatefromgif($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagegif($targetLayer,$folderPath. $nama. ".". $ext);
							break;
			
			
						case IMAGETYPE_JPEG:
							$imageResourceId = imagecreatefromjpeg($file); 
							$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
							imagejpeg($targetLayer,$folderPath. $nama. ".". $ext);
							break;
			
			
						default:
							$alert = 2;
							exit;
							break;
					}
			
			
					$namafile = $nama. ".". $ext;
					$conn->query("INSERT INTO ruangan(kode_lokasi, nomor, nama, jenis, ukuran, deskripsi, harga, kapasitas, foto) VALUES('$ilokasi', '$inomor', '$inama', '$ijenis', '$iukuran', '$ideskripsi', '$iharga', '$ikapasitas', '$namafile')");
					echo "<script>window.location='index.php?halaman=ruangan';</script>";
				}
			}
		}
    }
}

function imageResize($imageResourceId,$width,$height) {


    $targetWidth =500;
    $targetHeight =500;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Tambah Ruangan Baru</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=ruangan">Ruangan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Tambah Ruangan</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
                    <?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Nama ruangan sudah dibuat sebelumnya.
							</div><?php
							} elseif ($alert == 2) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Jenis file tidak didukung.
							</div><?php
							} ?>
							
							<div class="card card-topline-red">
								<div class="card-body " id="bar-parent">
                                    <form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label for="simpleFormEmail">Nomor Ruangan</label>
											<input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nomor Ruangan" name="nomor">
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Nama Ruangan</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nama Ruangan" name="nama">
										</div>
										<div class="form-group">
												<label>Pilih Lokasi</label>
												<select class="form-control" name="lokasi">
													<?php foreach($datalokasi as $key => $value): ?>
													<option value="<?= $value['kode_lokasi'] ?>"><?= $value['nama_lokasi']; ?></option>
													<?php endforeach; ?>
												</select>
										</div>
										<div class="form-group">
												<label>Pilih Jenis</label>
												<select class="form-control" name="jenis">
													<option value="r.micro">Individual (Shared)</option>
													<option value="r.small">Small Team (Private)</option>
													<option value="r.medium">Community (Private)</option>
													<option value="r.large">Business Meeting (Private)</option>
													<option value="r.extra">Business Camp (Private)</option>
												</select>
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Ukuran Ruangan</label>
											<input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Ukuran Ruangan" name="ukuran">
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Harga (Rp)</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="number" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Harga Ruangan" name="harga">
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Kapasitas Ruangan</label>
											<input required="" pattern=".{1,}" title="Mohon masukkan minimal setidaknya 1 karakter" maxlength="50" type="number" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Kapasitas Ruangan" name="kapasitas">
										</div>
										<div class="mdl-textfield mdl-js-textfield txt-width">
											<label for="simpleFormEmail">Deskripsi Ruangan</label>
											<textarea class="mdl-textfield__input" rows="3" id="text7" name="deskripsi" placeholder="Masukkan Deskripsi Ruangan"></textarea>
										</div>
										<div>
										<label for="simpleFormEmail">Foto Ruangan (*.jpg *.jpeg *.png *.gif)</label>
											<div id="summernote"></div>
											<input type="file" class="default" name="image">
										</div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=ruangan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>