<?php
if(!defined('Index')) {
	header("Location: ../index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM users WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();
    $conn->query("DELETE FROM users WHERE id='$decrypt'");
    echo "<script>window.location='index.php?halaman=staff';</script>";
?>