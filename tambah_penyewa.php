<?php
include_once("config.php");

// Ambil daftar motor dari tabel motor
$result = mysqli_query($mysqli, "SELECT * FROM motor");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_penyewa = $_POST['nama_penyewa'];
    $motor_id = $_POST['motor_id'];
    $tanggal_sewa = $_POST['tanggal_sewa'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $alamat_penyewa = $_POST['alamat_penyewa'];

    $query = "INSERT INTO penyewa (nama_penyewa, motor_id, tanggal_sewa, tanggal_kembali, alamat_penyewa) VALUES ('$nama_penyewa', '$motor_id', '$tanggal_sewa', '$tanggal_kembali', '$alamat_penyewa')";
    
    if (mysqli_query($mysqli, $query)) {
        echo "<script>alert('Data penyewa berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Penyewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body >
<?php require 'sidebar.php'; ?>
  
  <div class="content" style="margin-left: 300px; padding: 20px;">
    <h2 class="mb-4">Tambah Penyewa Motor</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Penyewa</label>
            <input type="text" name="nama_penyewa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Motor yang Disewa</label>
            <select name="motor_id" class="form-select" required>
                <option value="">-- Pilih Motor --</option>
                <?php while ($motor = mysqli_fetch_assoc($result)) { ?>
                    <option value="<?= $motor['id_motor']; ?>"><?= $motor['nama_motor']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Sewa</label>
            <input type="date" name="tanggal_sewa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Penyewa</label>
            <textarea name="alamat_penyewa" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
  </body>
</html>
