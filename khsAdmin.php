<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Harga Sampah - SIMBASA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dash.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo" class="img-fluid mb-2" style="width: 200px;">
        <a href="admin.php">Home</a>
        <a href="tsAdmin.php">Transaksi Sampah</a>
        <a href="khsAdmin.php" class="fw-bold text-primary">Kelola Harga Sampah</a>
        <a href="pptAdmin.php">Permintaan Pencairan</a>
        <hr>
       <a href="logout.php" class="text-danger">Log Out</a>
    </div>

    <div class="main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Kelola Harga Sampah</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Tambah Jenis Sampah</button>
        </div>

        <div class="table-responsive bg-white p-4 shadow-sm rounded">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Jenis Sampah</th>
                        <th>Harga / Kg</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM harga_sampah ORDER BY jenis_sampah ASC");
                    while($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['jenis_sampah']; ?></td>
                            <td>Rp <?php echo number_format($row['harga_per_kg'], 0, ',', '.'); ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $row['id']; ?>">Edit</button>
                                
                                <a href="hapus_harga.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jenis sampah ini?')">Hapus</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Harga: <?php echo $row['jenis_sampah']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="proses_edit_harga.php" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Sampah</label>
                                                <input type="text" name="jenis_sampah" class="form-control" value="<?php echo $row['jenis_sampah']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga per Kg (Rp)</label>
                                                <input type="number" name="harga_per_kg" class="form-control" value="<?php echo $row['harga_per_kg']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Jenis Sampah Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_tambah_harga.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Jenis Sampah</label>
                        <input type="text" name="jenis_sampah" class="form-control" placeholder="Contoh: Kaleng Minuman" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per Kg (Rp)</label>
                        <input type="number" name="harga_per_kg" class="form-control" placeholder="Contoh: 4000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>