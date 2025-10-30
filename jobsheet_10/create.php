<?php
require __DIR__ . '/koneksi.php';

$err = $ok = '';
$nim = $nama = $email = $jurusan = '';

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
                'INSERT INTO public.data_mahasiswa (nim, nama, email, jurusan) VALUES ($1, $2, NULLIF($3, \'\'), NULLIF($4, \'\'))',
                [$nim, $nama, $email, $jurusan]
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
  <title>Tambah Mahasiswa</title>
  <style>
    body{font-family:system-ui,Segoe UI,Roboto,Arial,sans-serif;padding:0 12px}
    label{display:block;margin-top:10px}
    input,select{width:100%;padding:8px;margin-top:4px}
    .btn{padding:8px 12px;border:1px solid #999;border-radius:6px;background:#f6f6f6;text-decoration:none}
    .alert{padding:10px;border-radius:6px;margin:10px 0}
    .alert.error{background:#ffe9e9;border:1px solid #e99}

  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container-fluid mt-4">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-10">
      <h1 class="mb-4">Tambah Mahasiswa</h1>
      
      <form method="post">
        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($nim) ?>" required>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email (opsional)</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="nama@kampus.ac.id">
        </div>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan (opsional)</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= htmlspecialchars($jurusan) ?>">
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="index.php" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
