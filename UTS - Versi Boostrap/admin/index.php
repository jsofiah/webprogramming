<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require '../config.php';

$query = "SELECT * FROM data_pengunjung ORDER BY id DESC";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Member LYVESTA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/logo-pendek.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: rgb(251, 192, 3);" data-bs-theme="light">
        <div class="container-fluid justify-content-between px-4">
            <a class="navbar-brand" href="#">
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
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold text-warning">MEMBER LYVESTA</h1>
            <p class="lead mx-auto">Welcome to our festival</p>
            <hr>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-semibold">Daftar Member</h4>
            <a href="create.php" class="btn btn-primary">+ Tambah Data</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['no_hp'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
