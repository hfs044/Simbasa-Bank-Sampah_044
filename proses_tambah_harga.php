<?php
include "koneksi.php";

// Menangkap data dari form tambah
$jenis_sampah   = $_POST['jenis_sampah'];
$harga_per_kg   = $_POST['harga_per_kg'];

// Query untuk memasukkan data baru
$query = mysqli_query($koneksi, "INSERT INTO harga_sampah (jenis_sampah, harga_per_kg) VALUES ('$jenis_sampah', '$harga_per_kg')");

if ($query) {
    echo "<script>
            alert('Jenis Sampah Baru Berhasil Ditambahkan!');
            window.location.href='khsAdmin.php';
          </script>";
} else {
    echo "Gagal menambahkan data: " . mysqli_error($koneksi);
}
?>