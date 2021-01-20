<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="card card-topline-red">
            <div class="card-head">
                <header>Pemberitahuan</header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body no-padding height-9">
                <?php
                $decrypt = Base64_Encrypted::Decrypter($_GET['kode_lokasi'], "My First Key", "My second Key", "My third Key", true, true);
                $ambil = $conn->query("SELECT * FROM lokasi WHERE kode_lokasi= '$decrypt'");
                $pecah = $ambil->fetch_assoc();
                $nama = $pecah['nama_lokasi'];
                ?>
            <p>Apakah Anda yakin ingin menghapus lokasi <?php echo $nama ?> ?</p>
            <center>
            <a href="index.php?halaman=lokasi-ok&kode_lokasi=<?php echo Base64_Encrypted::Crypter($pecah['kode_lokasi'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-round btn-success">Iya</a>
            <a href="index.php?halaman=lokasi" class="btn btn-round btn-danger">Tidak</a>
            </center>
            </div>
        </div>
    </div>
</div>