<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id_ruangan'], "My First Key", "My second Key", "My third Key", true, true);
$ambilfoto = $conn->query("SELECT * FROM ruangan WHERE id_ruangan= '$decrypt'");
$detailfoto = $ambilfoto->fetch_assoc();
$namafilefoto = $detailfoto['foto'];
if ($namafilefoto == "none.png") {
	$conn->query("DELETE FROM ruangan WHERE id_ruangan='$decrypt'");
	echo "<script>window.location='index.php?halaman=ruangan';</script>";
} else {
	unlink("../../../img/ruang/" . $namafilefoto);
	$conn->query("DELETE FROM ruangan WHERE id_ruangan='$decrypt'");
	echo "<script>window.location='index.php?halaman=ruangan';</script>";
}
?>