<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
date_default_timezone_set('Asia/Seoul');
//Tambah Data
if(isset($_POST["kirim"])) {
	$ikredit = $_POST['kredit'];
	$iidses = $_SESSION['id'];
	$iunses = $_SESSION['username'];
	$iaksi = $iidses . "-" . $iunses;

	$ambil = $conn->query("SELECT * FROM deposit WHERE id_deposit=1");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
		$ambildata = $conn->query("SELECT * FROM deposit WHERE id_deposit=1");
		$pecah = $ambildata->fetch_assoc();
		$kreditepay = $pecah['total'];
		$tambah = ($kreditepay + $ikredit);

		$conn->query("UPDATE deposit SET total='$tambah', aksi_oleh='$iaksi' WHERE id_deposit=1");
		echo "<script>window.location='index.php?halaman=beranda';</script>";
    } else {
		$conn->query("INSERT INTO deposit(total, aksi_oleh) VALUES('$ikredit', '$iaksi')");
		echo "<script>window.location='index.php?halaman=beranda';</script>";
	}
}
?>
<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Deposit Usaha</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=deposit">Deposit</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Deposit</li>
							</ol>
						</div>
					</div>
					<div class="tab-content tab-space">
						<div class="tab-pane active show" id="tab1">
						<div class="row">
						<div class="col-sm-12">
									<div class="card card-topline-red">
										<div class="card-body " id="bar-parent">
											<form role="form" method="post" enctype="multipart/form-data">
											<?php
											$ambildata = $conn->query("SELECT * FROM deposit WHERE id_deposit=1");
											$pecah = $ambildata->fetch_assoc();
											?>
												<div class="form-group">
													<label for="simpleFormEmail">Isi Kredit (Saat ini: Rp. <?php echo $pecah['total']; ?>)</label>
													<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="8" type="number" class="form-control" id="simpleFormEmail"
														placeholder="Masukkan Isi Kredit" name="kredit">
												</div>
												<div class="col-lg-12 p-t-20 text-center">
												<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
												<a href="index.php?halaman=beranda" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Kembali</a></div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>