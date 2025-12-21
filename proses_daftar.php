<?php
include "koneksi.php";

// Menangkap data yang dikirim dari form
$nama     = $_POST['nama'];
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password']; 

// Perintah SQL untuk memasukkan data
$query = "INSERT INTO users (nama, username, email, password) 
          VALUES ('$nama', '$username', '$email', '$password')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('User Berhasil Terdaftar!');
            window.location.href='admin.php'; 
          </script>";
    exit(); // Tambahkan baris ini
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($koneksi);
}
?>