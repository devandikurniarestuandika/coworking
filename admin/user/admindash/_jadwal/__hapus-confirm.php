<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$conn->query("DELETE FROM jadwal WHERE no_jadwal='$decrypt'");
echo "<script>window.location='index.php?halaman=penjadwalan';</script>";
?>