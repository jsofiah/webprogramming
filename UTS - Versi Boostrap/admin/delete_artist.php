<?php
require '../config.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

// hapus gambar juga (optional)
$select = pg_query_params($conn, "SELECT image FROM artist WHERE id=$1", [$id]);
$data = pg_fetch_assoc($select);
if ($data && !empty($data['image'])) {
    $file_path = "../img/artist" . $data['image'];
    if (file_exists($file_path)) unlink($file_path);
}

$query = "DELETE FROM artist WHERE id = $1";
$result = pg_query_params($conn, $query, [$id]);

if ($result) {
    echo "<script>alert('Data artist berhasil dihapus!'); window.location='data_artist.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data.'); window.history.back();</script>";
}
?>
