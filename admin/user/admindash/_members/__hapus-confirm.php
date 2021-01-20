<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$conn->query("DELETE FROM epay WHERE id='$decrypt'");
$conn->query("DELETE FROM members WHERE id='$decrypt'");
echo "<script>window.location='index.php?halaman=members';</script>";
?>