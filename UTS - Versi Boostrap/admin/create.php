<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    if (trim($no_hp) === '') {
        $no_hp = null;
    }

    $query = "INSERT INTO data_pengunjung (nama, email, no_hp) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, [$nama, $email, $no_hp]);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    } else {
        die('Query gagal: ' . pg_last_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member - LYVESTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/logo-pendek.png">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: rgb(251, 192, 3);" data-bs-theme="light">
        <div class="container-fluid justify-content-between px-4">
            <a class="navbar-brand" href="index.php">
                <img src="../img/logo-panjang.png" alt="LYVESTA" style="height: 60px;">
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link fw-semibold text-white" href="index.php">Member</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold text-white" href="data_artist.php">Artist</a></li>
                    <li class="nav-item d-lg-none">
                        <a href="logout.php" class="nav-link text-white fw-semibold">Logout</a>
                    </li>
                </ul>
            </div>

            <a href="logout.php" class="btn btn-light rounded-pill fw-semibold d-none d-lg-inline-flex align-items-center px-3 py-2">
                Logout
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow-lg border-0 mx-auto" style="max-width: 700px;">
            <div class="card-header text-center text-white fw-bold fs-4" style="background-color: rgb(251, 192, 3);">
                Tambah Data Member
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label fw-semibold">Nomor HP</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor hp">
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                        <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
