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
  <link rel="stylesheet" href="style/styleRegister.css">
  <link rel="icon" href="../img/logo-pendek.png">
  <title>Login - LYVESTA</title>
</head>
<body>
  <div class="register-card">
    <h2>BUAT AKUN BARU</h2>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="register_process.php" method="post" autocomplete="off" novalidate>
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

      <label for="username">Username</label>
      <input id="username" name="username" type="text" required minlength="3" maxlength="100">

      <label for="full_name">Nama Lengkap</label>
      <input id="full_name" name="full_name" type="text" maxlength="200">

      <label for="password">Password</label>
      <input id="password" name="password" type="password" required minlength="6">

      <label for="password_confirm">Konfirmasi Password</label>
      <input id="password_confirm" name="password_confirm" type="password" required minlength="6">

      <small>Minimal 6 karakter untuk password.</small>

      <button type="submit">Daftar Sekarang</button>
    </form>
    <a href="login.php" class="back-link">Kembali ke Login</a>
  </div>
</body>
</html>