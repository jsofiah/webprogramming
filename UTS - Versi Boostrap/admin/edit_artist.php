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

    $update = "UPDATE artist SET name=$1, stage=$2, genre=$3, spotify_link=$4, image=$5 WHERE id=$6";
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
    <link rel="icon" href="../img/logo-pendek.png">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 700px;">
            <div class="card-header bg-warning text-white text-center rounded-top-4">
                <h3 class="my-2">Edit Artist</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Artist</label>
                        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($data['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Stage</label>
                        <input type="text" name="stage" class="form-control" value="<?= htmlspecialchars($data['stage']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Genre</label>
                        <input type="text" name="genre" class="form-control" value="<?= htmlspecialchars($data['genre']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Spotify Link</label>
                        <input type="url" name="spotify_link" class="form-control" value="<?= htmlspecialchars($data['spotify_link']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Saat Ini</label><br>
                        <?php if (!empty($data['image'])): ?>
                            <img src="../<?= htmlspecialchars($data['image']) ?>" alt="Artist Image" class="rounded" width="150" height="150" style="object-fit:cover;">
                        <?php else: ?>
                            <p class="text-muted fst-italic">Belum ada gambar</p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ganti Gambar (Opsional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <button type="submit" class="btn btn-success px-4">Update</button>
                        <a href="data_artist.php" class="btn btn-secondary px-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
