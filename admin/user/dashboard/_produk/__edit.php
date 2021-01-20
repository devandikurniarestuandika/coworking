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

//Ambil Data
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM produk WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();

//Edit Data
if(isset($_POST["kirim"])) {
	$inama = $_POST['nama'];
	$ilokasi = $_POST['lokasi'];
	$ijenis = $_POST['jenis'];
	$iharga = $_POST['harga'];
	$istok = $_POST['stok'];
	$ideskripsi = $_POST['deskripsi'];

    $ambil = $conn->query("SELECT * FROM produk WHERE nama='$inama'");
	$yangcocok = $ambil->num_rows;
	if ($inama == $pecah['nama']) {
		if ($ideskripsi == null) {
			if($_FILES['image']['size'] == 0) {
				$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='Tidak ada deskripsi tertulis.', jenis='$ijenis', stok='$istok', harga='$iharga' WHERE id='$decrypt'");
				echo "<script>window.location='index.php?halaman=produk';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/produk/";
					$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$imageType = $sourceProperties[2];
					$fileNewName = $_FILES['image']['name'];
			
			
					switch ($imageType) {
			
			
						case IMAGETYPE_PNG:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefrompng($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagepng($targetLayer,$folderPath. $inama. ".". $ext);
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefrompng($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagepng($targetLayer,$folderPath. $inama. ".". $ext);
							}
							break;
			
			
						case IMAGETYPE_GIF:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefromgif($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagegif($targetLayer,$folderPath. $inama. ".". $ext);
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefromgif($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagegif($targetLayer,$folderPath. $inama. ".". $ext);
							}
							break;
			
			
						case IMAGETYPE_JPEG:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefromjpeg($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefromjpeg($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
							}
							break;
			
			
						default:
							$alert = 2;
							exit;
							break;
					}
			
					
					$namafile = $inama. ".". $ext;
					$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='Tidak ada deskripsi tertulis.', jenis='$ijenis', stok='$istok', harga='$iharga', foto='$namafile' WHERE id='$decrypt'");
					echo "<script>window.location='index.php?halaman=produk';</script>";
				}
			}
		} else {
			if($_FILES['image']['size'] == 0) {
				$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='$ideskripsi', jenis='$ijenis', stok='$istok', harga='$iharga' WHERE id='$decrypt'");
				echo "<script>window.location='index.php?halaman=produk';</script>";
			} else {
				if(is_array($_FILES)) {


					$file = $_FILES['image']['tmp_name'];
					$nama = $_POST['nama'];
					$sourceProperties = getimagesize($file);
					$folderPath = "../../../img/produk/";
					$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
					$imageType = $sourceProperties[2];
					$fileNewName = $_FILES['image']['name'];
			
			
					switch ($imageType) {
			
			
						case IMAGETYPE_PNG:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefrompng($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagepng($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefrompng($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagepng($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							}
			
			
						case IMAGETYPE_GIF:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefromgif($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagegif($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefromgif($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagegif($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							}
			
			
						case IMAGETYPE_JPEG:
							$namafilefoto = $pecah['foto'];
							if ($namafilefoto == "none.png") {
								$imageResourceId = imagecreatefromjpeg($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							} else {
								// Hapus namafilefoto
								unlink("../../../img/produk/" . $namafilefoto);
								$imageResourceId = imagecreatefromjpeg($file); 
								$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
								imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
								break;
							}
			
			
						default:
							$alert = 2;
							exit;
							break;
					}
			
			
					$namafile = $inama. ".". $ext;
					$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='$ideskripsi', jenis='$ijenis', stok='$istok', harga='$iharga', foto='$namafile' WHERE id='$decrypt'");
					echo "<script>window.location='index.php?halaman=produk';</script>";
				}
			}
		}
	} else {
		if($yangcocok == 1){
			$alert = 1;
		} else {
			if ($ideskripsi == null) {
				if($_FILES['image']['size'] == 0) {
					$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='Tidak ada deskripsi tertulis.', jenis='$ijenis', stok='$istok', harga='$iharga' WHERE id='$decrypt'");
					echo "<script>window.location='index.php?halaman=produk';</script>";
				} else {
					if(is_array($_FILES)) {
	
	
						$file = $_FILES['image']['tmp_name'];
						$sourceProperties = getimagesize($file);
						$folderPath = "../../../img/produk/";
						$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
						$imageType = $sourceProperties[2];
						$fileNewName = $_FILES['image']['name'];
				
				
						switch ($imageType) {
				
				
							case IMAGETYPE_PNG:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagepng($targetLayer,$folderPath. $inama. ".". $ext);
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagepng($targetLayer,$folderPath. $inama. ".". $ext);
								}
								break;
				
				
							case IMAGETYPE_GIF:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagegif($targetLayer,$folderPath. $inama. ".". $ext);
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagegif($targetLayer,$folderPath. $inama. ".". $ext);
								}
								break;
				
				
							case IMAGETYPE_JPEG:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
								}
								break;
				
				
							default:
								$alert = 2;
								exit;
								break;
						}
				
						
						$namafile = $inama. ".". $ext;
						$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='Tidak ada deskripsi tertulis.', jenis='$ijenis', stok='$istok', harga='$iharga', foto='$namafile' WHERE id='$decrypt'");
						echo "<script>window.location='index.php?halaman=produk';</script>";
					}
				}
			} else {
				if($_FILES['image']['size'] == 0) {
					$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='$ideskripsi', jenis='$ijenis', stok='$istok', harga='$iharga' WHERE id='$decrypt'");
					echo "<script>window.location='index.php?halaman=produk';</script>";
				} else {
					if(is_array($_FILES)) {
	
	
						$file = $_FILES['image']['tmp_name'];
						$nama = $_POST['nama'];
						$sourceProperties = getimagesize($file);
						$folderPath = "../../../img/produk/";
						$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
						$imageType = $sourceProperties[2];
						$fileNewName = $_FILES['image']['name'];
				
				
						switch ($imageType) {
				
				
							case IMAGETYPE_PNG:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagepng($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagepng($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								}
				
				
							case IMAGETYPE_GIF:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagegif($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagegif($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								}
				
				
							case IMAGETYPE_JPEG:
								$namafilefoto = $pecah['foto'];
								if ($namafilefoto == "none.png") {
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								} else {
									// Hapus namafilefoto
									unlink("../../../img/produk/" . $namafilefoto);
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
									imagejpeg($targetLayer,$folderPath. $inama. ".". $ext);
									break;
								}
				
				
							default:
								$alert = 2;
								exit;
								break;
						}
				
				
						$namafile = $inama. ".". $ext;
						$conn->query("UPDATE produk SET kode_lokasi='$ilokasi', nama='$inama', deskripsi='$ideskripsi', jenis='$ijenis', stok='$istok', harga='$iharga', foto='$namafile' WHERE id='$decrypt'");
						echo "<script>window.location='index.php?halaman=produk';</script>";
					}
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
								<li><a class="parent-item" href="index.php?halaman=produk">Lokasi</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Ubah Data</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
                    <?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Nama produk sudah dibuat sebelumnya.
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
											<label for="simpleFormEmail">Nama Produk</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="text" class="form-control" id="simpleFormEmail"
												value="<?= $pecah['nama']; ?>" name="nama">
										</div>
										<div class="form-group">
												<label>Pilih Lokasi</label>
												<select class="form-control" name="lokasi">
													<?php foreach($datalokasi as $key => $value): ?>
														<option value="<?= $value['kode_lokasi'] ?>" <?php if($pecah['kode_lokasi']==$value['kode_lokasi']){echo "selected";} ?>><?= $value['nama_lokasi']; ?></option>
													<?php endforeach; ?>
												</select>
										</div>
										<div class="form-group">
												<label>Pilih Jenis Produk</label>
												<select class="form-control" name="jenis">
												<?php if ($pecah['jenis'] == 0) {
													?><option value="0" selected>Makanan</option><option value="1">Minuman</option><?php
													} else {
														?><option value="0">Makanan</option><option value="1" selected>Minuman</option><?php
													}
												?>
												</select>
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Harga (Rp)</label>
											<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="number" class="form-control" id="simpleFormEmail"
												value="<?= $pecah['harga']; ?>" name="harga">
										</div>
										<div class="form-group">
											<label for="simpleFormEmail">Stok</label>
											<input required="" pattern=".{1,}" title="Mohon masukkan minimal setidaknya 1 karakter" maxlength="50" type="number" class="form-control" id="simpleFormEmail"
												value="<?= $pecah['stok']; ?>" name="stok">
										</div>
										<div class="mdl-textfield mdl-js-textfield txt-width">
											<label for="simpleFormEmail">Deskripsi Produk</label>
											<textarea class="mdl-textfield__input" rows="3" id="text7" name="deskripsi" placeholder="Masukkan Deskripsi Produk"><?= $pecah["deskripsi"]; ?></textarea>
										</div>
										<div>
										<label for="simpleFormEmail">Foto Lokasi (*.jpg *.jpeg *.png *.gif)</label>
										<img class="img-responsive" id="preview" src="../../../img/produk/<?= $pecah["foto"]; ?>" width="150">
											<div id="summernote"></div>
											<input type="file" class="default" name="image" onchange="readURL(this);">
										</div>
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=produk" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>