<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Lokasi Kami</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?halaman=beranda">Beranda</a></li>
                <li class="active">Lokasi Kami</li>
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
            <h1>Lokasi Terbaik Kami</h1>
        </div>
        <div class="row">
            <?php $no=1; ?>
            <?php $ambil = $conn->query("SELECT * FROM lokasi ORDER BY kode_lokasi DESC") ?>
            <?php while($pecah = $ambil->fetch_assoc()): ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="hotel-box">
                    <!--header -->
                    <div class="header clearfix">
                        <img src="../../../img/lokasi/<?= $pecah["foto"]; ?>" alt="rooms-col-2" class="img-responsive">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <h3>
                            <a href="#"><?= $pecah["nama_lokasi"]; ?></a>
                        </h3>
                        <h5 class="location">
                            <a href="rooms-details.html">
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