<?php
include 'koneksi.php';
$id = $_GET['id'] ?? 0;
$data = $koneksi->query("SELECT * FROM pendaftar WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pendaftar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Detail Pendaftar</h2>

  <?php if ($data): ?>
  <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; border-collapse:collapse;">
    <tr><td><b>ID</b></td><td><?= $data['id'] ?></td></tr>
    <tr><td><b>Nama</b></td><td><?= htmlspecialchars($data['nama']) ?></td></tr>
    <tr><td><b>Email</b></td><td><?= htmlspecialchars($data['email']) ?></td></tr>
    <tr><td><b>Paket</b></td><td><?= htmlspecialchars($data['paket']) ?></td></tr>
    <tr><td><b>Fasilitas</b></td><td><?= htmlspecialchars($data['fasilitas']) ?></td></tr>
    <tr><td><b>Lokasi</b></td><td><?= htmlspecialchars($data['lokasi']) ?></td></tr>
    <tr><td><b>Pembayaran</b></td><td><?= htmlspecialchars($data['pembayaran']) ?></td></tr>
    <tr><td><b>Catatan</b></td><td><?= htmlspecialchars($data['note']) ?></td></tr>
    <tr><td><b>Total Bayar</b></td><td>Rp<?= number_format($data['total_bayar'], 0, ",", ".") ?></td></tr>
  </table>
  <?php else: ?>
    <p style="text-align:center;">Data tidak ditemukan.</p>
  <?php endif; ?>

  <div style="text-align:center; margin-top:20px;">
    <a href="index.php"><button>Kembali</button></a>
  </div>
</body>
</html>
