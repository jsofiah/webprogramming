<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Register - LYVESTA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../img/logo-pendek.png">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

  <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
    <div class="text-center mb-3">
      <img src="../img/logo-panjang.png" alt="LYVESTA" class="img-fluid mb-3" style="max-height: 50px;">
      <h2 class="fw-bold text-warning">BUAT AKUN BARU</h2>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-danger text-center py-2">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="alert alert-success text-center py-2">
        <?= htmlspecialchars($success) ?>
      </div>
    <?php endif; ?>

    <form action="register_process.php" method="post" autocomplete="off" novalidate>
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" id="username" name="username" class="form-control" required minlength="3" maxlength="100">
      </div>

      <div class="mb-3">
        <label for="full_name" class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" id="full_name" name="full_name" class="form-control" maxlength="200">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" id="password" name="password" class="form-control" required minlength="6">
      </div>

      <div class="mb-3">
        <label for="password_confirm" class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" id="password_confirm" name="password_confirm" class="form-control" required minlength="6">
      </div>

      <div class="form-text mb-3">Minimal 6 karakter untuk password.</div>

      <button type="submit" class="btn btn-warning w-100 fw-bold">Daftar Sekarang</button>
    </form>

    <div class="text-center mt-3">
      <a href="login.php" class="btn btn-outline-warning w-100 fw-bold text-decoration-none">Kembali ke Login</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>