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
						<div class="col-md-12">
							<div class="card card-box">
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
												<a href="index.php?halaman=members-tambah" id="addRow" class="btn btn-info">
													Tambah Pelanggan <i class="fa fa-plus"></i>
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
													<th class="center"> No. KTP </th>
													<th class="center"> Email </th>
													<th class="center"> Telepon </th>
													<th class="center"> Nama </th>
													<th class="center"> Status </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT * FROM members ORDER BY nama ASC") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah['no_ktp']; ?></td>
													<td class="center"><?= $pecah['email']; ?></td>
													<td class="center"><?= $pecah['telepon']; ?></td>
													<td class="center"><?= $pecah['nama']; ?></td>
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
														<a href="index.php?halaman=members-edit&id=<?php echo Base64_Encrypted::Crypter($pecah['id'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="index.php?halaman=members-kunci&id=<?php echo Base64_Encrypted::Crypter($pecah['id'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-key"></i>
														</a>
														<a href="index.php?halaman=members-hapus&id=<?php echo Base64_Encrypted::Crypter($pecah['id'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-delete btn-xs">
															<i class="fa fa-trash-o"></i>
														</a>
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