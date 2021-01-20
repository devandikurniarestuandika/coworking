<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['kode_lokasi'], "My First Key", "My second Key", "My third Key", true, true);
$ambilfoto = $conn->query("SELECT * FROM lokasi WHERE kode_lokasi= '$decrypt'");
$detailfoto = $ambilfoto->fetch_assoc();
$namafilefoto = $detailfoto['foto'];
if ($namafilefoto == "none.png") {
	$conn->query("DELETE FROM lokasi WHERE kode_lokasi='$decrypt'");
	echo "<script>window.location='index.php?halaman=lokasi';</script>";
} else {
	unlink("../../../img/lokasi/" . $namafilefoto);
	$conn->query("DELETE FROM lokasi WHERE kode_lokasi='$decrypt'");
	echo "<script>window.location='index.php?halaman=lokasi';</script>";
}
?>