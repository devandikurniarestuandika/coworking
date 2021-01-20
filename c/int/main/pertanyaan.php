<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<?php
date_default_timezone_set('Asia/Seoul');
//Tambah Data
if(isset($_POST["kirim"])) {
    $iktp = $_POST['ktp'];
    $iemail = $_POST['email'];
    $inama = $_POST['nama'];
    $itelepon = $_POST['telepon'];
    $iperusahaan = $_POST['perusahaan'];
    $iumur = $_POST['umur'];
    $ikelamin = $_POST['kelamin'];
    $ijenis = $_POST['jenis'];
    $ilayanan = $_POST['layanan'];
    $ipesan = $_POST['pesan'];
	$idibuat = date("Y-m-d H:i:s");

    $conn->query("INSERT INTO pertanyaan(no_ktp, email, telepon, nama, nama_perusahaan, umur, kelamin, jenis, nama_layanan, pesan, status, created_at) VALUES('$iktp', '$iemail', '$itelepon', '$inama', '$iperusahaan', '$iumur', '$ikelamin', '$ijenis', '$ilayanan', '$ipesan', '0', '$idibuat')");
    echo "<script>window.location='index.php?halaman=beranda';</script>";
}
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>Pertanyaan</h1>
            <ul class="breadcrumbs">
                <li><a href="index.php?halaman=beranda">Beranda</a></li>
                <li class="active">Ajukan Pertanyaan</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Contact 3 start -->
<div class="contact-3 content-area-6">
    <div class="container">
        <div class="main-title mb-60">
            <h1>Pertanyaan</h1>
            <p class="lead">Ajukan pertanyaan Anda disini terkait CowSpe.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <!-- Contact details start -->
                <div class="contact-info">
                    <h3>Info Kontak</h3>
                    <ul class="contact-list">
                        <li><i class="fa fa-map-marker"></i> Alamat: Jl. Manggis (Sebelah Amikom), Sleman, DIY.</li>
                        <li><i class="fa fa-phone"></i> +62 853-7737-6906</li>
                        <li><i class="mr-3 fa fa-envelope"></i> cs@vandiku.com</li>
                    </ul>
                    <h3>Ikuti Kami</h3>
                    <ul class="social-list clearfix">
                    <li>
                        <a href="https://facebook.com/drdevandi" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/drdevandi" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://instagram.com/drdevandi" class="rss">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    </ul>
                </div>
                <!-- Contact details end -->
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <!-- Contact form start -->
                <div class="contact-form">
                <form id="contact-form" role="form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group fullname">
                                    <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="text" name="ktp" class="input-text" placeholder="Masukkan Nomor KTP">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group enter-email">
                                    <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="email" name="email" class="input-text" placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="30" type="text" name="nama" class="input-text" placeholder="Masukkan Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group number">
                                    <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="number" name="telepon" class="input-text" placeholder="Masukkan Telepon">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="text" name="perusahaan" class="input-text" placeholder="Masukkan Nama Perusahaan/ Afiliasi">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group number">
                                    <input required="" pattern=".{1,}" title="Mohon masukkan minimal setidaknya 1 karakter" maxlength="2" type="number" name="umur" class="input-text" placeholder="Masukkan Umur Anda">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="kelamin">
                                        <option value="0">Pria</option>
                                        <option value="1">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <select class="selectpicker search-fields form-control-2" name="jenis">
                                        <option value="1">Pelayanan</option>
                                        <option value="2">Fasilitas</option>
                                        <option value="3">Penawaran</option>
                                        <option value="0">Umum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group subject">
                                    <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="30" type="text" name="layanan" class="input-text" placeholder="Masukkan Judul Layanan">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                <div class="form-group message">
                                    <textarea required="" class="input-text" name="pesan" placeholder="Tulis pesan disini"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="send-btn mb-0  text-center">
                                    <button type="submit" class="btn-md btn-theme" name="kirim">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Contact form end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact 3 end -->