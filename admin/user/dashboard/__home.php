<?php
if(!defined('Index')) {
	header("Location: index.php");
}
?>
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Selamat Datang, <?php $namafunc->Nama(); ?>!</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=home">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dahboard</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">account_circle</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Pelanggan</span>
										<?php
										$ambil_pelanggan = $conn->query("SELECT * FROM members");
										$total_pelanggan = mysqli_num_rows($ambil_pelanggan);
										?>
										<span class="info-box-number"><?php echo $total_pelanggan; ?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">group</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Staff</span>
										<?php
										$ambil_staff = $conn->query("SELECT * FROM users");
										$total_staff = mysqli_num_rows($ambil_staff);
										?>
										<span class="info-box-number"><?php echo $total_staff; ?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">vpn_key</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Ruangan</span>
										<?php
										$ambil_ruangan = $conn->query("SELECT * FROM ruangan");
										$total_ruangan = mysqli_num_rows($ambil_ruangan);
										?>
										<span class="info-box-number"><?php echo $total_ruangan; ?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-success">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">restaurant_menu</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Produk</span>
										<?php
										$ambil_produk = $conn->query("SELECT * FROM ruangan");
										$total_produk = mysqli_num_rows($ambil_produk);
										?>
										<span class="info-box-number"><?php echo $total_produk; ?></span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- end widget -->
					<!-- start Payment Details -->
					<div class="row">
					<div class="col-md-12">
                            <div class="card card-topline-red">
                                <div class="card-head">
                                    <header>Pemesanan Produk</header>
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
													<th class="center"> Email </th>
													<th class="center"> Lokasi </th>
													<th class="center"> Produk </th>
													<th class="center"> Tgl Beli </th>
													<th class="center"> Status </th>
													<th class="center"> Aksi </th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php $ambil = $conn->query("SELECT pemesanan.kode_pemesanan, produk.nama, pemesanan.status, pemesanan.total_harga, members.email, members.foto, epay_transaksi.created_at, lokasi.nama_lokasi FROM epay_transaksi JOIN epay ON epay_transaksi.id_epay=epay.id JOIN members ON epay.id_member=members.id JOIN transaksi ON epay_transaksi.id_transaksi=transaksi.id_transaksi JOIN pemesanan ON transaksi.kode_pemesanan=pemesanan.kode_pemesanan JOIN detail_pemesanan ON pemesanan.id_pesan=detail_pemesanan.id_pesan JOIN produk ON detail_pemesanan.id_produk=produk.id JOIN lokasi ON produk.kode_lokasi=lokasi.kode_lokasi ORDER BY kode_pemesanan DESC") ?>
												<?php while($pecah = $ambil->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecah["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecah['email']; ?></td>
													<td class="center"><?= $pecah['nama_lokasi']; ?></td>
													<td class="center"><?= $pecah['nama']; ?></td>
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
																?><a href="index.php?halaman=batal-produk&id=<?php echo Base64_Encrypted::Crypter($pecah['kode_pemesanan'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
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
						<div class="col-md-12">
							<div class="card card-topline-green">
								<div class="card-head">
								<header>Pemesanan Ruangan</header>
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
												<?php $ambilbook = $conn->query("SELECT booking.kode_booking, members.email, members.foto, ruangan.nomor, ruangan.nama, lokasi.nama_lokasi, booking.tgl_pakai, epay_transaksi.created_at, booking.status FROM epay_transaksi JOIN epay ON epay_transaksi.id_epay=epay.id JOIN members ON epay.id_member=members.id JOIN transaksi ON epay_transaksi.id_transaksi=transaksi.id_transaksi JOIN booking ON transaksi.kode_booking=booking.kode_booking JOIN ruangan ON booking.id_ruangan=ruangan.id_ruangan JOIN lokasi ON ruangan.kode_lokasi=lokasi.kode_lokasi ORDER BY kode_booking DESC") ?>
												<?php while($pecahbook = $ambilbook->fetch_assoc()): ?>
												<tr class="odd gradeX">
													<td class="user-circle-img">
														<img weight="40px" height="40px" src="../../../img/dp/<?= $pecahbook["foto"]; ?>" alt="">
													</td>
													<td class="center"><?= $pecahbook['email']; ?></td>
													<td class="center"><?= $pecahbook['nama_lokasi']; ?></td>
													<td class="center"><?= $pecahbook['nomor']; ?></td>
													<td class="center"><?= $pecahbook['nama']; ?></td>
													<td class="center"><?php echo date('d F Y', strtotime($pecahbook['tgl_pakai'])); ?></td>
													<td class="center"><?php echo date('d F Y', strtotime($pecahbook['created_at'])); ?></td>
													<td class="center">
														<?php
															if ($pecahbook['status'] == 1) {
																?><span class="label label-sm label-success">Lunas </span><?php
															} elseif ($pecahbook['status'] == 2) {
																?><span class="label label-sm label-primary">Pending </span><?php
															} else {
																?><span class="label label-sm label-danger">Batal </span><?php
															}
														?>
														
													</td>
													<td class="center">
														<?php
															if ($pecahbook['status'] == 1) {
																?><a href="index.php?halaman=batal-ruangan&id=<?php echo Base64_Encrypted::Crypter($pecahbook['kode_booking'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-tbl-edit btn-xs">
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
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Penjualan</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Minggu ini</span>
											<h5 class="m-b-0">6</h5>
											<span><i class="material-icons text-success">trending_up</i>
												+28%</span>
										</div>
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Bulan ini</span>
											<h5 class="m-b-0">1</h5>
											<span><i class="material-icons text-danger">trending_down</i>
												-9%</span>
										</div>
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Rata-rata</span>
											<h5 class="m-b-0">2</h5>
											<span><i class="material-icons text-success">trending_up</i>
												+7%</span>
										</div>
									</div>
									<div id="sparkline28"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Penghasilan</header>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Minggu ini</span>
											<h5 class="m-b-0">3</h5>
											<span><i class="material-icons text-success">trending_up</i>
												+21%</span>
										</div>
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Bulan ini</span>
											<h5 class="m-b-0">2</h5>
											<span><i class="material-icons text-danger">trending_down</i>
												-6.3%</span>
										</div>
										<div class="col-sm-4 col-4 m-b-10">
											<span class="text-muted">Rata-rata</span>
											<h5 class="m-b-0">2</h5>
											<span><i class="material-icons text-success">trending_up</i>
												+6%</span>
										</div>
									</div>
									<div id="sparkline29"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="card card-topline-yellow ">
								<div class="card-head">
									<header>Pertanyaan Tamu</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="row">
										<ul class="docListWindow small-slimscroll-style">
												<?php $no=1; ?>
												<?php $ambilper = $conn->query("SELECT * FROM `pertanyaan` ORDER BY id DESC") ?>
												<?php while($per = $ambilper->fetch_assoc()): ?>
											<li>
												<div class="row">
													<div class="col-md-8 col-sm-8">
														<div class="prog-avatar">
															<img src="../../../img/dp/default.png" alt="" width="40"
																height="40">
														</div>
														<div class="details">
															<div class="title">
																<a href="mailto:<?= $per['email']; ?>"><?= $per['nama']; ?></a>
																<p class="rating-text"><?= $per['nama_layanan']; ?></p>
															</div>
														</div>
													</div>
													<div class="col-md-4 col-sm-4">
														<i class="material-icons">sms</i>
														<i class="material-icons">phone_locked</i>
														<i class="material-icons">sync_disabled</i>
														<i class="material-icons">notifications_active</i>
														<i class="material-icons">person</i>
													</div>
												</div>
											</li>
											<?php $no++; ?>
											<?php endwhile; ?>
										</ul>
										<div class="full-width text-center p-t-10">
											<a href="index.php?halaman=pertanyaan" class="btn purple btn-outline btn-circle margin-0">Lihat Semua</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-12">
							<div class="card card-topline-aqua">
								<div class="card-head">
									<header>Ringkasan</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row text-center">
										<div class="col-sm-4 col-6">
											<?php
											$ambilepay = $conn->query("SELECT COUNT(id) FROM epay_transaksi");
											$pecahepay = $ambilepay->fetch_assoc();
											?>
											<h4 class="margin-0"><?php echo $pecahepay['COUNT(id)']; ?> </h4>
											<p class="text-muted"> Transaksi E-Pay</p>
										</div>
										<div class="col-sm-4 col-6">
											<?php
											$ambiltrans = $conn->query("SELECT COUNT(id_transaksi) FROM transaksi");
											$pecahtrans = $ambiltrans->fetch_assoc();
											?>
											<h4 class="margin-0"><?php echo $pecahtrans['COUNT(id_transaksi)']; ?> </h4>
											<p class="text-muted">Transaksi Produk & Ruang</p>
										</div>
										<div class="col-sm-4 col-6">
											<?php
											$ambilpert = $conn->query("SELECT COUNT(id) FROM pertanyaan");
											$pecahpert = $ambilpert->fetch_assoc();
											?>
											<h4 class="margin-0"><?php echo $pecahpert['COUNT(id)']; ?> </h4>
											<p class="text-muted">Pertanyaan Tamu</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- end Payment Details -->