<?php
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $stage = $_POST['stage'];
    $genre = $_POST['genre'];
    $spotify_link = $_POST['spotify_link'];

    $image_name = null;
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../img/artist/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_name = "img/artist/" . $image_name;
    }

    $query = "INSERT INTO artist (name, stage, genre, spotify_link, image) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, [$name, $stage, $genre, $spotify_link, $image_name]);

    if ($result) {
        echo "<script>alert('Data artist berhasil ditambahkan!'); window.location='data_artist.php';</script>";
    } else {
        die('Gagal menambahkan data: ' . pg_last_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../img/logo-pendek.png">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 700px;">
            <div class="card-header bg-warning text-white text-center rounded-top-4">
                <h3 class="my-2 fw-bold">Tambah Artist</h3>
            </div>

            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Artist</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama artist" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stage</label>
                        <input type="text" name="stage" class="form-control" placeholder="Masukkan stage" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Genre</label>
                        <input type="text" name="genre" class="form-control" placeholder="Masukkan genre" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Spotify Link</label>
                        <input type="url" name="spotify_link" class="form-control" placeholder="https://..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Upload Gambar Artist</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                        <a href="data_artist.php" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
