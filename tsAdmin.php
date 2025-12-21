<?php 
include "koneksi.php"; 

// Logika Input Transaksi (Backend)
if (isset($_POST['simpan_transaksi'])) {
    $id_user     = $_POST['id_user'];
    $tanggal     = $_POST['tanggal'];
    $jenis       = $_POST['jenis_sampah'];
    $berat       = $_POST['berat'];
    $harga_total = $_POST['total_harga'];

    $input = mysqli_query($koneksi, "INSERT INTO transaksi (id_user, tanggal, jenis_sampah, berat, total_harga) 
             VALUES ('$id_user', '$tanggal', '$jenis', '$berat', '$harga_total')");

    if ($input) {
        echo "<script>alert('Transaksi Berhasil!'); window.location.href='tsAdmin.php';</script>";
    } else {
        echo "<script>alert('Gagal Simpan Transaksi');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Sampah - SIMBASA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link href="css/dash.css" rel="stylesheet">
</head>
<body>

    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo" class="img-fluid mb-2" style="width: 200px;">
        <a href="admin.php">Home</a>
        <a href="tsAdmin.php" class="fw-bold text-primary">Transaksi Sampah</a>
        <a href="khsAdmin.php">Kelola Harga Sampah</a>
        <a href="pptAdmin.php">Permintaan Pencairan</a>
        <a href="asAdmin.php">Analisis Sampah</a>
        <hr>
        <a href="logout.php" class="text-danger">Log Out</a>
    </div>

    <div class="main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Transaksi Sampah</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah"> + Input Setoran</button>
        </div>

        <div class="bg-white p-4 shadow-sm rounded">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Nasabah</th>
                        <th>Jenis Sampah</th>
                        <th>Berat (Kg)</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT transaksi.*, users.nama FROM transaksi 
                             JOIN users ON transaksi.id_user = users.id ORDER BY transaksi.id DESC");
                    
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><strong><?php echo $row['nama']; ?></strong></td>
                            <td><?php echo $row['jenis_sampah']; ?></td>
                            <td><?php echo $row['berat']; ?> Kg</td>
                            <td class="text-success fw-bold">Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php 
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Belum ada transaksi.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Setoran Sampah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Pilih Nasabah</label>
                            <select name="id_user" class="form-select" required>
                                <option value="">-- Pilih Nama --</option>
                                <?php
                                $u = mysqli_query($koneksi, "SELECT * FROM users");
                                while($user = mysqli_fetch_array($u)){
                                    echo "<option value='".$user['id']."'>".$user['nama']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Sampah</label>
                            <input type="text" name="jenis_sampah" class="form-control" placeholder="Contoh: Plastik / Logam" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Berat (Kg)</label>
                                <input type="number" name="berat" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Total Harga (Rp)</label>
                                <input type="number" name="total_harga" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="simpan_transaksi" class="btn btn-primary">Simpan Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>