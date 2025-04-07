<?php
include_once("config.php");

if (isset($_GET['id'])) {
    $id_motor = $_GET['id'];

    // Hapus data dari tabel motor
    $result = mysqli_query($mysqli, "DELETE FROM motor WHERE id_motor=$id_motor");

    // Jika berhasil, redirect ke dashboard dengan notifikasi
    if ($result) {
        header("Location: motor.php?hapus=berhasil");
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
