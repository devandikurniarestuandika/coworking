<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>

<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Pemesanan Ruangan</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=booking-ruangan">Pemesanan Ruangan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Semua Pemesanan Ruangan</li>
							</ol>
						</div>
					</div>
					<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Total Pemesanan</h3>
									<?php
										$ambil_all = $conn->query("SELECT * FROM booking");
										$total_booking = mysqli_num_rows($ambil_all);
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-orange width-100" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_booking; ?> Total Pemesanan</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Pmsnan Lunas</h3>
									<?php
										$ambil_aktif = $conn->query("SELECT * FROM booking WHERE status LIKE 1");
										$total_booking_aktif = mysqli_num_rows($ambil_aktif);
										$hitung_aktif = (100 * $total_booking_aktif) / $total_booking;
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-purple width-<?php
										if ($hitung_aktif == "0") {
											echo "0";
										} elseif ($hitung_aktif >= 1 && $hitung_aktif <= 49) {
											echo "40";
										} else if ($hitung_aktif == 50) {
											echo "50";
										} else if ($hitung_aktif >= 51 && $hitung_aktif <= 69) {
											echo "60";
										} else if ($hitung_aktif >= 70 && $hitung_aktif <= 79) {
											echo "80";
										} else if ($hitung_aktif >= 80 && $hitung_aktif <= 100) {
											echo "100";
										}
										?>" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_booking_aktif; ?> Pemesanan Lunas</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Pmsnan Batal</h3>
									<?php
										$ambil_pasif = $conn->query("SELECT * FROM booking WHERE status LIKE 0");
										$total_booking_pasif = mysqli_num_rows($ambil_pasif);
										$hitung_pasif = (100 * $total_booking_pasif) / $total_booking;
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-cyan width-<?php
										if ($hitung_pasif == "0") {
											echo "0";
										} elseif ($hitung_pasif >= 1 && $hitung_pasif <= 49) {
											echo "40";
										} else if ($hitung_pasif == 50) {
											echo "50";
										} else if ($hitung_pasif >= 51 && $hitung_pasif <= 69) {
											echo "60";
										} else if ($hitung_pasif >= 70 && $hitung_pasif <= 79) {
											echo "80";
										} else if ($hitung_pasif >= 80 && $hitung_pasif <= 100) {
											echo "100";
										}
										?>" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_booking_pasif; ?> Pemesanan Batal</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Pmsnan Pending</h3>
									<?php
										$ambil_pending = $conn->query("SELECT * FROM booking WHERE status LIKE 2");
										$total_booking_pending = mysqli_num_rows($ambil_pending);
										$hitung_pending = (100 * $total_booking_pending) / $total_booking;
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-cyan width-<?php
										if ($hitung_pending == "0") {
											echo "0";
										} elseif ($hitung_pending >= 1 && $hitung_pending <= 49) {
											echo "40";
										} else if ($hitung_pending == 50) {
											echo "50";
										} else if ($hitung_pending >= 51 && $hitung_pending <= 69) {
											echo "60";
										} else if ($hitung_pending >= 70 && $hitung_pending <= 79) {
											echo "80";
										} else if ($hitung_pending >= 80 && $hitung_pending <= 100) {
											echo "100";
										}
										?>" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_booking_pending; ?> Pemesanan Pending</span>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-content tab-space">
						<div class="tab-pane active show" id="tab1">
						<div class="row">
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
													<th class="center"> Email </th>
													<th class="center"> Lokasi </th>
													<th class="center"> Nomor Ruangan </th>
													<th class="center"> Nama Ruangan </th>
													<th class="center"> Tgl Pakai </th>
													<th class="center"> Tgl Pesan </th>
													<th class="center"> Status </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT booking.kode_booking, members.email, members.foto, ruangan.nomor, ruangan.nama, lokasi.nama_lokasi, booking.tgl_pakai, epay_transaksi.created_at, booking.status FROM epay_transaksi JOIN epay ON epay_transaksi.id_epay=epay.id JOIN members ON epay.id_member=members.id JOIN transaksi ON epay_transaksi.id_transaksi=transaksi.id_transaksi JOIN booking ON transaksi.kode_booking=booking.kode_booking JOIN ruangan ON booking.id_ruangan=ruangan.id_ruangan JOIN lokasi ON ruangan.kode_lokasi=lokasi.kode_lokasi ORDER BY kode_booking DESC") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah['email']; ?></td>
													<td class="center"><?= $pecah['nama_lokasi']; ?></td>
													<td class="center"><?= $pecah['nomor']; ?></td>
													<td class="center"><?= $pecah['nama']; ?></td>
													<td class="center"><?php echo date('d F Y', strtotime($pecah['tgl_pakai'])); ?></td>
													<td class="center"><?php echo date('d F Y', strtotime($pecah['created_at'])); ?></td>
													<td class="center">
														<?php
															if ($pecah['status'] == 1) {
																?><span class="label label-sm label-success">Lunas </span><?php
															} elseif ($pecah['status'] == 2) {
																?><span class="label label-sm label-primary">Pending </span><?php
															} else {
																?><span class="label label-sm label-danger">Batal </span><?php
															}
														?>
														
													</td>
													<td class="center">
														<?php
															if ($pecah['status'] == 1) {
																?><a href="index.php?halaman=batal-ruangan&id=<?php echo Base64_Encrypted::Crypter($pecah['kode_booking'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-window-close"></i>
															</a>
															<a href="#" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-print"></i>
															</a><?php
															} else {
																?><a href="#" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-print"></i>
															</a><?php
															}
														?>
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