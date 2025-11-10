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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
    <link rel="icon" href="../img/logo-pendek.png">
    <title>Admin - Artist LYVESTA</title>
</head>
<body>
    <div class="logo">
        <img src="../img/logo-panjang.png" alt="LYVESTA" class="logo-img">
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Member</a></li>
            <li><a href="data_artist.php">Artist</a></li>
        </ul>
    </nav>
    <a href="logout.php" class="cta-button">
        <span class="cta-text">Log Out</span>
        <span class="cta-arrow">→</span>
    </a>
    <div class="container">
        <div class="banner">
            <h1>ARTIST LYVESTA</h1>
            <p class="banner-description">Welcome to our festival</p>
            <hr>
        </div>

        <a href="create_artist.php" class="btn btn-primary">+ Tambah Data</a>
        <br><br>
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
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
                            <a href="<?= htmlspecialchars($row['spotify_link']) ?>" target="_blank" class="text-decoration-none text-primary">
                                <?= htmlspecialchars($row['spotify_link']) ?>
                            </a>
                        </td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <img src="../<?= htmlspecialchars($row['image']) ?>" alt="Artist Image" width="100" height="100" style="object-fit:cover;">
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
