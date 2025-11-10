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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../style/styleRegister.css"> -->
     <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
    <link rel="icon" href="../img/logo-pendek.png">
    <title>Admin - Member LYVESTA</title>
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
            <h1>MEMBER LYVESTA</h1>
            <p class="banner-description">Welcome to our festival</p>
            <hr>
        </div>

        <a href="create.php" class="btn btn-primary">+ Tambah Data</a>
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = pg_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['no_hp']?? '', ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>
