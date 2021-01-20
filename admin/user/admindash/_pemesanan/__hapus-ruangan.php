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
                $ambil = $conn->query("SELECT booking.kode_booking, members.email, members.foto, ruangan.nomor, ruangan.nama, lokasi.nama_lokasi, booking.tgl_pakai, epay_transaksi.created_at, booking.status FROM epay_transaksi JOIN epay ON epay_transaksi.id_epay=epay.id JOIN members ON epay.id_member=members.id JOIN transaksi ON epay_transaksi.id_transaksi=transaksi.id_transaksi JOIN booking ON transaksi.kode_booking=booking.kode_booking JOIN ruangan ON booking.id_ruangan=ruangan.id_ruangan JOIN lokasi ON ruangan.kode_lokasi=lokasi.kode_lokasi WHERE booking.kode_booking= '$decrypt'");
                $pecah = $ambil->fetch_assoc();
                $nomor = $pecah['nomor'];
                $email = $pecah['email'];
                ?>
            <p>Apakah Anda yakin ingin membatalkan pemesanan ruangan nomor <b><?php echo $nomor ?></b> oleh <b><?php echo $email ?></b>  ?</p>
            <center>
            <a href="index.php?halaman=batal-ruangan-ok&id=<?php echo Base64_Encrypted::Crypter($pecah['kode_booking'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-round btn-success">Iya</a>
            <a href="index.php?halaman=pemesanan-ruangan" class="btn btn-round btn-danger">Tidak</a>
            </center>
            </div>
        </div>
    </div>
</div>