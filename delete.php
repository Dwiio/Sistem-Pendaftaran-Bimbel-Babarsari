<?php
include 'koneksi.php';
$id = $_GET['id'] ?? 0;

if ($id > 0) {
    $koneksi->query("DELETE FROM pendaftar WHERE id = $id");
}

echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
exit;
?>
