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
    <link rel="stylesheet" href="style/styleCreateArtist.css">
</head>
<body>
    <div class="container">
        <div class="banner">
            <h1>TAMBAH ARTIST</h1>
            <hr>
        </div>

        <div class="form-wrapper">
            <form class="artist-form" method="POST" enctype="multipart/form-data">
                <label>Nama Artist</label>
                <input type="text" name="name" required>

                <label>Stage</label>
                <input type="text" name="stage" required>

                <label>Genre</label>
                <input type="text" name="genre" required>

                <label>Spotify Link</label>
                <input type="url" name="spotify_link" required>

                <label>Upload Gambar Artist</label>
                <input type="file" name="image" accept="image/*" required>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="data_artist.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
