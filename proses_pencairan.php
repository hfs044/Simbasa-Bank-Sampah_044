<?php
include "koneksi.php";

$id = $_GET['id'];
$status = $_GET['status'];

$query = mysqli_query($koneksi, "UPDATE pencairan SET status='$status' WHERE id='$id'");

if ($query) {
    echo "<script>alert('Status pencairan diperbarui!'); window.location.href='pptAdmin.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>