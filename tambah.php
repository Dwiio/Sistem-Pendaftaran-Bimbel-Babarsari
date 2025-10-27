<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Bimbel Babarsari</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Pendaftaran Bimbel Babarsari</h2>

  <form method="post">
    <label>Nama</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Paket Bimbingan</label><br>
    <input type="radio" name="paket" value="Intensif"> Intensif SBMPTN<br>
    <input type="radio" name="paket" value="Reguler"> Reguler<br>
    <input type="radio" name="paket" value="Supercamp"> Supercamp SBMPTN<br><br>

    <label>Fasilitas Tambahan</label><br>
    <input type="checkbox" name="fasilitas[]" value="Modul Cetak"> Modul Cetak<br>
    <input type="checkbox" name="fasilitas[]" value="Modul PDF"> Modul PDF<br>
    <input type="checkbox" name="fasilitas[]" value="Video"> Video Rekaman<br>
    <input type="checkbox" name="fasilitas[]" value="Diskusi"> Grup Diskusi<br><br>

    <label>Lokasi Cabang</label><br>
    <select name="lokasi" required>
      <option value="">-- Pilih Lokasi --</option>
      <option value="Jakarta">Jakarta</option>
      <option value="Surabaya">Surabaya</option>
      <option value="Yogyakarta">Yogyakarta</option>
      <option value="Makassar">Makassar</option>
      <option value="Aceh">Aceh</option>
    </select><br><br>

    <label>Metode Pembayaran</label><br>
    <select name="pembayaran" required>
      <option value="Transfer">Transfer Bank (+3000)</option>
      <option value="EWallet">E-Wallet (+2000)</option>
      <option value="Tunai">Tunai</option>
    </select><br><br>

    <label>Catatan</label><br>
    <textarea name="note">Tuliskan catatan tambahan</textarea><br><br>

    <button type="reset">Reset</button>
    <button type="submit" name="submit">Kirim</button>
  </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $paket = $_POST['paket'] ?? "Undefined";
    $fasilitas = isset($_POST['fasilitas']) ? implode(", ", $_POST['fasilitas']) : "-";
    $lokasi = $_POST['lokasi'];
    $pembayaran = $_POST['pembayaran'];
    $note = $_POST['note'];

    // --- Hitung total biaya ---
    $hargaPaket = [
        "Intensif" => 500000,
        "Reguler" => 750000,
        "Supercamp" => 1000000
    ];

    $hargaFasilitas = [
        "Modul Cetak" => 50000,
        "Modul PDF" => 25000,
        "Video" => 75000,
        "Diskusi" => 40000
    ];

    $hargaLokasi = [
        "Jakarta" => 100000,
        "Yogyakarta" => 80000,
        "Aceh" => 120000,
        "Surabaya" => 150000,
        "Makassar" => 115000
    ];

    $biayaPembayaran = [
        "Transfer" => 3000,
        "EWallet" => 2000,
        "Tunai" => 0
    ];

    $totalPaket = ($paket != "Undefined") ? $hargaPaket[$paket] : 0;
    $totalFasilitas = 0;
    foreach ($_POST['fasilitas'] ?? [] as $f) {
        $totalFasilitas += $hargaFasilitas[$f];
    }
    $totalLokasi = $hargaLokasi[$lokasi];
    $admin = $biayaPembayaran[$pembayaran];
    $subtotal = $totalPaket + $totalFasilitas + $totalLokasi;
    $pajak  = ($paket != "Undefined") ? $subtotal * 0.1 : 0;
    $totalBayar = $subtotal + $pajak + $admin;

    // --- Simpan ke database ---
    $sql = "INSERT INTO pendaftar (nama, email, paket, fasilitas, lokasi, pembayaran, note, total_bayar)
            VALUES ('$nama', '$email', '$paket', '$fasilitas', '$lokasi', '$pembayaran', '$note', '$totalBayar')";

    if ($koneksi->query($sql)) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $koneksi->error;
    }
}
?>
