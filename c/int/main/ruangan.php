<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Ruangan Kami</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?halaman=beranda">Beranda</a></li>
                <li class="active">Ruangan Kami</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- rooms section start -->
<div class="content-area rooms-section">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Ruangan Terbaik Kami</h1>
        </div>
        <div class="row">
            <?php $no=1; ?>
            <?php $ambil = $conn->query("SELECT ruangan.id_ruangan, ruangan.nama, ruangan.deskripsi, ruangan.kapasitas, ruangan.harga, ruangan.foto, lokasi.alamat FROM ruangan JOIN lokasi ON ruangan.kode_lokasi=lokasi.kode_lokasi ORDER BY id_ruangan DESC") ?>
            <?php while($pecah = $ambil->fetch_assoc()): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="hotel-box">
                    <!--header -->
                    <div class="header clearfix">
                        <img src="../../../img/ruang/<?= $pecah["foto"]; ?>" alt="room-col-4" class="img-responsive">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <div class="pr">
                            <div class="rating">
                                Rp. <?= $pecah["harga"]; ?>
                            </div>
                        </div>
                        <h3>
                            <a href="rooms-details.html"><?= $pecah["nama"]; ?></a>
                        </h3>
                        <h5 class="location">
                            <a href="#">
                                <i class="fa fa-building"></i><?= $pecah["kapasitas"]; ?>
                            </a>
                        </h5>
                        <h5 class="location">
                            <a href="#">
                                <i class="fa fa-map-marker"></i><?= $pecah["alamat"]; ?>
                            </a>
                        </h5>
                        <p><?= $pecah["deskripsi"]; ?></p>
                    </div>
                </div>
            </div>
            <?php $no++; ?>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<!-- rooms section end -->