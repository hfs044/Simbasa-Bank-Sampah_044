<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SIMBASA</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <link href="css/dash.css" rel="stylesheet">
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <img src="img/simbada.png" alt="Logo SIMBASA" class="img-fluid mb-2"
            style="width: 200px; height: auto; align-items: center;">
        <a href="dash.html" class="fw-bold text-primary">Dashboard</a>
        <a href="ts.html">Tabungan Sampah</a>
        <a href="tu.html">Tabungan Uang</a>
        <a href="rt.html">Riwayat Transaksi</a>
        <a href="profile.html">Profil</a>
        <hr>
        <a href="index.html" class="text-danger">Log Out</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <h3 class="fw-bold mb-4">Dashboard</h3>

        <!-- CARDS ROW -->
        <div class="row g-4">

            <div class="col-md-4">
                <div class="saldo-box">
                    <h5 class="fw-bold">Tabungan Sampah</h5>
                    <h3 class="fw-bold text-success">Rp 100.000</h3>
                    <p class="text-muted mb-0">10 Kg Sampah (Periode Nov 2025)</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="saldo-box">
                    <h5 class="fw-bold">Tabungan Uang</h5>
                    <h3 class="fw-bold text-primary">Rp 100.000</h3>
                    <p class="text-muted mb-0">Update Terakhir 10 November 2025</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="saldo-box">
                    <h5 class="fw-bold">Total Saldo</h5>
                    <h3 class="fw-bold text-dark">Rp 200.000</h3>
                </div>
            </div>

        </div>

        <!-- RIWAYAT -->
        <div class="riwayat-box mt-5">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="fw-bold">Transaksi Terakhir</h5>
                <a href="rt.html" class="text-primary">Lihat Semua</a>
            </div>

            <div class="border-bottom pb-3 mb-3">
                <strong>Penarikan Saldo</strong>
                <span class="float-end text-danger">- Rp 20.000</span><br>
                <small class="text-muted">05 November 2025</small>
            </div>

            <div>
                <strong>Setor Sampah Plastik</strong>
                <span class="float-end text-success">+ Rp 20.000</span><br>
                <small class="text-muted">01 November 2025</small>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>