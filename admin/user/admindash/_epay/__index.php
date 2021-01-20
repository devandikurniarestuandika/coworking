<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>

<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard E-Pay</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=epay">E-Pay</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashbor E-Pay</li>
							</ol>
						</div>
					</div>
					<div class="tab-content tab-space">
						<div class="tab-pane active show" id="tab1">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="row clearfix">
								<div class="col-md-6 col-sm-6 col-12">
									<div class="card">
										<div class="panel-body">
											<h3>Total Akun E-Pay</h3>
											<?php
										$ambil_all = $conn->query("SELECT * FROM epay");
										$total_staff = mysqli_num_rows($ambil_all);
									?>
											<div
												class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
												<div class="progress-bar progress-bar-success width-100"
													role="progressbar" aria-valuenow="100" aria-valuemin="0"
													aria-valuemax="100"></div>
											</div>
											<span class="text-small margin-top-10 full-width"><?php echo $total_staff; ?> Total Akun E-Pay</span></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-12">
									<div class="card">
										<div class="panel-body">
											<h3>E-Pay Aktif</h3>
											<?php
										$ambil_aktif = $conn->query("SELECT epay.id, members.email, members.nama, epay.kredit, epay.status FROM `members` join epay on members.id=epay.id where epay.status like 1");
										$total_staff_aktif = mysqli_num_rows($ambil_aktif);
										$hitung_aktif = (100 * $total_staff_aktif) / $total_staff;
									?>
											<div
												class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
												<div class="progress-bar progress-bar-danger width-<?php
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
										?>"></div>
											</div>
											<span class="text-small margin-top-10 full-width">
										<?php echo $total_staff_aktif; ?> Akun Aktif</span>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-12">
									<div class="card">
										<div class="panel-body">
											<h3>Total Topup</h3>
											<?php
										$ambil_semua = $conn->query("SELECT * FROM epay_transaksi");
										$total_transaksi = mysqli_num_rows($ambil_semua);
									?>
									<?php
										$ambil_topup = $conn->query("SELECT epay_transaksi.id, epay_transaksi.created_at, epay_transaksi.pesan, epay_transaksi.status_transaksi, epay_transaksi.total, members.email, members.foto FROM epay_transaksi JOIN epay JOIN members ON epay_transaksi.id_epay=epay.id AND epay.id_member=members.id WHERE pesan LIKE 1");
										$total_topup = mysqli_num_rows($ambil_topup);
										$hitung_topup = (100 * $total_topup) / $total_transaksi;
									?>
											<div
												class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
												<div class="progress-bar progress-bar-warning width-<?php
										if ($hitung_topup == "0") {
											echo "0";
										} elseif ($hitung_topup >= 1 && $hitung_topup <= 49) {
											echo "40";
										} else if ($hitung_topup == 50) {
											echo "50";
										} else if ($hitung_topup >= 51 && $hitung_topup <= 69) {
											echo "60";
										} else if ($hitung_topup >= 70 && $hitung_topup <= 79) {
											echo "80";
										} else if ($hitung_topup >= 80 && $hitung_topup <= 100) {
											echo "100";
										}
										?>"></div>
											</div>
											<span class="text-small margin-top-10 full-width">
										<?php echo $total_topup; ?> Total Topup</span>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6 col-12">
									<div class="card">
										<div class="panel-body">
											<h3>Total Penarikan</h3>
											<?php
										$ambil_pasif = $conn->query("SELECT epay_transaksi.id, epay_transaksi.created_at, epay_transaksi.pesan, epay_transaksi.status_transaksi, epay_transaksi.total, members.email, members.foto FROM epay_transaksi JOIN epay JOIN members ON epay_transaksi.id_epay=epay.id AND epay.id_member=members.id WHERE pesan LIKE 3");
										$total_staff_pasif = mysqli_num_rows($ambil_pasif);
										$hitung_pasif = (100 * $total_staff_pasif) / $total_transaksi;
									?>
											<div
												class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
												<div class="progress-bar progress-bar-info width-<?php
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
										<?php echo $total_staff_pasif; ?> Total Penarikan</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card card card-topline-yellow">
								<div class="card-head">
									<header>Akun E-Pay Aktif</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row">
									<ul class="empListWindow small-slimscroll-style">
									<?php $no=1; ?>
									<?php $ambilakun = $conn->query("SELECT epay.id, members.email, members.nama, members.foto, epay.kredit, epay.status FROM `members` join epay on members.id=epay.id WHERE epay.status LIKE 1 ORDER BY nama ASC") ?>
									<?php while($akun = $ambilakun->fetch_assoc()): ?>
											<li>
												<div class="prog-avatar">
													<img src="../../../img/dp/<?= $akun["foto"]; ?>" alt="" width="40" height="40">
												</div>
												<div class="details">
													<div class="title">
														<a href="#"><?= $akun["nama"]; ?></a>
														<p><a href="mailto:<?= $akun["email"]; ?>" class="clsAvailable"><?= $akun["email"]; ?></a></p>
													</div>
												</div>
											</li>
											<?php $no++; ?>
											<?php endwhile; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card card-topline-purple">
								<div class="card-head">
								<header>Topup E-Pay</header>
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
						<div class="col-md-12">
                            <div class="card card-topline-aqua">
                                <div class="card-head">
                                    <header>Penarikan E-Pay</header>
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
                                        <table id="example1" class="table table-hover table-checkable order-column full-width">
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
												<?php $ambil2 = $conn->query("SELECT epay_transaksi.id, epay_transaksi.created_at, epay_transaksi.pesan, epay_transaksi.status_transaksi, epay_transaksi.total, members.email, members.foto FROM epay_transaksi JOIN epay JOIN members ON epay_transaksi.id_epay=epay.id AND epay.id_member=members.id WHERE pesan LIKE 3 ORDER BY id DESC") ?>
												<?php while($pecah2 = $ambil2->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah2["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah2['created_at']; ?></td>
													<td class="center"><?= $pecah2['email']; ?></td>
													<td class="center">Rp. <?= $pecah2['total']; ?></td>
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