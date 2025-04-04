<?php
include 'config.php';

// Konfirmasi pengembalian
if (isset($_GET['konfirmasi'])) {
    $id = $_GET['konfirmasi'];
    mysqli_query($mysqli, "UPDATE pengembalian SET status='Success' WHERE id='$id'");
}

// Hapus data pengembalian
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($mysqli, "DELETE FROM pengembalian WHERE id='$id'");
}

// Ambil data pengembalian
$query = "SELECT p.id, pe.nama_penyewa, p.tanggal_kembali, p.status_pembayaran, p.status
          FROM pengembalian p
          JOIN penyewa pe ON p.id_motor = pe.id";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengembalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="content">
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pengembalian</h2>
        
         <a href="pengembalian.php" class="btn mb-3 btn-primary">Input Pengembalian</a>


        <table class="table table-bordered table-hover ">
            <thead class="table-primary">
                <tr>
                    <th>Nama Penyewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Status Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="<?= ($row['status'] == 'Pending') ? 'table-warning' : 'table-success' ?>">
                    <td><?= $row['nama_penyewa'] ?></td>
                    <td><?= $row['tanggal_kembali'] ?></td>
                    <td><?= $row['status_pembayaran'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <?php if ($row['status'] == 'Pending') { ?>
                            <a href="?konfirmasi=<?= $row['id'] ?>" class="btn btn-sm btn-success">✔ Konfirmasi</a>
                        <?php } ?>
                        <a href="?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-danger">✖ Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

       
    </div>
</div>

</body>
</html>
