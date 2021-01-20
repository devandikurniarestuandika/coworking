<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>

<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Pengelolaan Penjadwalan</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=penjadwalan">Penjadwalan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Semua Penjadwalan</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="panel-body">
									<h3>Total Entri Jadwal</h3>
									<?php
										$ambil_all = $conn->query("SELECT * FROM jadwal");
										$total_pelanggan = mysqli_num_rows($ambil_all);
									?>
									<div
										class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
										<div class="progress-bar progress-bar-orange width-100" role="progressbar"></div>
									</div>
									<span class="text-small margin-top-10 full-width">
										<?php echo $total_pelanggan; ?> Total Entri Jadwal</span>
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
												<a href="index.php?halaman=penjadwalan-tambah" id="addRow" class="btn btn-info">
													Tambah Jadwal <i class="fa fa-plus"></i>
												</a>
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
													<th class="center"> Jadwal </th>
													<th class="center"> Lokasi </th>
													<th class="center"> Ruangan </th>
													<th class="center"> Kapasitas </th>
													<th class="center"> Status </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT jadwal.no_jadwal, jadwal.tanggal, jadwal.status_jadwal, ruangan.nama, ruangan.kapasitas, ruangan.foto, lokasi.nama_lokasi  FROM jadwal JOIN ruangan JOIN lokasi ON jadwal.id_ruangan=ruangan.id_ruangan AND lokasi.kode_lokasi=ruangan.kode_lokasi") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/ruang/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?php echo date('d F Y', strtotime($pecah['tanggal'])); ?></td>
													<td class="center"><?= $pecah['nama_lokasi']; ?></td>
													<td class="center"><?= $pecah['nama']; ?></td>
													<td class="center"><?= $pecah['kapasitas']; ?></td>
													<td class="center">
														<?php
															if ($pecah['status_jadwal'] == 1) {
																?><span class="label label-sm label-success">Tersedia </span><?php
															} else {
																?><span class="label label-sm label-danger">Tidak Tersedia </span><?php
															}
														?>
														
													</td>
													<td class="center">
														<a href="index.php?halaman=penjadwalan-edit&id=<?php echo Base64_Encrypted::Crypter($pecah['no_jadwal'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
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