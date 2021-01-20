<?php
if(!defined('S')) {
	header("Location: s.php?auth=daftar");
}
?>
<?php
date_default_timezone_set('Asia/Seoul');
//Tambah Data
if(isset($_POST["kirim"])) {
    $iemail = $_POST['email'];
    $inama = $_POST['nama'];
	$ipass = md5($_POST['password']);
	$iperusahaan = $_POST['perusahaan'];
	$idibuat = date("Y-m-d H:i:s");

    $ambil = $conn->query("SELECT * FROM members WHERE email='$iemail'");
    $yangcocok = $ambil->num_rows;
    if($yangcocok == 1){
        $alert = 1;
    } else {
		$conn->query("INSERT INTO members(no_ktp, email, telepon, nama, nama_perusahaan, password, tgl_lahir, bio, kelamin, status, aksi_oleh, created_at) VALUES('0', '$iemail', '0', '$inama', '$iperusahaan', '$ipass', '1980-01-01', 'Tidak ada biografi tertulis.', '0', '1', 'Diri Sendiri', '$idibuat')");
		$id_epay_baru = $conn->insert_id;
        $conn->query("INSERT INTO epay(id_member, pin, status, kredit) VALUES('$id_epay_baru', '$ipass', '0', '0')");
        
        echo "<script>window.location='s.php?auth=info-masuk&email=" . $_POST['email'] . "&password=" . $_POST['password'] . "';</script>";
    }
}
?>
<div class="form-content-box">
                    <!-- logo -->
                    <a href="#" class="clearfix alpha-logo">
                        <img src="../img/logos/white-logo.png" alt="white-logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <h3>Mendaftar akun baru</h3>
                        <?php if ($alert == 1) {
								?>
                                <p><strong>Galat!</strong> Alamat email sudah terpakai.</p>
                                <?php
							} ?>
                        <!-- Form start-->
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input required="" pattern=".{5,}" title="Mohon masukkan minimal setidaknya 5 karakter" maxlength="50" type="email" name="email" class="input-text" placeholder="Masukkan Alamat Email">
                            </div>
                            <div class="form-group">
                                <input required="" pattern=".{3,}" title="Mohon masukkan minimal setidaknya 3 karakter" maxlength="50" type="text" name="nama" class="input-text" placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" name="perusahaan" class="input-text" placeholder="Masukkan Nama Perusahaan">
                            </div>
                            <div class="form-group">
                                <input required="" pattern=".{6,}" title="Mohon masukkan kata sandi minimal setidaknya 6 karakter" maxlength="50" type="password" name="password" class="input-text" placeholder="Masukkan Kata Sandi">
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block" name="kirim">Buat akun</button>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            Sudah menjadi member? <a href="s.php?auth=masuk">Masuk disini</a>
                        </span>
                    </div>
                </div>