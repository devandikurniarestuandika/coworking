<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<!-- Banner start -->
<div class="banner banner-style-3 banner-max-height">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../../../img/banner/banner-slider-3.jpg" alt="banner-slider-3">
                <div class="carousel-caption banner-slider-inner banner-top-align">
                    <div class="banner-content banner-content-left text-left">
                        <h1 data-animation="animated fadeInDown delay-05s"><span>Selamat Datang ke</span> CowSpe</h1>
                        <p data-animation="animated fadeInUp delay-1s">Pilihlah ruangan yang terbaik untuk menyelesaikan pekerjaan Anda. <br/>CowSpe hadir secara online untuk meningkatkan efektivitas waktu.</p>
                        <a href="index.php?halaman=lokasi" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Lihat Lokasi</a>
                        <a href="index.php?halaman=ruangan" class="btn btn-md border-btn-theme" data-animation="animated fadeInUp delay-15s">Lihat Ruangan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!-- Search area box 2 start -->
<div class="search-area-box-2 search-area-box-6">
    <div class="container">
        <div class="search-contents">
            <form method="GET">
                <div class="row search-your-details">
                    <div class="col-lg-3 col-md-3">
                        <div class="search-your-rooms mt-20">
                            <h3 class="hidden-xs hidden-sm">Cari</h3>
                            <h2 class="hidden-xs hidden-sm"><span>Ruangan</span> Anda</h2>
                            <h2 class="hidden-lg hidden-md">Cari <span>Ruangan</span> Anda</h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default datepicker" placeholder="Check In">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="btn-default datepicker" placeholder="Check Out">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="room">
                                        <option>Kotak pencarian belum berfungsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <div class="form-group">
                                    <button class="search-button btn-theme">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search area box 2 end -->

<!-- Services 2 start -->
<div class="services-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="service-text">
                    <h1>Properti Layanan</h1>
                    <p>Dengan didasari pelayanan dan penawaran terbaik. Kami bertekad menjadikan CowSpe sebagai penyedia layanan ruang kerja bersama terbaik se-indonesia.</p>
                    <p>Semua fasilitas yang memadai untuk menunjang pekerjaan Anda. Efektifitas ruang kerja bersama semakin digemari terutama CowSpe.</p>
                    <br>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-school-call-phone-reception"></i>
                            <h3>Resepsionis Terbaik</h3>
                            <p>Dilayani dengan sepenuh hati oleh resepsionis terbaik kami</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-room-service"></i>
                            <h3>Ruangan Bersih</h3>
                            <p>Ruangan bersih dan berkilau layaknya permata</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-graph-line-screen"></i>
                            <h3>TV Layar Datar</h3>
                            <p>Fasilitas gratis untuk presentasi menjadi menyenangkan</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-person-learning-by-reading"></i>
                            <h3>Tujuan Referensi</h3>
                            <p>Gudangnya referensi. Referensi pekerjaan dan belajar</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-parking"></i>
                            <h3>Bebas Parkir</h3>
                            <p>Bebas parkir tanpa hambatan, tidak keluarin duit</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="services-box">
                            <i class="flaticon-wifi-connection-signal-symbol"></i>
                            <h3>Wi-Fi Tercepat</h3>
                            <p>Fasilitas jaringan internet yang memadai dan gratis digunakan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services 2 end -->

<!-- Counters strat -->
<div class="counters">
    <h1>Statistik CowSpe</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <?php
                    $ambil_pelanggan = $conn->query("SELECT * FROM members WHERE status LIKE 1");
                    $total_pelanggan = mysqli_num_rows($ambil_pelanggan);
                    ?>
                    <h1 class="counter"><?php echo $total_pelanggan; ?></h1>
                    <h5>Pelanggan</h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <?php
                    $ambil_produk = $conn->query("SELECT * FROM produk");
                    $total_produk = mysqli_num_rows($ambil_produk);
                    ?>
                    <h1 class="counter"><?php echo $total_produk; ?></h1>
                    <h5>Produk</h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bordered-right">
                <div class="counter-box">
                    <?php
                    $ambil_lokasi = $conn->query("SELECT * FROM lokasi");
                    $total_lokasi = mysqli_num_rows($ambil_lokasi);
                    ?>
                    <h1 class="counter"><?php echo $total_lokasi; ?></h1>
                    <h5>Lokasi Strategis</h5>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="counter-box counter-box-2">
                    <?php
                    $ambil_ruangan = $conn->query("SELECT * FROM ruangan");
                    $total_ruangan = mysqli_num_rows($ambil_ruangan);
                    ?>
                    <h1 class="counter"><?php echo $total_ruangan; ?></h1>
                    <h5>Ruangan</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->