<?php
require '../config.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "SELECT * FROM data_pengunjung WHERE id = $1";
$result = pg_query_params($conn, $query, [$id]);
$data = pg_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    $update = "UPDATE data_pengunjung SET nama=$1, email=$2, no_hp=$3 WHERE id=$4";
    $res = pg_query_params($conn, $update, [$nama, $email, $no_hp, $id]);

    if ($res) {
        echo "<script>alert('Data berhasil diubah!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data.'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung - LYVESTA</title>
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
                Edit Data Pengunjung
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="<?= htmlspecialchars($data['nama']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= htmlspecialchars($data['email']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label fw-semibold">No HP</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp"
                            value="<?= htmlspecialchars($data['no_hp'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" class="btn btn-success px-4">Update Data</button>
                        <a href="index.php" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
