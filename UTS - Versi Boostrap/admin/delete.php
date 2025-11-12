<?php
require '../config.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$query = "DELETE FROM data_pengunjung WHERE id = $1";
$result = pg_query_params($conn, $query, [$id]);

if ($result) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data.'); window.history.back();</script>";
}
?>