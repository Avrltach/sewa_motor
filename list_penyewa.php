<?php
include_once("config.php");

// Fetch rental list with motorcycle details
$result = mysqli_query($mysqli, "SELECT p.*, m.nama_motor 
                                FROM penyewa p 
                                JOIN motor m ON p.motor_id = m.id_motor 
                                ORDER BY p.tanggal_sewa DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Penyewa Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .content {
            margin-left: 300px;
            padding: 20px;
            transition: margin-left 0.5s;
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
<?php require 'sidebar.php'; ?>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Penyewa Motor</h2>
        <a href="tambah_penyewa.php" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Penyewa
        </a>
    </div>

            <div class="table-responsive ">
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Motor</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while($row = mysqli_fetch_array($result)) { 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['nama_penyewa']) ?></td>
                            <td><?= htmlspecialchars($row['nama_motor']) ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_sewa'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_kembali'])) ?></td>
                            <td><?= htmlspecialchars($row['alamat_penyewa']) ?></td>
                            <td>
                                <a href="edit_penyewa.php?id=<?= $row['id'] ?>" 
                                   class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="hapus_penyewa.php?id=<?= $row['id'] ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                   title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if (mysqli_num_rows($result) == 0) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data penyewa</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>