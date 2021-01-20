<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambilfoto = $conn->query("SELECT * FROM produk WHERE id= '$decrypt'");
$detailfoto = $ambilfoto->fetch_assoc();
$namafilefoto = $detailfoto['foto'];
if ($namafilefoto == "none.png") {
	$conn->query("DELETE FROM produk WHERE id='$decrypt'");
	echo "<script>window.location='index.php?halaman=produk';</script>";
} else {
	unlink("../../../img/produk/" . $namafilefoto);
	$conn->query("DELETE FROM produk WHERE id='$decrypt'");
	echo "<script>window.location='index.php?halaman=produk';</script>";
}
?>