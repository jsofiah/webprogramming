<?php
require __DIR__ . '/koneksi.php';

// Ambil semua data
$res = q('SELECT id, nim, nama, email, jurusan, to_char(created_at, \'YYYY-MM-DD HH24:MI\') AS created_at
          FROM public.data_mahasiswa
          ORDER BY id DESC');

$rows = pg_fetch_all($res) ?: [];
?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <title>CRUD Mahasiswa (PHP + PostgreSQL)</title>
  <style>
    body {
      font-family: system-ui, Segoe UI, Roboto, Arial, sans-serif;
      /* max-width: 980px; */
      margin: 24px auto;
      padding: 20px 12px
    }

    table {
      border-collapse: collapse;
      width: 100%
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px
    }

    th {
      background: #f6f6f6;
      text-align: left
    }

    a.btn {
      padding: 6px 10px;
      border: 1px solid #999;
      border-radius: 6px;
      text-decoration: none
    }

    .row-actions a {
      margin-right: 8px
    }

    .row-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }
    @media (max-width: 576px) {
      .row-actions {
        flex-direction: column;
        gap: 8px;
      }
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
  
  <div class="container-md">
      <h1>Data Mahasiswa</h1>
      <p><a href="create.php"><button type="button" class="btn btn-primary">+ Tambah Mahasiswa</button></a></p>

      <table class="table table-striped table-hover">
        <thead class="table-primary">
          <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Dibuat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!$rows): ?>
          <tr>
            <td colspan="7">Belum ada data.</td>
          </tr>
          <?php else: foreach ($rows as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r['id']) ?></td>
            <td><?= htmlspecialchars($r['nim']) ?></td>
            <td><?= htmlspecialchars($r['nama']) ?></td>
            <td><?= htmlspecialchars($r['email']?? '', ENT_QUOTES, 'UTF-8') ?></td>
            <!-- karena ada kemungkinan jurusan bernilai NULL maka ditambahkan 
             ?? '', ENT_QUOTES, 'UTF-8' agar tdak error -->
            <td><?= htmlspecialchars($r['jurusan']?? '', ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars((string)($r['created_at'])) ?></td>
            <td class="row-actions">
              <a href="edit.php?id=<?= urlencode($r['id']) ?>"><button type="button" class="btn btn-warning">Ubah</button></a>
              <a href="#" onclick="if(confirm('Hapus data ini?')) {
                    document.getElementById('deleteForm<?= $r['id'] ?>').submit();
                }"><button type="button" class="btn btn-danger">Hapus</button>
              </a>
              <form id="deleteForm<?= $r['id'] ?>" action="delete.php" method="post" style="display:none;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">
              </form>
            </td>
          </tr>
          <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
</body>
</html>