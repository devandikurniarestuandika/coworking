<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);

$ambil = $conn->query("SELECT * FROM booking WHERE kode_booking= '$decrypt'");
$pecah = $ambil->fetch_assoc();
$status = $pecah['status'];

$conn->query("UPDATE booking SET status='0' WHERE kode_booking='$decrypt'");
echo "<script>window.location='index.php?halaman=pemesanan-ruangan';</script>";
?>