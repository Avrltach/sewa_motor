<?php 
include_once("config.php");

if (isset($_POST['Submit'])) {
    $nama_motor = $_POST['nama_motor'];
    $tahun_kendaraan = $_POST['tahun_kendaraan'];
    $jenis_bahan_bakar = $_POST['jenis_bahan_bakar'];
    $cc_motor = $_POST['cc_motor'];

    
    $target_file = basename($_FILES["gambar_motor"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    
    if (getimagesize($_FILES["gambar_motor"]["tmp_name"]) === false) {
        $uploadOk = 0;
    }

    
    if ($_FILES["gambar_motor"]["size"] > 3 * 1024 * 1024 || !in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $uploadOk = 0;
    }

    
    if ($uploadOk == 1 && move_uploaded_file($_FILES["gambar_motor"]["tmp_name"], $target_file)) {
        mysqli_query($mysqli, "INSERT INTO motor(nama_motor, tahun_kendaraan, jenis_bahan_bakar, cc_motor, gambar_motor) 
        VALUES('$nama_motor', '$tahun_kendaraan', '$jenis_bahan_bakar', '$cc_motor', '$target_file')");
        $success_message = "Motor berhasil ditambahkan!";
    } else {
        $error_message = "Gambar tidak valid atau terjadi kesalahan saat mengupload.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
        }
        .card {
            border-radius: 15px;
            border: none;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-secondary {
            background-color: #007bff;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php require 'sidebar.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4>Form Tambah Motor</h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($success_message)): ?>
                                <div class="alert alert-success">
                                    <?= $success_message ?>
                                    <a href="motor.php" class="btn btn-sm btn-outline-success ms-3">Lihat Daftar Motor</a>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger"><?= $error_message ?></div>
                            <?php endif; ?>

                            <form action="tambah_persediaan.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Nama Motor</label>
                                    <input type="text" name="nama_motor" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tahun Kendaraan</label>
                                    <input type="number" name="tahun_kendaraan" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Bahan Bakar</label>
                                    <input type="text" name="jenis_bahan_bakar" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">CC Motor</label>
                                    <input type="number" name="cc_motor" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Motor</label>
                                    <input type="file" name="gambar_motor" class="form-control" accept="image/*" required>
                                </div>
                                <button type="submit" name="Submit" class="btn btn-secondary w-100">Kirim Data Motor</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="motor.php" class="btn btn-outline-secondary">Kembali ke Daftar Motor</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>