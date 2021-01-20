<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>

<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Pengelolaan E-Pay Pelanggan</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=epay">E-Pay</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Daftar E-Pay Pelanggan</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Total Akun E-Pay</h3>
									<?php
										$ambil_all = $conn->query("SELECT * FROM epay");
										$total_staff = mysqli_num_rows($ambil_all);
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-orange width-100" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_staff; ?> Total Akun E-Pay</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Akun E-Pay Aktif</h3>
									<?php
										$ambil_aktif = $conn->query("SELECT epay.id, members.email, members.nama, epay.kredit, epay.status FROM `members` join epay on members.id=epay.id where epay.status like 1");
										$total_staff_aktif = mysqli_num_rows($ambil_aktif);
										$hitung_aktif = (100 * $total_staff_aktif) / $total_staff;
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
										<?php echo $total_staff_aktif; ?> Akun Aktif</span>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Akun E-Pay Pasif</h3>
									<?php
										$ambil_pasif = $conn->query("SELECT epay.id, members.email, members.nama, epay.kredit, epay.status FROM `members` join epay on members.id=epay.id where epay.status like 0");
										$total_staff_pasif = mysqli_num_rows($ambil_pasif);
										$hitung_pasif = (100 * $total_staff_pasif) / $total_staff;
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
										<?php echo $total_staff_pasif; ?> Akun Pasif</span>
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
											<div class="btn-group">
											</div>
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
													<th class="center"> Nama </th>
													<th class="center"> Kredit </th>
													<th class="center"> Status </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT epay.id, members.email, members.nama, members.foto, epay.kredit, epay.status FROM `members` join epay on members.id=epay.id ORDER BY nama ASC") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah['email']; ?></td>
													<td class="center"><?= $pecah['nama']; ?></td>
													<td class="center">Rp. <?= $pecah['kredit']; ?></td>
													<td class="center">
														<?php
															if ($pecah['status'] == 1) {
																?><span class="label label-sm label-success">Aktif </span><?php
															} else {
																?><span class="label label-sm label-danger">Tidak Aktif </span><?php
															}
														?>
													</td>
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