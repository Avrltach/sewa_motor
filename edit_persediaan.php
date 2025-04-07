<?php
include_once("config.php");

if (!isset($_GET['id'])) {
    header("Location: index.php"); // ganti sesuai nama halaman utama kamu
    exit;
}

$id_motor = $_GET['id'];

// Ambil data motor berdasarkan id
$result = mysqli_query($mysqli, "SELECT * FROM motor WHERE id_motor=$id_motor");
$data = mysqli_fetch_assoc($result);

// Cek apakah data ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update saat form disubmit
if (isset($_POST['update'])) {
    $nama_motor = $_POST['nama_motor'];
    $tahun_kendaraan = $_POST['tahun_kendaraan'];
    $jenis_bahan_bakar = $_POST['jenis_bahan_bakar'];
    $cc_motor = $_POST['cc_motor'];

    mysqli_query($mysqli, "UPDATE motor SET 
        nama_motor='$nama_motor', 
        tahun_kendaraan='$tahun_kendaraan',
        jenis_bahan_bakar='$jenis_bahan_bakar',
        cc_motor='$cc_motor' 
        WHERE id_motor=$id_motor");

    header("Location: motor.php?edit=berhasil");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .content {
        margin-left: 300px;
        padding: 40px;
        transition: margin-left 0.5s;
    }
</style>
<body >
  <?php require 'sidebar.php'; ?>
  <div class="content">
    <h2>Edit Data Motor</h2>
    <form method="post">
        <div class="mb-3">
            <label>Nama Motor</label>
            <input type="text" name="nama_motor" class="form-control" value="<?= htmlspecialchars($data['nama_motor']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Tahun Kendaraan</label>
            <input type="number" name="tahun_kendaraan" class="form-control" value="<?= htmlspecialchars($data['tahun_kendaraan']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Jenis Bahan Bakar</label>
            <input type="text" name="jenis_bahan_bakar" class="form-control" value="<?= htmlspecialchars($data['jenis_bahan_bakar']) ?>" required>
        </div>
        <div class="mb-3">
            <label>CC Motor</label>
            <input type="number" name="cc_motor" class="form-control" value="<?= htmlspecialchars($data['cc_motor']) ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
        <a href="motor.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
