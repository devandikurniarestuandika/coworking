<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);

$ambil = $conn->query("SELECT * FROM pemesanan WHERE kode_pemesanan= '$decrypt'");
$pecah = $ambil->fetch_assoc();
$status = $pecah['status'];

$conn->query("UPDATE pemesanan SET status='0' WHERE kode_pemesanan='$decrypt'");
echo "<script>window.location='index.php?halaman=pemesanan-produk';</script>";
?>