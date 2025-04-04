<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_motor = $_POST['id_motor'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status_pembayaran = $_POST['status_pembayaran'];

    // Simpan data pengembalian
    $query = "INSERT INTO pengembalian (id_motor, tanggal_kembali, status_pembayaran, status) 
              VALUES ('$id_motor', '$tanggal_kembali', '$status_pembayaran', 'Pending')";

    if (mysqli_query($mysqli, $query)) {
        $success_message = "Pengembalian berhasil dicatat!";
    } else {
        $error_message = "Error: " . mysqli_error($mysqli);
    }
}

// Ambil data penyewa dari tabel penyewa
$result = mysqli_query($mysqli, "SELECT * FROM penyewa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian Motor</title>
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
        <h2 class="mb-4">Form Pengembalian</h2>

        <?php if (isset($success_message)) { ?>
            <div class="alert alert-success"><?= $success_message ?></div>
        <?php } elseif (isset($error_message)) { ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php } ?>

        <div class="card shadow p-4">
            <form action="pengembalian.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Penyewa:</label>
                    <select name="id_motor" class="form-select" required>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_penyewa'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali:</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Pembayaran:</label>
                    <select name="status_pembayaran" class="form-select">
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
