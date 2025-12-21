<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analisis Sampah - SIMBASA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dash.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo" class="img-fluid mb-2" style="width: 200px;">
        <a href="admin.php">Home</a>
        <a href="tsAdmin.php">Transaksi Sampah</a>
        <a href="khsAdmin.php">Kelola Harga Sampah</a>
        <a href="pptAdmin.php">Permintaan Pencairan</a>
        <a href="asAdmin.php" class="fw-bold text-primary">Analisis Sampah</a>
        <hr>
        <a href="logout.php" class="text-danger">Log Out</a>
    </div>

    <div class="main">
        <h3 class="fw-bold mb-4">Analisis Pengumpulan Sampah</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="bg-white p-4 shadow-sm rounded mb-4">
                    <h5 class="fw-bold mb-3">Total Berat Sampah per Jenis</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Sampah</th>
                                    <th>Total Berat Masuk</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                // Menghitung total seluruh berat untuk persentase
                                $total_semua = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(berat) as total FROM transaksi"));
                                $grand_total = $total_semua['total'] ?? 0;

                                // Mengambil data per jenis sampah
                                $query = mysqli_query($koneksi, "SELECT jenis_sampah, SUM(berat) as total_berat 
                                                                 FROM transaksi 
                                                                 GROUP BY jenis_sampah 
                                                                 ORDER BY total_berat DESC");
                                
                                if(mysqli_num_rows($query) > 0) {
                                    while($row = mysqli_fetch_array($query)) {
                                        $persen = ($grand_total > 0) ? ($row['total_berat'] / $grand_total) * 100 : 0;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['jenis_sampah']; ?></td>
                                            <td class="fw-bold"><?php echo $row['total_berat']; ?> Kg</td>
                                            <td>
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar bg-success" role="progressbar" 
                                                         style="width: <?php echo $persen; ?>%" 
                                                         aria-valuenow="<?php echo $persen; ?>" aria-valuemin="0" aria-valuemax="100">
                                                        <?php echo number_format($persen, 1); ?>%
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>Belum ada data transaksi untuk dianalisis.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>