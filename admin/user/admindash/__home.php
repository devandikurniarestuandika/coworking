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
								<li class="active">Info</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-blue">
									<span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Pemesanan</span>
										<span class="info-box-number">4</span>
										<div class="progress">
											<div class="progress-bar width-60"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-orange">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">card_travel</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Booking Baru</span>
										<span class="info-box-number">1</span>
										<div class="progress">
											<div class="progress-bar width-40"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-purple">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">phone_in_talk</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Permintaan</span>
										<span class="info-box-number">52</span>
										<div class="progress">
											<div class="progress-bar width-80"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-success">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">monetization_on</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Pendapatan</span>
										<span class="info-box-number">Rp. 10</span><span>jt</span>
										<div class="progress">
											<div class="progress-bar width-60"></div>
										</div>
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
						<div class="col-md-12 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>Detail Pemesanan</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table5">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama</th>
														<th>Check In</th>
														<th>Check Out</th>
														<th>Status</th>
														<th>Phone</th>
														<th>Jenis Ruangan</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Jens Brincker</td>
														<td>23/05/2016</td>
														<td>27/05/2016</td>
														<td>
															<span class="label label-sm label-success">paid</span>
														</td>
														<td>123456789</td>
														<td>Single</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Mark Hay</td>
														<td>24/05/2017</td>
														<td>26/05/2017</td>
														<td>
															<span class="label label-sm label-warning">unpaid </span>
														</td>
														<td>123456789</td>
														<td>Double</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Anthony Davie</td>
														<td>17/05/2016</td>
														<td>21/05/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>123456789</td>
														<td>Queen</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>David Perry</td>
														<td>19/04/2016</td>
														<td>20/04/2016</td>
														<td>
															<span class="label label-sm label-danger">unpaid</span>
														</td>
														<td>123456789</td>
														<td>King</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Anthony Davie</td>
														<td>21/05/2016</td>
														<td>24/05/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>123456789</td>
														<td>Single</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Alan Gilchrist</td>
														<td>15/05/2016</td>
														<td>22/05/2016</td>
														<td>
															<span class="label label-sm label-warning ">unpaid</span>
														</td>
														<td>123456789</td>
														<td>King</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>7</td>
														<td>Mark Hay</td>
														<td>17/06/2016</td>
														<td>18/06/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>123456789</td>
														<td>Single</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>8</td>
														<td>Sue Woodger</td>
														<td>15/05/2016</td>
														<td>17/05/2016</td>
														<td>
															<span class="label label-sm label-danger">unpaid</span>
														</td>
														<td>123456789</td>
														<td>Double</td>
														<td>
															<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
																<i class="fa fa-pencil"></i>
															</a>
															<button class="btn btn-tbl-delete btn-xs">
																<i class="fa fa-trash-o "></i>
															</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end Payment Details -->