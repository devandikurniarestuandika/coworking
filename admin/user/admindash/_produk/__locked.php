<?php
if(!defined('Index')) {
	header("Location: index.php?halaman=beranda");
}
?>
<?php
$decrypt = Base64_Encrypted::Decrypter($_GET['id'], "My First Key", "My second Key", "My third Key", true, true);
$ambil = $conn->query("SELECT * FROM members WHERE id= '$decrypt'");
$pecah = $ambil->fetch_assoc();
$status = $pecah['status'];
if ($status == 1) {
    $conn->query("UPDATE members SET status='0' WHERE id='$decrypt'");
    echo "<script>window.location='index.php?halaman=members';</script>";
} else {
    $conn->query("UPDATE members SET status='1' WHERE id='$decrypt'");
    echo "<script>window.location='index.php?halaman=members';</script>";
}
?>