<?php
include 'koneksi.php';
$id = $_GET['id'] ?? 0;
$data = $koneksi->query("SELECT * FROM pendaftar WHERE id = $id")->fetch_assoc();

if (!$data) {
    die("Data tidak ditemukan!");
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $paket = $_POST['paket'];
    $fasilitas = isset($_POST['fasilitas']) ? implode(", ", $_POST['fasilitas']) : "-";
    $lokasi = $_POST['lokasi'];
    $pembayaran = $_POST['pembayaran'];
    $note = $_POST['note'];
    $total_bayar = $_POST['total_bayar'];

    $sql = "UPDATE pendaftar SET 
            nama='$nama', email='$email', paket='$paket', fasilitas='$fasilitas', 
            lokasi='$lokasi', pembayaran='$pembayaran', note='$note', total_bayar='$total_bayar'
            WHERE id=$id";

    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Update Pendaftar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Update Data Pendaftar</h2>

  <form method="post" style="width:60%; margin:auto;">
    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required><br><br>

    <label>Paket</label><br>
    <input type="text" name="paket" value="<?= htmlspecialchars($data['paket']) ?>"><br><br>

    <label>Fasilitas</label><br>
    <textarea name="fasilitas"><?= htmlspecialchars($data['fasilitas']) ?></textarea><br><br>

    <label>Lokasi</label><br>
    <input type="text" name="lokasi" value="<?= htmlspecialchars($data['lokasi']) ?>"><br><br>

    <label>Pembayaran</label><br>
    <input type="text" name="pembayaran" value="<?= htmlspecialchars($data['pembayaran']) ?>"><br><br>

    <label>Catatan</label><br>
    <textarea name="note"><?= htmlspecialchars($data['note']) ?></textarea><br><br>

    <label>Total Bayar</label><br>
    <input type="number" name="total_bayar" value="<?= htmlspecialchars($data['total_bayar']) ?>"><br><br>

    <button type="submit" name="update">Update</button>
  </form>

  <div style="text-align:center; margin-top:20px;">
    <a href="index.php"><button type="button">Kembali</button></a>
  </div>
</body>
</html>
