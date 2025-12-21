<?php
include "koneksi.php";

// Menangkap ID dari URL (metode GET)
$id = $_GET['id'];

// Query untuk menghapus data
$query = mysqli_query($koneksi, "DELETE FROM harga_sampah WHERE id = '$id'");

if ($query) {
    echo "<script>
            alert('Jenis Sampah Berhasil Dihapus!');
            window.location.href='khsAdmin.php';
          </script>";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>