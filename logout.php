<?php
session_start();
session_destroy(); // Menghapus semua data login
header("Location: index.html"); // Balik ke halaman awal
exit();
?>