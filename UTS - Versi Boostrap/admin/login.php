<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login - LYVESTA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../img/logo-pendek.png">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
      <img src="../img/logo-panjang.png" alt="LYVESTA" class="img-fluid mb-3" style="max-height: 50px;">
      <h2 class="fw-bold text-warning">LOGIN</h2>
    </div>

    <?php if (!empty($_GET['error'])): ?>
      <div class="alert alert-danger text-center py-2">
        <?= htmlspecialchars($_GET['error']) ?>
      </div>
    <?php endif; ?>

    <form action="authenticate.php" method="post" autocomplete="off">
      <div class="mb-3">
        <label for="username" class="form-label fw-semibold">Username</label>
        <input type="text" id="username" name="username" class="form-control" required autofocus>
      </div>

      <div class="mb-4">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-warning w-100 fw-bold">Masuk</button>
    </form>

    <div class="text-center mt-3">
      <a href="register_login.php" class="btn btn-outline-warning w-100 fw-bold text-decoration-none">Daftar Akun Baru</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
