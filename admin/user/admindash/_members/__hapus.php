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
                $decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
                $ambil = $conn->query("SELECT * FROM members WHERE id= '$decrypt'");
                $pecah = $ambil->fetch_assoc();
                $nama = $pecah['nama'];
                ?>
            <p>Apakah Anda yakin ingin menghapus akun <?php echo $nama ?> ?</p>
            <center>
            <a href="index.php?halaman=members-ok&id=<?php echo Base64_Encrypted::Crypter($pecah['id'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-round btn-success">Iya</a>
            <a href="index.php?halaman=members" class="btn btn-round btn-danger">Tidak</a>
            </center>
            </div>
        </div>
    </div>
</div>