<?php
include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM motor ORDER BY id_motor DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .content {
            padding: 20px; 
        }
        .wide-table {
            table-layout: auto; 
            width: 100%; 
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9 content">
            <h2 class="text-center">Daftar Motor Iksan</h2>
            <a href="tambah_persediaan.php" class="btn btn-info mb-3">Tambah Persediaan Motor</a>

            <table class="table table-bordered table-striped wide-table">
                <thead class="table-secondary">
                    <tr>
                        <th>Id</th>
                        <th>Nama Motor</th>
                        <th>Tahun Kendaraan</th>
                        <th>Jenis Bahan Bakar</th>
                        <th>CC Motor</th>
                        <th>Gambar Motor</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($data['id_motor']); ?></td>
                            <td><?= htmlspecialchars($data['nama_motor']); ?></td>
                            <td><?= htmlspecialchars($data['tahun_kendaraan']); ?></td>
                            <td><?= htmlspecialchars($data['jenis_bahan_bakar']); ?></td>
                            <td><?= htmlspecialchars($data['cc_motor']); ?></td>
                            <td>
                                <img src="<?= htmlspecialchars($data['gambar_motor']); ?>" alt="Gambar Motor" style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <a href="edit_persediaan.php?id=<?= $data['id_motor']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_persediaan.php?id=<?= $data['id_motor']; ?>" class="btn btn-danger btn-sm btn-delete" data-id="<?= $data['id_motor']; ?>">Hapus</a>                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tambahkan SweetAlert2 & Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>