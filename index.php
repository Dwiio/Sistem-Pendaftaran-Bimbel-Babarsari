<?php
include 'koneksi.php';
$result = $koneksi->query("SELECT * FROM pendaftar");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pendaftaran Bimbel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="text-center mb-4 fw-bold">Data Pendaftaran Bimbel</h2>

  <div class="text-start mb-3">
    <a href="tambah.php" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Tambah Data
    </a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Paket</th>
            <th>Total Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td class="fw-semibold"><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['paket']) ?></td>
                <td>Rp <?= number_format($row['total_bayar'], 2, ",", ".") ?></td>
                <td>
                  <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                    <i class="bi bi-eye"></i>
                  </a>
                  <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning text-white">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="delete.php?id=<?= $row['id'] ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Yakin ingin menghapus data ini?')">
                    <i class="bi bi-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center text-muted">Tidak ada data pendaftar.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
