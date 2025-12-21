<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SIMBASA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link href="css/dash.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo SIMBASA" class="img-fluid mb-2" style="width: 200px; height: auto;">
        <a href="admin.php" class="fw-bold text-primary">Home</a>
        <a href="tsAdmin.php">Transaksi Sampah</a>
        <a href="khsAdmin.php">Kelola Harga Sampah</a>
        <a href="pptAdmin.php">Permintaan Pencairan Tabungan</a>
        <a href="asAdmin.php">Analisis Sampah</a>
        <hr>
       <a href="logout.php" class="text-danger">Log Out</a>
    </div>

    <div class="main">
        <h3 class="fw-bold mb-4">Admin SIMBASA</h3>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="saldo-box bg-white p-4 shadow-sm rounded">
                    <h5 class="fw-bold text-secondary mb-1">Total User</h5>
                    <h3 class="fw-bold text-dark"> 
                        <?php 
                            $ambil_user = mysqli_query($koneksi, "SELECT * FROM users");
                            echo mysqli_num_rows($ambil_user); 
                        ?>
                    </h3>
                </div>
            </div>

            <div class="col-md-6">
                <div class="bg-white p-4 shadow-sm rounded">
                    <h5 class="fw-bold text-muted mb-1">Total Tabungan</h5>
                    <h2 class="fw-bold text-primary">
                        <?php
                        $query_tabungan = mysqli_query($koneksi, "SELECT SUM(total_harga) as total FROM transaksi");
                        $data_tabungan = mysqli_fetch_array($query_tabungan);
                        $total_semua = $data_tabungan['total'] ?? 0;
                        echo "Rp " . number_format($total_semua, 0, ',', '.');
                        ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <form action="admin.php" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="cari" class="form-control p-3" placeholder="Cari Nama User..." value="<?php echo isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
                    <button class="btn btn-primary px-4" type="submit">Cari</button>
                    <?php if(isset($_GET['cari'])): ?>
                        <a href="admin.php" class="btn btn-secondary d-flex align-items-center">Reset</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <?php
            // Logika Pencarian
            if (isset($_GET['cari'])) {
                $keyword = $_GET['cari'];
                $query_user = mysqli_query($koneksi, "SELECT * FROM users WHERE nama LIKE '%$keyword%' OR username LIKE '%$keyword%' ORDER BY id DESC");
            } else {
                $query_user = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
            }

            if(mysqli_num_rows($query_user) > 0) {
                while ($row = mysqli_fetch_array($query_user)) {
                    // Hitung saldo masing-masing user
                    $id_user = $row['id'];
                    $q_saldo = mysqli_query($koneksi, "SELECT SUM(total_harga) as saldo FROM transaksi WHERE id_user = '$id_user'");
                    $d_saldo = mysqli_fetch_array($q_saldo);
                    $saldo_user = $d_saldo['saldo'] ?? 0;
            ?>
                <div class="card mb-3 p-3 shadow-sm border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-0"><?php echo strtoupper($row['nama']); ?></h5>
                            <small class="text-muted">Username: @<?php echo $row['username']; ?></small>
                        </div>
                        <div class="text-end">
                            <h4 class="fw-bold text-success mb-0">Rp <?php echo number_format($saldo_user, 0, ',', '.'); ?></h4>
                            <small class="text-muted">Email: <?php echo $row['email']; ?></small>
                        </div>
                    </div>
                </div>
            <?php 
                } 
            } else {
                echo "<div class='alert alert-warning'>User tidak ditemukan.</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>