<?php
require '../config.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "SELECT * FROM artist WHERE id = $1";
$result = pg_query_params($conn, $query, [$id]);
$data = pg_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $stage = $_POST['stage'];
    $genre = $_POST['genre'];
    $spotify_link = $_POST['spotify_link'];
    $image_name = $data['image'];

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../img/artist/";
        if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);

        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_name = "img/artist/" . $image_name;
    }

    $update = "UPDATE artist
               SET name=$1, stage=$2, genre=$3, spotify_link=$4, image=$5
               WHERE id=$6";
    $res = pg_query_params($conn, $update, [$name, $stage, $genre, $spotify_link, $image_name, $id]);

    if ($res) {
        echo "<script>alert('Data artist berhasil diubah!'); window.location='data_artist.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data.'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Artist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/styleCreateArtist.css">
</head>
<body>
    <div class="container">
        <div class="banner">
            <h1>EDIT ARTIST</h1>
            <hr>
        </div>

        <div class="form-wrapper">
            <form class="artist-form" method="POST" enctype="multipart/form-data">
                <label>Nama Artist</label>
                <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>

                <label>Stage</label>
                <input type="text" name="stage" value="<?= htmlspecialchars($data['stage']) ?>" required>

                <label>Genre</label>
                <input type="text" name="genre" value="<?= htmlspecialchars($data['genre']) ?>" required>

                <label>Spotify Link</label>
                <input type="url" name="spotify_link" value="<?= htmlspecialchars($data['spotify_link']) ?>" required>

                <label>Gambar Saat Ini</label>
                <div class="mb-3">
                    <img src="../<?= htmlspecialchars($data['image']) ?>" alt="Artist Image" width="150" height="150" style="object-fit:cover; border-radius:10px;">
                </div>

                <label>Ganti Gambar (Opsional)</label>
                <input type="file" name="image" accept="image/*">

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="data_artist.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
