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
                $ambil = $conn->query("SELECT pemesanan.kode_pemesanan, produk.nama, pemesanan.status, pemesanan.total_harga, members.email, members.foto, epay_transaksi.created_at, lokasi.nama_lokasi FROM epay_transaksi JOIN epay ON epay_transaksi.id_epay=epay.id JOIN members ON epay.id_member=members.id JOIN transaksi ON epay_transaksi.id_transaksi=transaksi.id_transaksi JOIN pemesanan ON transaksi.kode_pemesanan=pemesanan.kode_pemesanan JOIN detail_pemesanan ON pemesanan.id_pesan=detail_pemesanan.id_pesan JOIN produk ON detail_pemesanan.id_produk=produk.id JOIN lokasi ON produk.kode_lokasi=lokasi.kode_lokasi WHERE pemesanan.kode_pemesanan= '$decrypt'");
                $pecah = $ambil->fetch_assoc();
                $nama = $pecah['nama'];
                $email = $pecah['email'];
                ?>
            <p>Apakah Anda yakin ingin membatalkan pemesanan produk <b><?php echo $nama ?></b> oleh <b><?php echo $email ?></b>  ?</p>
            <center>
            <a href="index.php?halaman=batal-produk-ok&id=<?php echo Base64_Encrypted::Crypter($pecah['kode_pemesanan'], "My First Key", "My second Key", "My third Key", true, true); ?>" class="btn btn-round btn-success">Iya</a>
            <a href="index.php?halaman=pemesanan-produk" class="btn btn-round btn-danger">Tidak</a>
            </center>
            </div>
        </div>
    </div>
</div>