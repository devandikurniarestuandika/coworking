<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Pilih Ruangan
$dataruangan = [];
$ambil = $conn->query("SELECT * FROM ruangan");
while($tiap = $ambil->fetch_assoc()){
	$dataruangan[] = $tiap;
}

//Ambil Data
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM jadwal WHERE no_jadwal= '$decrypt'");
$pecah = $ambil->fetch_assoc();

//Edit Data
if(isset($_POST["kirim"])) {
    $iruangan = $_POST['ruangan'];
	$istatus = $_POST['status'];
	$ijadwal = date('Y-m-d', strtotime($_POST['jadwal']));

	$conn->query("UPDATE jadwal SET id_ruangan='$iruangan', status_jadwal='$istatus', tanggal='$ijadwal' WHERE no_jadwal='$decrypt'");
	echo "<script>window.location='index.php?halaman=penjadwalan';</script>";
}
?>

					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Perbarui Tanggal <?php echo date('d F Y', strtotime($pecah['tanggal'])); ?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=penjadwalan">Penjadwalan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Ubah Data</li>
							</ol>
						</div>
                    </div>
					<div class="row">
                    <div class="col-sm-12">
							<div class="card card-topline-red">
								<div class="card-body " id="bar-parent">
									<form role="form" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Tanggal</label>
											<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
												<input required="" name="jadwal" readonly class="form-control" size="16" type="text" value="<?php echo date('d F Y', strtotime($pecah['tanggal'])); ?>">
												<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
											</div>
										</div>
										<div class="form-group">
												<label>Pilih Ruangan</label>
												<select class="form-control" name="ruangan">
													<?php foreach($dataruangan as $key => $value): ?>
														<option value="<?= $value['id_ruangan'] ?>" <?php if($pecah['id_ruangan']==$value['id_ruangan']){echo "selected";} ?>><?= $value['nama']; ?></option>
													<?php endforeach; ?>
												</select>
										</div>
										<div class="form-group">
												<label>Pilih Status Jadwal</label>
												<select class="form-control" name="status">
													<?php if ($pecah['status_jadwal'] == 0) {
													?><option value="0" selected>Tutup</option><option value="1">Buka</option><?php
													} else {
														?><option value="0">Tutup</option><option value="1" selected>Buka</option><?php
													}
													?>
												</select>
										</div>
										
										<div class="col-lg-12 p-t-20 text-center">
										<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
										<a href="index.php?halaman=penjadwalan-hapus&id=<?php echo Base64_Encrypted::Crypter($pecah['no_jadwal'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-danger">Hapus</a>
										<a href="index.php?halaman=penjadwalan" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Tutup</a></div>
									</form>
								</div>
							</div>
						</div>
                    </div>