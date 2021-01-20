<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
date_default_timezone_set('Asia/Seoul');
//Tambah Data
if(isset($_POST["kirim"])) {
	$iemail = $_POST['email'];
	$ikredit = $_POST['kredit'];
	$idibuat = date("Y-m-d H:i:s");
	$iidses = $_SESSION['id'];
	$iunses = $_SESSION['username'];
	$iaksi = $iidses . "-" . $iunses;

	$ambil = $conn->query("SELECT members.email, epay.status FROM epay JOIN members ON epay.id_member=members.id WHERE members.email='$iemail' AND epay.status=1");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
		$ambildeposit = $conn->query("SELECT * FROM deposit WHERE id_deposit=1");
		$pecahdeposit = $ambildeposit->fetch_assoc();
		$totaldeposit = $pecahdeposit['total'];
		if ($totaldeposit > $ikredit) {
			$ambildata = $conn->query("SELECT epay.id, epay.status, epay.kredit, members.email FROM epay JOIN members ON epay.id_member=members.id WHERE members.email='$iemail'");
			$pecah = $ambildata->fetch_assoc();

			$idepay = $pecah['id'];
			$kreditepay = $pecah['kredit'];
			$tambah = ($kreditepay + $ikredit);
			$kurang = ($totaldeposit - $ikredit);
			

			$conn->query("INSERT INTO epay_transaksi(id_epay, created_at, pesan, status_transaksi, total) VALUES('$idepay', '$idibuat', '1', '0', '$ikredit')");
			$conn->query("UPDATE epay SET kredit='$tambah' WHERE id='$idepay'");
			$conn->query("UPDATE deposit SET total='$kurang', aksi_oleh='$iaksi' WHERE id_deposit=1");
			echo "<script>window.location='index.php?halaman=epay-topup';</script>";
		} else {
			$alert = 2;
		}
    } else {
		$alert = 1;
	}
}
?>
<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Topup E-Pay</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=epay">E-Pay</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Topup E-Pay</li>
							</ol>
						</div>
					</div>
					<div class="tab-content tab-space">
						<div class="tab-pane active show" id="tab1">
						<div class="row">
						<div class="col-sm-12">
						<?php if ($alert == 1) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Akun E-Pay tidak aktif atau tidak ada.
							</div><?php
							} elseif ($alert == 2) {
								?><div class="alert alert-danger">
								<strong>Galat!</strong> Kredit Deposit tidak cukup untuk melakukan transaksi. Minimal sisakan Rp. 1.
							</div><?php
							} ?>
									<div class="card card-topline-red">
										<div class="card-body " id="bar-parent">
											<form role="form" method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label for="simpleFormEmail">Alamat Email Pengguna</label>
													<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="email" class="form-control" id="simpleFormEmail"
														placeholder="Masukkan Alamat Email" name="email">
												</div>
												<div class="form-group">
													<label for="simpleFormEmail">Isi Kredit (Rp)</label>
													<input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="number" class="form-control" id="simpleFormEmail"
														placeholder="Masukkan Isi Kredit" name="kredit">
												</div>
												<div class="col-lg-12 p-t-20 text-center">
												<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="kirim">Kirim</button>
												<a href="index.php?halaman=epay" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Kembali</a></div>
											</form>
										</div>
									</div>
								</div>
						<div class="col-md-12">
							<div class="card card-topline-red">
								<div class="card-head">
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="row p-b-20">
										<div class="col-md-6 col-sm-6 col-6">
										</div>
										<div class="col-md-6 col-sm-6 col-6">
											<div class="btn-group pull-right">
												<a class="btn deepPink-bgcolor" href="#">Print
													<i class="fa fa-print"></i>
												</a>
											</div>
										</div>
									</div>
									<div class="table-scrollable">
										<table class="table table-hover table-checkable order-column full-width"
											id="example4">
											<thead>
												<tr>
													<th class="center"></th>
													<th class="center"> Dibuat </th>
													<th class="center"> Email </th>
													<th class="center"> Total </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT epay_transaksi.id, epay_transaksi.created_at, epay_transaksi.pesan, epay_transaksi.status_transaksi, epay_transaksi.total, members.email, members.foto FROM epay_transaksi JOIN epay JOIN members ON epay_transaksi.id_epay=epay.id AND epay.id_member=members.id WHERE pesan LIKE 1 ORDER BY id DESC") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah['created_at']; ?></td>
													<td class="center"><?= $pecah['email']; ?></td>
													<td class="center">Rp. <?= $pecah['total']; ?></td>
													<td class="center">
														<a href="#" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-print"></i>
														</a>
														
													</td>
												</tr>
											<?php $no++; ?>
											<?php endwhile; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>