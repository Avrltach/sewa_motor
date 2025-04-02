<?php
include_once("config.php");

if (isset($_GET['id_motor'])) {
    $id_motor = $_GET['id_motor'];

    $result = mysqli_query($mysqli, "DELETE FROM motor WHERE id_motor='$id_motor'");

    // Kembalikan hasil dalam format JSON
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data!']);
    }
    exit();
}
?>
<body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah link default

            const idMotor = this.getAttribute('data-id');

            Swal.fire({
                title: 'Anda yakin?',
                text: "Data ini akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Menghitung URL untuk penghapusan
                    fetch(`delete_persediaan.php?id_motor=${idMotor}`)
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire(data.message, '', data.status)
                                .then(() => {
                                    // Reload halaman setelah konfirmasi
                                    window.location.reload();
                                });
                        });
                }
            });
        });
    });
});
</script>
</body>