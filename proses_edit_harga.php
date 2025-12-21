<?php
include "koneksi.php";

// Menangkap data dari form modal edit
$id             = $_POST['id'];
$jenis_sampah   = $_POST['jenis_sampah'];
$harga_per_kg   = $_POST['harga_per_kg'];

// Query untuk memperbarui data berdasarkan ID
$query = mysqli_query($koneksi, "UPDATE harga_sampah SET 
    jenis_sampah    = '$jenis_sampah', 
    harga_per_kg    = '$harga_per_kg' 
    WHERE id        = '$id'");

if ($query) {
    echo "<script>
            alert('Harga Berhasil Diperbarui!');
            window.location.href='khsAdmin.php';
          </script>";
} else {
    echo "Gagal memperbarui harga: " . mysqli_error($koneksi);
}
?>