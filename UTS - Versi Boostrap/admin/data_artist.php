<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require '../config.php';

$query = "SELECT * FROM artist ORDER BY id DESC";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Artist LYVESTA</title>
    <link rel="icon" href="../img/logo-pendek.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
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
            <h1 class="display-4 fw-bold text-warning">ARTIST LYVESTA</h1>
            <p class="lead mx-auto">Welcome to our festival</p>
            <hr>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-semibold">Daftar Artist</h4>
            <a href="create_artist.php" class="btn btn-primary">+ Tambah Data</a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Nama Artist</th>
                        <th>Stage</th>
                        <th>Genre</th>
                        <th>Spotify</th>
                        <th>Gambar Artist</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = pg_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['stage']) ?></td>
                        <td><?= htmlspecialchars($row['genre']) ?></td>
                        <td>
                            <a href="<?= htmlspecialchars($row['spotify_link']) ?>" target="_blank" class="text-decoration-none">
                                <?= htmlspecialchars($row['spotify_link']) ?>
                            </a>
                        </td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="../<?= htmlspecialchars($row['image']) ?>" alt="Artist" width="100" height="100" style="object-fit: cover; border-radius: 8px;">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-2">
                                <a href="edit_artist.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_artist.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?');">Hapus</a>
                            </div>
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