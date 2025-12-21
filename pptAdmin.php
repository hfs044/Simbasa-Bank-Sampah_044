<?php 
include "koneksi.php"; 

// Logika untuk menyetujui atau menolak pencairan (Backend)
if (isset($_GET['aksi']) && isset($_GET['id'])) {
    $id_pencairan = $_GET['id'];
    $status_baru = ($_GET['aksi'] == 'setuju') ? 'Selesai' : 'Ditolak';

    $update = mysqli_query($koneksi, "UPDATE pencairan SET status = '$status_baru' WHERE id = '$id_pencairan'");

    if ($update) {
        echo "<script>alert('Status pencairan berhasil diperbarui!'); window.location.href='pptAdmin.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Pencairan - SIMBASA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link href="css/dash.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo" class="img-fluid mb-2" style="width: 200px;">
        <a href="admin.php">Home</a>
        <a href="tsAdmin.php">Transaksi Sampah</a>
        <a href="khsAdmin.php">Kelola Harga Sampah</a>
        <a href="pptAdmin.php" class="fw-bold text-primary">Permintaan Pencairan</a>
        <a href="asAdmin.php">Analisis Sampah</a>
        <hr>
        <a href="logout.php" class="text-danger">Log Out</a>
    </div>

    <div class="main">
        <h3 class="fw-bold mb-4">Permintaan Pencairan Tabungan</h3>

        <div class="bg-white p-4 shadow-sm rounded">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Nasabah</th>
                            <th>Jumlah Penarikan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengambil data pencairan dan menggabungkannya dengan tabel users
                        $query = mysqli_query($koneksi, "SELECT pencairan.*, users.nama FROM pencairan 
                                 JOIN users ON pencairan.id_user = users.id 
                                 ORDER BY pencairan.tanggal_permintaan DESC");
                        
                        if(mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_array($query)) {
                                // Warna badge berdasarkan status
                                $badgeColor = 'bg-warning';
                                if($row['status'] == 'Selesai') $badgeColor = 'bg-success';
                                if($row['status'] == 'Ditolak') $badgeColor = 'bg-danger';
                        ?>
                            <tr>
                                <td><?php echo date('d/m/Y H:i', strtotime($row['tanggal_permintaan'])); ?></td>
                                <td><strong><?php echo $row['nama']; ?></strong></td>
                                <td class="fw-bold text-primary">Rp <?php echo number_format($row['jumlah_penarikan'], 0, ',', '.'); ?></td>
                                <td><span class="badge <?php echo $badgeColor; ?>"><?php echo $row['status']; ?></span></td>
                                <td>
                                    <?php if($row['status'] == 'Pending') : ?>
                                        <a href="pptAdmin.php?aksi=setuju&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" onclick="return confirm('Setujui pencairan ini?')">Setuju</a>
                                        <a href="pptAdmin.php?aksi=tolak&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pencairan ini?')">Tolak</a>
                                    <?php else: ?>
                                        <span class="text-muted small">Sudah Diproses</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted'>Belum ada permintaan pencairan.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>