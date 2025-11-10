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
        die("Query gagal: " . pg_last_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/styleCreate.css">
    <link rel="icon" href="../img/logo-pendek.png">
    <title>Admin - Tambah Member LYVESTA</title>
</head>
<body>
    <div class="container">
        <div class="banner">
            <h1>TAMBAH DATA MEMBER</h1>
            <hr>
        </div>

        <!-- <div class="register-wrapper">
            <form class="register-form" method="POST" action="">
                <input type="text" name="nama" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="tel" name="no_hp" placeholder="Phone Number">
                <button type="submit">Register Now</button>
                <a href="index.php"><button class="btn btn-secondary">Kembali</button></a>
            </form>

            <div class="register-image">
                <img src="../img/register.jpg" alt="Register Image">
            </div>
        </div> -->
        <div class="register-wrapper">
            <form class="register-form" method="POST" action="">
                <input type="text" name="nama" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="tel" name="no_hp" placeholder="Phone Number">

                <div class="btn-wrapper">
                    <button type="submit" class="btn btn-success">Register Now</button>
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