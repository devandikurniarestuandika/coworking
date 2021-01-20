<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
//Ambil Data
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM pertanyaan WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();
$conn->query("UPDATE pertanyaan SET status='1' WHERE id='$decrypt'");
?>

<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Pertanyaan Tamu</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.php?halaman=beranda">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="index.php?halaman=pertanyaan">Pertanyaan</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Pertanyaan Tamu</li>
							</ol>
						</div>
					</div>
					<div class="tab-content tab-space">
						<div class="tab-pane active show" id="tab1">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-topline-gray">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="col-md-9">
												<div class="inbox-body">
													<div class="inbox-body no-pad">
														<section class="mail-list">
															<div class="mail-sender">
																<div class="mail-heading">
																	<h4 class="vew-mail-header"><b><?php echo $pecah['nama_layanan']; ?></b></h4>
																</div>
																<hr>
																<div class="media">
																	<a href="#" class="pull-left"> <img alt=""
																			src="../../../img/dp/default.png"
																			class="img-circle" width="40">
																	</a>
																	<div class="media-body">
																		<span class="date pull-right"><?php echo $pecah['created_at']; ?></span>
																		<h4 class="text-primary"><?php echo $pecah['nama']; ?></h4>
																		<small class="text-muted">Dari Email:
																		<?php echo $pecah['email']; ?></small>
																	</div>
																</div>
															</div>
															<div class="view-mail">
																<p>Permisi, izinkan saya untuk memperkenalkan diri terlebih dahulu sebelum ke poin utama. Nama saya adalah <?php echo $pecah['nama']; ?>. Saat ini saya berumur <?php echo $pecah['umur']; ?>, dan saat ini saya mengirimkan pertanyaan ini dengan <?php echo $pecah['nama_perusahaan']; ?>.</p>
																<p>Anda bisa menghubungi saya hanya melalui nomor <?php echo $pecah['telepon']; ?> bila ada sesuatu yang ingin dijawab. Anda juga bisa memriksa ktp saya, <?php echo $pecah['no_ktp']; ?>. Saya adalah seorang <?php
																		if ($pecah['kelamin'] == 0) {
																			echo "Wanita";
																		} else {
																			echo "Pria";
																		}
																		?> yang bahagia :D. Berikut ini adalah hal yang ingin saya sampaikan terkait dengan <?php echo $pecah['nama_layanan']; ?> :</p>
																<p><?php echo $pecah['pesan']; ?></p>
															</div>
															<div class="compose-btn pull-left">
																<a href="index.php?halaman=pertanyaan" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
																<a href="mailto:<?php echo $pecah['email']; ?>"
																	class="btn btn-sm btn-primary"><i
																		class="fa fa-reply"></i> Balas</a>
																<a href="index.php?halaman=pertanyaan-hapus&id=<?php echo Base64_Encrypted::Crypter($pecah['id'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
																<a href="#" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Cetak</a>
																</button>
															</div>
														</section>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>