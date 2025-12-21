<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabungan Sampah SIMBASA</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link href="css/ts.css" rel="stylesheet">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo SIMBASA" class="img-fluid mb-2"
            style="width: 200px; height: auto; align-items: center;">
        <a href="dash.html">Dashboard</a>
        <a href="ts.html" class="fw-bold text-primary">Tabungan Sampah</a>
        <a href="tu.html">Tabungan Uang</a>
        <a href="rt.html">Riwayat Transaksi</a>
        <a href="profile.html">Profil</a>
        <hr>
        <a href="index.html" class="text-danger">Log Out</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <h3 class="fw-bold mb-4">Tabungan Sampah</h3>

        <!-- SALDO -->
        <div class="saldo-box mb-4">
            <h5 class="fw-bold">Saldo Tabungan Sampah</h5>
            <h2 class="fw-bold text-success mb-0">Rp 100.000</h2>
        </div>

        <!-- JENIS JENIS SAMPAH -->
        <h5 class="fw-bold mb-3">Jenis - Jenis Setor Sampah</h5>

        <div class="row g-4">

            <!-- Plastik -->
            <div class="col-md-3 col-6">
                <div class="jenis-card" data-bs-toggle="modal" data-bs-target="#modalPlastik">
                    <img src="img/plastik.png" class="jenis-icon" alt="Plastik">
                    <p class="fw-semibold mb-0">Plastik</p>
                </div>
            </div>

            <!-- Kardus -->
            <div class="col-md-3 col-6">
                <div class="jenis-card" data-bs-toggle="modal" data-bs-target="#modalKardus">
                    <img src="img/kerdus.png" class="jenis-icon" alt="Kardus">
                    <p class="fw-semibold mb-0">Kardus</p>
                </div>
            </div>

            <!-- Kertas -->
            <div class="col-md-3 col-6">
                <div class="jenis-card" data-bs-toggle="modal" data-bs-target="#modalKertas">
                    <img src="img/kertas.png" class="jenis-icon" alt="Kertas">
                    <p class="fw-semibold mb-0">Kertas</p>
                </div>
            </div>

            <!-- Kaleng -->
            <div class="col-md-3 col-6">
                <div class="jenis-card" data-bs-toggle="modal" data-bs-target="#modalKaleng">
                    <img src="img/kaleng.png" class="jenis-icon" alt="Kaleng">
                    <p class="fw-semibold mb-0">Kaleng</p>
                </div>
            </div>

        </div>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Harga per jenis (bebas kamu ganti)
        const harga = {
            plastik: 3000,
            kardus: 2000,
            kertas: 1500,
            kaleng: 4000
        };

        // Fungsi hitung otomatis
        function hitungRupiah(jumlahID, rupiahID, hargaPerItem) {
            const jumlah = document.getElementById(jumlahID).value;
            const rupiah = jumlah * hargaPerItem;

            document.getElementById(rupiahID).value = rupiah;
        }

        // Plastik
        document.getElementById("jumlahPlastik").addEventListener("input", function () {
            hitungRupiah("jumlahPlastik", "rupiahPlastik", harga.plastik);
        });

        // Kardus
        document.getElementById("jumlahKardus").addEventListener("input", function () {
            hitungRupiah("jumlahKardus", "rupiahKardus", harga.kardus);
        });

        // Kertas
        document.getElementById("jumlahKertas").addEventListener("input", function () {
            hitungRupiah("jumlahKertas", "rupiahKertas", harga.kertas);
        });

        // Kaleng
        document.getElementById("jumlahKaleng").addEventListener("input", function () {
            hitungRupiah("jumlahKaleng", "rupiahKaleng", harga.kaleng);
        });
    </script>


    <!--Modal Plastik-->
    <div class="modal fade" id="modalPlastik" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Setor Plastik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang (Kg / Pcs)</label>
                            <input type="number" class="form-control" id="jumlahPlastik" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah dalam Rupiah (Rp)</label>
                            <input type="number" class="form-control" id="rupiahPlastik" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Foto</label>
                            <input type="file" class="form-control" accept="image/*" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!--Modal Kardus-->
    <div class="modal fade" id="modalKardus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Setor Kardus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang (Kg / Pcs)</label>
                            <input type="number" class="form-control" id="jumlahKardus" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah dalam Rupiah (Rp)</label>
                            <input type="number" class="form-control" id="rupiahKardus" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Foto</label>
                            <input type="file" class="form-control" accept="image/*" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--Modal Kertas-->
    <div class="modal fade" id="modalKertas" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Setor Kertas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang (Kg / Pcs)</label>
                            <input type="number" class="form-control" id="jumlahKertas" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah dalam Rupiah (Rp)</label>
                            <input type="number" class="form-control" id="rupiahKertas" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Foto</label>
                            <input type="file" class="form-control" accept="image/*" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--Modal Kaleng-->
    <div class="modal fade" id="modalKaleng" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Setor Kaleng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang (Kg / Pcs)</label>
                            <input type="number" class="form-control" id="jumlahKaleng" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah dalam Rupiah (Rp)</label>
                            <input type="number" class="form-control" id="rupiahKaleng" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bukti Foto</label>
                            <input type="file" class="form-control" accept="image/*" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success">Kirim</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>