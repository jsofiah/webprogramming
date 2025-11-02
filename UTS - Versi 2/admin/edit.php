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
    <title>Edit Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/styleEdit.css">
</head>
<body>
    <div class="container">
        <div class="banner">
            <h1>EDIT DATA PENGUNJUNG</h1>
            <hr>
        </div>
        <div class="register-wrapper">
            <form class="register-form" method="POST">
                <input type="text" name="nama" placeholder="Full Name" value="<?= htmlspecialchars($data['nama']) ?>" required>
                <input type="email" name="email" placeholder="Email Address" value="<?= htmlspecialchars($data['email']) ?>" required>
                <input type="tel" name="no_hp" placeholder="Phone Number" value="<?= htmlspecialchars($data['no_hp'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Update Data</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
            <div class="register-image">
                <img src="../img/register.jpg" alt="Register Image">
            </div>
        </div>
    </div>
</body>
</html>
