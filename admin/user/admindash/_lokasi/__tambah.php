<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Tambah Data
if(isset($_POST["kirim"])) {
	$inama = $_POST['nama'];
	$ialamat = $_POST['alamat'];
	$ideskripsi = $_POST['deskripsi'];

    $ambil = $conn->query("SELECT * FROM lokasi WHERE nama_lokasi='$inama'");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
        $alert = 1;
    } else {
		if ($ideskripsi == null) {
			if($_FILES['image']['size'] == 0) {
				$conn->query("INSERT INTO lokasi(nama_lokasi, alamat, deskripsi) VALUES('$inama', '$ialamat', 'Tidak ada deskripsi tertulis.')");
				echo "<script>window.location='index.php?halaman=lokasi';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/lokasi/";
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
					$conn->query("INSERT INTO lokasi(nama_lokasi, alamat, deskripsi, foto) VALUES('$inama', '$ialamat', 'Tidak ada deskripsi tertulis.', '$namafile')");
					echo "<script>window.location='index.php?halaman=lokasi';</script>";
				}
			}
		} else {
			if($_FILES['image']['size'] == 0) {
				$conn->query("INSERT INTO lokasi(nama_lokasi, alamat, deskripsi) VALUES('$inama', '$ialamat', '$ideskripsi')");
				echo "<script>window.location='index.php?halaman=lokasi';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$nama = $_POST['nama'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/lokasi/";
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
					$conn->query("INSERT INTO lokasi(nama_lokasi, alamat, deskripsi, foto) VALUES('$inama', '$ialamat', '$ideskripsi', '$namafile')");
					echo "<script>window.location='index.php?halaman=lokasi';</script>";
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
								<div class="page-title">Tambah Lokasi Baru</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=lokasi">Lokasi</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Tambah Lokasi</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
                    <?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Nama lokasi sudah dibuat sebelumnya.
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
											<label for="simpleFormEmail">Nama Lokasi</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Nama Lokasi" name="nama">
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Alamat Lokasi</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												placeholder="Masukkan Alamat Lokasi" name="alamat">
										</div>
										<div class="mdl-textfield mdl-js-textfield txt-width">
											<label for="simpleFormEmail">Deskripsi Lokasi</label>
											<textarea class="mdl-textfield__input" rows="3" id="text7" name="deskripsi" placeholder="Masukkan Deskripsi Lokasi"></textarea>
										</div>
										<div>
										<label for="simpleFormEmail">Foto Lokasi (*.jpg *.jpeg *.png *.gif)</label>
											<div id="summernote"></div>
											<input type="file" class="default" name="image">
										</div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=lokasi" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>