<?php
require __DIR__ . '/koneksi.php';

$err = '';
$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    http_response_code(400);
    exit('ID tidak valid.');
}

// Ambil data lama
try {
    $res = qparams('SELECT id, nim, nama, email, jurusan FROM public.data_mahasiswa WHERE id=$1', [$id]);
    $row = pg_fetch_assoc($res);
    if (!$row) {
        http_response_code(404);
        exit('Data tidak ditemukan.');
    }
} catch (Throwable $e) {
    exit('Error: ' . htmlspecialchars($e->getMessage()));
}

$nim = $row['nim'];
$nama = $row['nama'];
$email = $row['email'];
$jurusan = $row['jurusan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim     = trim($_POST['nim'] ?? '');
    $nama    = trim($_POST['nama'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');

    if ($nim === '' || $nama === '') {
        $err = 'NIM dan Nama wajib diisi.';
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = 'Format email tidak valid.';
    } else {
        try {
            qparams(
                'UPDATE public.data_mahasiswa
                   SET nim=$1, nama=$2, email=NULLIF($3, \'\'), jurusan=NULLIF($4, \'\')
                 WHERE id=$5',
                [$nim, $nama, $email, $jurusan, $id]
            );
            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $err = $e->getMessage();
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Ubah Mahasiswa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body{font-family:system-ui,Segoe UI,Roboto,Arial,sans-serif;padding:0 12px}
    label{display:block;margin-top:10px}
    input,select{width:100%;padding:8px;margin-top:4px}
    .btn{padding:8px 12px;border:1px solid #999;border-radius:6px;text-decoration:none}
    .alert{padding:10px;border-radius:6px;margin:10px 0}
    .alert.error{background:#ffe9e9;border:1px solid #e99}
  </style>
</head>
<body>
  <div class="container-fluid mt-4">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
        <div>
          <h1 class="mb-4">Tambah Mahasiswa</h1>

          <?php if ($err): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
          <?php endif; ?>

          <form method="post">
            <div class="mb-3">
              <label for="nim" class="form-label">NIM
                <input class="form-control" name="nim" value="<?= htmlspecialchars($nim) ?>" required>
              </label>
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama
                <input class="form-control" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
              </label>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email (opsional)
                <input class="form-control" name="email" value="<?= htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8') ?>">
              </label>
            </div>
            <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan (opsional)
                <input class="form-control" name="jurusan" value="<?= htmlspecialchars($jurusan ?? '', ENT_QUOTES, 'UTF-8') ?>">
              </label>
            </div>

            <div class="mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
